<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::latest('id')->paginate(10);

        return view(
            'status.index',
            compact('status')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Status::create([
            'nama' => $request->nama
        ]);

        return redirect('/status');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);

        return view(
            'status.edit',
            compact('status')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        $id
    )
    {
        $status = Status::findOrFail($id);

        $status->update([
            'nama' => $request->nama
        ]);

        return redirect('/status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);

        $status->delete();

        return redirect('/status');
    }
}
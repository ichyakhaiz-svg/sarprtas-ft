<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::latest('id')->paginate(10);

        return view(
            'lokasi.index',
            compact('lokasi')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Lokasi::create([
            'nama' => $request->nama
        ]);

        return redirect('/lokasi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        return view(
            'lokasi.edit',
            compact('lokasi')
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
        $lokasi = Lokasi::findOrFail($id);

        $lokasi->update([
            'nama' => $request->nama
        ]);

        return redirect('/lokasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $lokasi->delete();

        return redirect('/lokasi');
    }
}
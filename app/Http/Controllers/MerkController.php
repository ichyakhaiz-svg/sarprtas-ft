<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
{
    public function index()
    {
        $merk = Merk::latest('id')->paginate(10);

        return view(
            'merk.index',
            compact('merk')
        );
    }

    public function create()
    {
        return view('merk.create');
    }

    public function store(Request $request)
    {
        Merk::create([
            'nama' => $request->nama
        ]);

        return redirect('/merk');
    }

    public function edit($id)
    {
        $merk = Merk::findOrFail($id);

        return view(
            'merk.edit',
            compact('merk')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $merk = Merk::findOrFail($id);

        $merk->update([
            'nama' => $request->nama
        ]);

        return redirect('/merk');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);

        $merk->delete();

        return redirect('/merk');
    }
}
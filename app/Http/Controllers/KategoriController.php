<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest('id')->paginate(10);

        return view(
            'kategori.index',
            compact('kategori')
        );
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama' => $request->nama
        ]);

        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view(
            'kategori.edit',
            compact('kategori')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect('/kategori');
    }
}
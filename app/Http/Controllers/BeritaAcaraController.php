<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaAcara;
use App\Models\Barang;

class BeritaAcaraController extends Controller
{
    public function index()
    {
       $berita = BeritaAcara::with('barang')
    ->latest('id')
    ->paginate(10);

        return view(
            'berita-acara.index',
            compact('berita')
        );
    }

    public function create()
    {
    $barang = Barang::all();

    return view(
        'berita-acara.create',
        compact('barang')
    );
    }

    public function store(Request $request)
    {
        $file = null;

        if($request->hasFile('file_ba'))
        {
            $file = $request
                ->file('file_ba')
                ->store(
                    'berita-acara',
                    'public'
                );
        }

        BeritaAcara::create([

            'nomor_ba' =>
                $request->nomor_ba,

            'nama_barang' =>
                $request->nama_barang,

            'tanggal' =>
                $request->tanggal,

            'penyerah' =>
                $request->penyerah,
            
            'penerima' =>
                $request->penerima,

            'file_ba' =>
                $file

        ]);

        return redirect('/berita-acara')
            ->with(
                'success',
                'Berita acara berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
    $berita = BeritaAcara::findOrFail($id);

    $barang = Barang::all();

    return view(
        'berita-acara.edit',
        compact(
            'berita',
            'barang'
        )
    );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $berita =
            BeritaAcara::findOrFail($id);

        $file =
            $berita->file_ba;

        if($request->hasFile('file_ba'))
        {
            $file = $request
                ->file('file_ba')
                ->store(
                    'berita-acara',
                    'public'
                );
        }

        $berita->update([

            'nomor_ba' =>
                $request->nomor_ba,

            'nama_barang' =>
                $request->nama_barang,

            'tanggal' =>
                $request->tanggal,

            'penyerah' =>
                $request->penyerah,
            
            'penerima' =>
                $request->penerima,

            'file_ba' =>
                $file

        ]);

        return redirect('/berita-acara')
            ->with(
                'success',
                'Berita acara berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $berita =
            BeritaAcara::findOrFail($id);

        $berita->delete();

        return redirect('/berita-acara')
            ->with(
                'success',
                'Berita acara berhasil dihapus'
            );
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPermohonan;
use Illuminate\Support\Facades\Storage;

class SuratPermohonanController extends Controller
{
    public function index()
    {
        $surat = SuratPermohonan::all();

        return view(
            'surat-permohonan.index',
            compact('surat')
        );
    }

    public function create()
    {
    return view('surat-permohonan.create');
    }

    public function store(Request $request)
    {
        $path = null;

        if ($request->hasFile('file_surat')) {

        $path = $request
            ->file('file_surat')
            ->store('surat', 'public');
        }

        SuratPermohonan::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'kepada' => $request->kepada,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'file_surat' => $path
        ]);

        return redirect('/surat-permohonan');
    }

    public function edit($id)
    {
        $surat =
        SuratPermohonan::findOrFail($id);

        return view(
        'surat-permohonan.edit',
        compact('surat')
        );
    }

    public function update(
    Request $request,
    $id
    )
    {
    $surat =
        SuratPermohonan::findOrFail($id);

    $path = $surat->file_surat;

    if ($request->hasFile('file_surat')) {

        $path = $request
            ->file('file_surat')
            ->store('surat', 'public');
    }

    $surat->update([
        'nomor_surat' =>
            $request->nomor_surat,

        'tanggal_surat' =>
            $request->tanggal_surat,

        'kepada' =>
            $request->kepada,

        'perihal' =>
            $request->perihal,

        'keterangan' =>
            $request->keterangan,

        'file_surat' =>
            $path
    ]);

    return redirect('/surat-permohonan');
    }

    public function destroy($id)
    {
     $surat =
        SuratPermohonan::findOrFail($id);

    $surat->delete();

    return redirect('/surat-permohonan');
    }
}
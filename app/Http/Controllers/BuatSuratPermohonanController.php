<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BuatSuratPermohonanController extends Controller
{
    public function index()
    {
        return view(
            'buat-surat-permohonan.index'
        );
    }

    public function create()
    {
        return view(
            'buat-surat-permohonan.create'
        );
    }

    public function generate(Request $request)
    {
        $data = [

            'nomor' =>
                $request->nomor,

            'lampiran' =>
                $request->lampiran,

            'perihal' =>
                $request->perihal,

            'tanggal' =>
                $request->tanggal,

            'kepada' =>
                $request->kepada,

            'isi' =>
                $request->isi,

            'penandatangan' =>
                auth()->user()->username,

            'nama_barang' =>
                $request->nama_barang,

            'jumlah_barang' =>
                $request->jumlah_barang,

            'keterangan_barang' =>
                $request->keterangan_barang,

            'jabatan' => $request->jabatan,

            'nik' => $request->nik,

            'penandatangan' => $request->penandatangan,

            'paraf1' => $request->paraf1,

            'paraf2' => $request->paraf2,

            'paraf3' => $request->paraf3,

            'paraf4' => $request->paraf4,
            
            'paraf5' => $request->paraf5,

        ];

        $pdf = Pdf::loadView(
            'buat-surat-permohonan.pdf',
            compact('data')
        );

        return $pdf->stream(
            'surat-permohonan.pdf'
        );
    }
}
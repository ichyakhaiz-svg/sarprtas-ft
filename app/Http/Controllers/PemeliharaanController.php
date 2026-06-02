<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

use App\Models\Pemeliharaan;
use App\Models\LogAktivitas;
use App\Models\MaintenanceChecklist;

class PemeliharaanController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $pemeliharaan = Pemeliharaan::with('barang')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $checklist = MaintenanceChecklist::with('barang')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view(
            'pemeliharaan.index',
            compact(
                'pemeliharaan',
                'checklist'
            )
        );
    }

    /**
     * CREATE
     */
    public function create()
    {
        $barang = Barang::orderBy('nama')
            ->get();

        return view(
            'pemeliharaan.create',
            compact('barang')
        );
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([

            'barang_id' => 'required',
            'jenis' => 'required',
            'jadwal' => 'required',
            'tanggal_terakhir' => 'nullable',
            'tanggal_berikutnya' => 'nullable',
            'status' => 'required',

        ]);

        $pemeliharaan = Pemeliharaan::create([

            'barang_id' =>
                $request->barang_id,

            'jenis' =>
                $request->jenis,

            'jadwal' =>
                $request->jadwal,

            'tanggal_terakhir' =>
                $request->tanggal_terakhir,

            'tanggal_berikutnya' =>
                $request->tanggal_berikutnya,

            'status' =>
                $request->status,

            'keterangan' =>
                $request->keterangan

        ]);

        // LOG AKTIVITAS

        $barang = Barang::find($request->barang_id);

        LogAktivitas::create([

            'username' =>
                auth()->user()->username,

            'aktivitas' =>
                'Menambahkan maintenance barang: '
                . $barang->nama

        ]);

        return redirect('/pemeliharaan')
            ->with(
                'success',
                'Data maintenance berhasil ditambahkan'
            );
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $pemeliharaan =
            Pemeliharaan::findOrFail($id);

        $barang = Barang::orderBy('nama')
            ->get();

        return view(
            'pemeliharaan.edit',
            compact(
                'pemeliharaan',
                'barang'
            )
        );
    }

    /**
     * UPDATE
     */
    public function update(
        Request $request,
        $id
    )
    {
        $pemeliharaan =
            Pemeliharaan::findOrFail($id);

        $pemeliharaan->update([

            'barang_id' =>
                $request->barang_id,

            'jenis' =>
                $request->jenis,

            'jadwal' =>
                $request->jadwal,

            'tanggal_terakhir' =>
                $request->tanggal_terakhir,

            'tanggal_berikutnya' =>
                $request->tanggal_berikutnya,

            'status' =>
                $request->status,

            'keterangan' =>
                $request->keterangan

        ]);

        // LOG

        $barang = Barang::find($request->barang_id);

        LogAktivitas::create([

            'username' =>
                auth()->user()->username,

            'aktivitas' =>
                'Mengupdate maintenance barang: '
                . $barang->nama

        ]);

        return redirect('/pemeliharaan')
            ->with(
                'success',
                'Data maintenance berhasil diupdate'
            );
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $pemeliharaan =
            Pemeliharaan::findOrFail($id);

        $namaBarang =
            $pemeliharaan->barang->nama ?? '-';

        $pemeliharaan->delete();

        // LOG

        LogAktivitas::create([

            'username' =>
                auth()->user()->username,

            'aktivitas' =>
                'Menghapus maintenance barang: '
                . $namaBarang

        ]);

        return redirect('/pemeliharaan')
            ->with(
                'success',
                'Data maintenance berhasil dihapus'
            );
    }
}
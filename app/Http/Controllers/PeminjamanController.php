<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\LogAktivitas;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::orderBy(
            'id',
            'desc'
        )->paginate(10);

        return view(
            'peminjaman.index',
            compact('peminjaman')
        );
    }

    public function create()
    {
        $barang = Barang::all();

        return view(
            'peminjaman.create',
            compact('barang')
        );
    }

    public function store(Request $request)
    {
        $barang = Barang::where(
            'nama',
            $request->nama_barang
        )->firstOrFail();

        // CEK STOK

        if($barang->jumlah <= 0)
        {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Stok barang habis!'
                );
        }

        // KURANGI STOK

        $barang->jumlah =
            $barang->jumlah - 1;

        $barang->status =
            'Dipinjam';

        $barang->save();

        // SIMPAN PEMINJAMAN

        Peminjaman::create([

            'nama_barang' =>
                $request->nama_barang,

            'peminjam' =>
                $request->peminjam,

            'tanggal_pinjam' =>
                $request->tanggal_pinjam,

            'tanggal_kembali' =>
                $request->tanggal_kembali,

            'keperluan' =>
                $request->keperluan,

            'status' =>
                $request->status

        ]);

        // LOG AKTIVITAS

        LogAktivitas::create([
            'username' => auth()->user()->username,
            'aktivitas' => 'Menambahkan peminjaman barang ' . $request->nama_barang
        ]);

        return redirect('/peminjaman')
            ->with(
                'success',
                'Peminjaman berhasil!'
            );
    }

    public function edit($id)
    {
        $peminjaman =
            Peminjaman::findOrFail($id);

        $barang = Barang::all();

        return view(
            'peminjaman.edit',
            compact(
                'peminjaman',
                'barang'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $peminjaman =
            Peminjaman::findOrFail($id);

        $peminjaman->update([

            'nama_barang' =>
                $request->nama_barang,

            'peminjam' =>
                $request->peminjam,

            'tanggal_pinjam' =>
                $request->tanggal_pinjam,

            'tanggal_kembali' =>
                $request->tanggal_kembali,

            'keperluan' =>
                $request->keperluan,

            'status' =>
                $request->status

        ]);

        // LOG AKTIVITAS

        LogAktivitas::create([
            'username' => auth()->user()->username,
            'aktivitas' => 'Mengedit data peminjaman ' . $request->nama_barang
        ]);

        return redirect('/peminjaman');
    }

    public function destroy($id)
    {
        $peminjaman =
            Peminjaman::findOrFail($id);

        $namaBarang = $peminjaman->nama_barang;

        $peminjaman->delete();

        // LOG AKTIVITAS

        LogAktivitas::create([
            'username' => auth()->user()->username,
            'aktivitas' => 'Menghapus data peminjaman ' . $namaBarang
        ]);

        return redirect('/peminjaman');
    }

    public function kembalikan($id)
    {
        $peminjaman =
            Peminjaman::findOrFail($id);

        // UPDATE STATUS PEMINJAMAN

        $peminjaman->status =
            'Dikembalikan';

        $peminjaman->save();

        // CARI BARANG

        $barang = Barang::where(
            'nama',
            $peminjaman->nama_barang
        )->first();

        // UPDATE BARANG

        if($barang)
        {
            // TAMBAH STOK

            $barang->jumlah =
                $barang->jumlah + 1;

            // UBAH STATUS

            $barang->status =
                'Tersedia';

            $barang->save();
        }

        // LOG AKTIVITAS

        LogAktivitas::create([
            'username' => auth()->user()->username,
            'aktivitas' => 'Mengembalikan barang ' . $peminjaman->nama_barang
        ]);

        return redirect('/peminjaman')
            ->with(
                'success',
                'Barang berhasil dikembalikan!'
            );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index', [

            'totalBarang' =>
                Barang::count(),

            'barangDipinjam' =>
                Peminjaman::where(
                    'status',
                    'Dipinjam'
                )->count(),

            'barangTersedia' =>
                Barang::where(
                    'status',
                    'Tersedia'
                )->count(),

            'totalUser' =>
                User::count(),

            'peminjamanTerbaru' =>
                Peminjaman::orderBy('id', 'desc')
                ->take(5)
                ->get()

        ]);
    }
}
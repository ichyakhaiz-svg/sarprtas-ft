<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Pemeliharaan;
use App\Models\LogAktivitas;

class DashboardController extends Controller
{
    public function index()
{
    $totalBarang =
        Barang::count();

    $barangDipinjam =
        Barang::where(
            'status',
            'Dipinjam'
        )->count();

    $barangTersedia =
        Barang::where(
            'status',
            'Tersedia'
        )->count();

    $totalUser =
        User::count();

    $totalMaintenance =
        Pemeliharaan::count();

    $barangRusak =
        Barang::where(
            'status',
            'Rusak'
        )->count();

    $peminjamanTerbaru =
        Peminjaman::latest('id')
        ->take(5)
        ->get();

    $logs =
        LogAktivitas::latest('id')
        ->take(5)
        ->get();

    $chartDipinjam =
        $barangDipinjam;

    $chartTersedia =
        $barangTersedia;

    return view(
        'dashboard',
        compact(
            'totalBarang',
            'barangDipinjam',
            'barangTersedia',
            'totalUser',
            'totalMaintenance',
            'barangRusak',
            'peminjamanTerbaru',
            'logs',
            'chartDipinjam',
            'chartTersedia'
        )
    );
}
}
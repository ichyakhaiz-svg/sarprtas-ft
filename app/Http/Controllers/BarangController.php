<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Merk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BarangImport;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\LogAktivitas;
use App\Models\Peminjaman;
use App\Models\Pemeliharaan;
use App\Models\MaintenanceChecklist;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::with([
                'kategori',
                'lokasi',
                'merk'
            ])
            ->where('nama', 'like', '%' . request('search') . '%')
            ->orWhere('kode', 'like', '%' . request('search') . '%')
            ->paginate(10);

        return view(
            'barang.index',
            compact('barang')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        $merk = Merk::all();

        return view(
            'barang.create',
            compact(
                'kategori',
                'lokasi',
                'merk'
            )
        );
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $gambar = null;

    if ($request->hasFile('gambar'))
    {
        $gambar = $request
            ->file('gambar')
            ->store('barang', 'public');
    }

    Barang::create([

        'nama' => $request->nama,
        'kode' => $request->kode,
        'jumlah' => $request->jumlah,
        'kategori_id' => $request->kategori_id,
        'lokasi_id' => $request->lokasi_id,
        'tahun_pengadaan' => $request->tahun_pengadaan,
        'merk_id' => $request->merk_id,
        'kondisi' => $request->kondisi,
        'gambar' => $gambar

    ]);

    // LOG
    LogAktivitas::create([
        'username' => auth()->user()->username,
        'aktivitas' => 'Menambahkan barang: ' . $request->nama,
    ]);

    return redirect('/barang');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $barang = Barang::with([
        'kategori',
        'lokasi',
        'merk'
    ])->findOrFail($id);

    $peminjaman = Peminjaman::where(
        'nama_barang',
        $barang->nama
    )->latest('id')->get();

    $pemeliharaan = Pemeliharaan::where(
        'barang_id',
        $barang->id
    )->latest('id')->get();

    $checklist = MaintenanceChecklist::all();

    return view(
        'barang.show',
        compact(
            'barang',
            'peminjaman',
            'pemeliharaan',
            'checklist'
        )
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        $merk = Merk::all();

        return view(
            'barang.edit',
            compact(
                'barang',
                'kategori',
                'lokasi',
                'merk'
            )
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
         $barang = Barang::findOrFail($id);

    $gambar = $barang->gambar;

    if ($request->hasFile('gambar'))
    {
        $gambar = $request
            ->file('gambar')
            ->store('barang', 'public');
    }

    $barang->update([

        'nama' => $request->nama,
        'kode' => $request->kode,
        'jumlah' => $request->jumlah,
        'kategori_id' => $request->kategori_id,
        'lokasi_id' => $request->lokasi_id,
        'tahun_pengadaan' => $request->tahun_pengadaan,
        'merk_id' => $request->merk_id,
        'kondisi' => $request->kondisi,
        'gambar' => $gambar

    ]);

    // LOG
    LogAktivitas::create([
        'username' => auth()->user()->username,
        'aktivitas' => 'Mengupdate barang: ' . $request->nama,
    ]);

    return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

    $namaBarang = $barang->nama;

    $barang->delete();

    // LOG
    LogAktivitas::create([
        'username' => auth()->user()->username,
        'aktivitas' => 'Menghapus barang: ' . $namaBarang,
    ]);

    return redirect('/barang');
    }

    public function pdf()
    {
        $barang = Barang::all();

        $pdf = Pdf::loadView('barang.pdf', compact('barang'));

        return $pdf->download('barang.pdf');
    }

    public function import(Request $request)
    {
    Excel::import(
        new BarangImport,
        $request->file('file')
    );

    return redirect('/barang')
        ->with(
            'success',
            'Import berhasil'
        );
    }

    public function qrcode($id)
    {
    $barang = Barang::findOrFail($id);

    return view(
        'barang.qrcode',
        compact('barang')
    );
    }

    public function kartu($id)
    {
    $barang = Barang::findOrFail($id);

    return view(
        'barang.kartu',
        compact('barang')
    );
    }
}
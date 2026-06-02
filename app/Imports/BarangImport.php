<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Merk;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements
    ToCollection,
    WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $kategori = Kategori::firstOrCreate([
                'nama' => $row['kategori']
            ]);

            $lokasi = Lokasi::firstOrCreate([
                'nama' => $row['lokasi']
            ]);

            $merk = Merk::firstOrCreate([
                'nama' => $row['merk']
            ]);

            Barang::create([

                'nama' => $row['nama'],
                'kode' => $row['kode'],
                'jumlah' => $row['jumlah'],

                'kategori_id' => $kategori->id,
                'lokasi_id' => $lokasi->id,
                'merk_id' => $merk->id,

                'tahun_pengadaan' => $row['tahun'],
                'kondisi' => $row['kondisi'],
                'status' => $row['status']

            ]);
        }
    }
}
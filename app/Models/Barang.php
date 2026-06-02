<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public $timestamps = false;

    protected $fillable = [

        'nama',
        'kode',
        'jumlah',
        'kategori_id',
        'lokasi_id',
        'tahun_pengadaan',
        'merk_id',
        'kondisi',
        'status',
        'gambar'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI LOKASI
    |--------------------------------------------------------------------------
    */

    public function lokasi()
    {
        return $this->belongsTo(
            Lokasi::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI MERK
    |--------------------------------------------------------------------------
    */

    public function merk()
    {
        return $this->belongsTo(
            Merk::class
        );
    }
}
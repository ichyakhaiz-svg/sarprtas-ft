<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    protected $table = 'berita_acara';

    protected $fillable = [

        'nomor_ba',
        'nama_barang',
        'tanggal',
        'penyerah',
        'penerima',
        'file_ba'

    ];

    public $timestamps = false;

    public function barang()
{
    return $this->belongsTo(
        Barang::class,
        'barang_id'
    );
}
}
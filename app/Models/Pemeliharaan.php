<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $table = 'pemeliharaan';

    public $timestamps = false;

    protected $fillable = [

        'barang_id',
        'jenis',
        'jadwal',
        'tanggal_terakhir',
        'tanggal_berikutnya',
        'status',
        'keterangan'

    ];

    public function barang()
    {
        return $this->belongsTo(
            Barang::class
        );
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    public $timestamps = false;

    protected $fillable = [

        'nama_barang',
        'peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keperluan',
        'status'

    ];
}
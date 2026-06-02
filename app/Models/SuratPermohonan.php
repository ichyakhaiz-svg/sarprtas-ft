<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPermohonan extends Model
{
    protected $table = 'surat_permohonan';

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'kepada',
        'perihal',
        'keterangan',
        'file_surat'
    ];
}

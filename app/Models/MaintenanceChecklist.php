<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceChecklist extends Model
{
    protected $table = 'maintenance_checklist';

    protected $fillable = [
        'kegiatan',
        'frekuensi',
        'petugas',
        'tahun',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'aug',
        'sep',
        'okt',
        'nov',
        'des'
    ];

    
    protected $guarded = [];

    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(
            Barang::class,
            'barang_id'
        );
    }
}
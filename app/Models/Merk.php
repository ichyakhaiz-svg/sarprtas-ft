<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';

    public $timestamps = false;

    protected $fillable = [
        'nama'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = [
        'nama_jabatan',
        'gaji_pokok',
    ];
}

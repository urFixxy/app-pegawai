<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];
}

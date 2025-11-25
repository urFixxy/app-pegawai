<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relationship dengan Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
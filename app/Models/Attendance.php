<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
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

    // Accessor untuk format tanggal Indonesia
    public function getFormattedTanggalAttribute()
    {
        return $this->tanggal->format('d/m/Y');
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return [
            'hadir' => 'green',
            'izin' => 'blue',
            'sakit' => 'yellow',
            'alpha' => 'red',
        ][$this->status_absensi] ?? 'gray';
    }
}
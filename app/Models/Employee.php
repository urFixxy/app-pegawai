<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'department_id',
        'jabatan_id',
        'status',
    ];

    // Relasi ke Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // Relasi ke Position/Jabatan
    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}

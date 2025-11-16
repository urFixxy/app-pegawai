<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_hari',
        'deskripsi',
        'status',
        'disetujui_oleh',
    ];

    // Relasi
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    // Hitung total hari otomatis
    public function setStartDateAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = $value;
        $this->calculateTotalDays();
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['tanggal_selesai'] = $value;
        $this->calculateTotalDays();
    }

    protected function calculateTotalDays()
    {
        if (!empty($this->tanggal_mulai) && !empty($this->tanggal_selesai)) {
            $this->attributes['total_hari'] =
                (new \Carbon\Carbon($this->tanggal_selesai))
                    ->diffInDays(new \Carbon\Carbon($this->tanggal_mulai)) + 1;
        }
    }
}

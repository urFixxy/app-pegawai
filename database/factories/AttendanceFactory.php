<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AttendanceFactory extends Factory
{
    public function definition()
    {
        return [
            'karyawan_id' => Employee::inRandomOrder()->first()->id, // ambil random karyawan
            'tanggal' => Carbon::today()->toDateString(),
            'waktu_masuk' => $this->faker->dateTimeBetween('07:00:00', '09:00:00')->format('H:i:s'),
            'waktu_keluar' => $this->faker->dateTimeBetween('16:00:00', '18:00:00')->format('H:i:s'),
            'status_absensi' => 'hadir'
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_telepon' => $this->faker->numerify('08##########'),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'jabatan_id' => rand(1, 6), 
            'department_id' => rand(1, 10), 
            'tanggal_masuk' => $this->faker->date(),
            'status' => 'Aktif',
        ];
    }
}

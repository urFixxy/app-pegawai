<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) { 
        $table->id(); 
        $table->foreignId('karyawan_id')->constrained('employees')->onDelete('cascade');
        $table->String('bulan', 10);
        $table->decimal('gaji_pokok', 10, 2);
        $table->decimal('tunjangan', 10, 2);
        $table->decimal('potongan', 10, 2);
        $table->decimal('total_gaji', 10, 2);
 });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

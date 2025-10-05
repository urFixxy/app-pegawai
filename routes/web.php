<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;

// Halaman utama -> redirect ke employees
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Route resource untuk employees dan departments
Route::resource('employees', EmployeesController::class);
Route::resource('departments', DepartmentsController::class);

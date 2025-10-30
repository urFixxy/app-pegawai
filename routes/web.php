<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\SalariesController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeesController::class);
    Route::resource('departments', DepartmentsController::class);
    Route::resource('attendances', AttendancesController::class);
    Route::resource('positions', PositionsController::class);
    Route::resource('salaries', SalariesController::class);
});

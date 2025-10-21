<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\SalariesController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeesController::class);
Route::resource('departments', DepartmentsController::class);
Route::resource('attendances', AttendancesController::class);
Route::resource('positions', PositionsController::class);
Route::resource('salaries', SalariesController::class);
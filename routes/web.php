<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;

Route::get('/', function () {
    return view('sign');
});

Route::post('/sign', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'fitdafac@gmail.com' && $password === '15112005') {
        return redirect('employees')->with('success', 'Login berhasil!');
    } else {
        return back()->withErrors(['login' => 'Email atau password salah.']);
    }
});

Route::resource('employees',EmployeesController::class);

Route::resource('departments',DepartmentsController::class);
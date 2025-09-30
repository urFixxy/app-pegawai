<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;

// Halaman login
Route::get('/', function () {
    return view('sign');
})->name('login')->middleware('guest');

// Proses login
Route::post('/sign', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('employees')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'login' => 'Email atau password salah.',
    ]);
});

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Berhasil logout!');
})->middleware('auth')->name('logout');

// Proteksi route dengan auth
Route::middleware('auth')->group(function () {
    Route::resource('employees', EmployeesController::class);
    Route::resource('departments', DepartmentsController::class);
});

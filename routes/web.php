<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('sign');
});

Route::post('/sign', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'fitdafac@gmail.com' && $password === '15112005') {
        return redirect('/employee')->with('success', 'Login berhasil!');
    } else {
        return back()->withErrors(['login' => 'Email atau password salah.']);
    }
});

route::get('/employee', function() {
    return view('employee');
});

route::get('/department', function() {
    return view('department');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

route::get('/', function() {
    return view('employee');
});
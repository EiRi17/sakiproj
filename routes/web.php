<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('dbconnect');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

// Registration routes
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

// Userpage (after login)
Route::get('/userpage', function () {
    return view('userpage');
})->name('userpage');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
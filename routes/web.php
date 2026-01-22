<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

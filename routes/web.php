<?php

use App\Http\Controllers\UserController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//register
Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register', [RegisterController::class,'store'])->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('user',[UserController::class, 'index']);
Route::resource('user', UserController::class);

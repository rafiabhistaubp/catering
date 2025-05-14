<?php

use App\Http\Controllers\UserController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PesanController;
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

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('forgot.password.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('user', UserController::class);

Route::resource('pesan', PesanController::class);

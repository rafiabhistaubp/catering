<?php

use App\Http\Controllers\UserController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('forgot.password.submit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('pesan', PesanController::class);
    Route::get('monitor', [MonitoringController::class, 'index'])->name('monitor.index');
    Route::get('monitor/dm', [MonitoringController::class, 'dm'])->name('monitor.dm');
    Route::get('monitor/hadir', [MonitoringController::class, 'hadir'])->name('monitor.hadir');
    Route::resource('laporan', LaporanController::class);
});


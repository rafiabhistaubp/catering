<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');  
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',  // Cukup validasi bahwa password diisi
        ]);

        // Mencari pengguna berdasarkan nama
        $user = User::where('name', $request->name)->first();

        // Memverifikasi password yang di-hash
        if ($user && Hash::check($request->password, $user->password)) {
            // Jika login berhasil, autentikasi pengguna dan redirect ke halaman utama
            Auth::login($user);
            return redirect()->route('home');  // Pastikan ada route 'index' yang terdefinisi
        }

        // Jika login gagal, kembali ke form login dengan pesan error
        return back()->withErrors(['login' => 'Login gagal! Periksa username atau password.']);
    }
}

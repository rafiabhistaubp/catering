<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Tampilkan halaman login
    }

    // Menentukan nama field yang digunakan untuk login
    public function username()
    {
        return 'username'; // Gunakan 'username' untuk login
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        // Cari user berdasarkan username
        $user = User::where('username', $credentials['username'])->first();
    
        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan.'])->withInput();
        }
    
        // Cek password secara manual menggunakan Hash::check()
        if (Hash::check($credentials['password'], $user->password)) {
            // Jika password benar, login user
            Auth::login($user);
            return redirect()->intended('dashboard');
        }
    
        // Jika password salah
        return back()->withErrors([
            'password' => 'Password salah.',
        ])->withInput();
    } 
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}

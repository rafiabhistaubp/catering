<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|string|max:255',
        ]);

        // Simpan user baru
        User::create([
            'username' => Str::lower($data['username']),
            'password' => bcrypt($data['password']),
            'nama_lengkap' => $data['nama_lengkap'],
            'role' => 'admin', // Set otomatis admin
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil');
    }
}

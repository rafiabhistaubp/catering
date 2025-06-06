<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Fungsi login untuk membuat token
=======
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
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
<<<<<<< HEAD
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    // Fungsi logout untuk menghapus token
    public function logout(Request $request)
    {
        // Hapus semua token
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out successfully']);
=======
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
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    }
}

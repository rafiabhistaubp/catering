<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute login untuk autentikasi
Route::post('login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        return response()->json([
            'token' => $user->createToken('YourAppName')->plainTextToken
        ]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});

// Rute logout untuk mencabut token
Route::middleware('auth:sanctum')->post('logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete(); // Menghapus token aktif
    return response()->json(['message' => 'Logout successful']);
});

// Rute untuk mendapatkan data pengguna yang terautentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();  // Mengembalikan data pengguna yang terautentikasi
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('user.create');
    }

    // Menyimpan pengguna baru
   public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users,username',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:admin,koki,karyawan',
            'no_hp' => 'required|numeric|digits_between:8,15',
            'shift' => 'required|in:1,2,3',
        ]);

        User::create([
            'username' => Str::lower($data['username']),
            'nama_lengkap' => $data['nama_lengkap'],
            'role' => $data['role'],
            'no_hp' => $data['no_hp'],
            'password' => Hash::make($data['no_hp']), // no_hp juga jadi password
            'shift' => $data['shift'],

        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }
    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:admin,koki,karyawan',
            'no_hp' => 'required|numeric|min:8', // Validasi no_hp sebagai angka
        ]);

        $user->update([
            'username' => Str::lower($data['username']),
            'password' => $data['password'] ? bcrypt($data['password']) : $user->password,
            'nama_lengkap' => $data['nama_lengkap'],
            'role' => $data['role'],
            'no_hp' => $data['no_hp'], // Simpan no_hp dalam format teks biasa
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

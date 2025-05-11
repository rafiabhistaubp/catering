<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

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
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:admin,koki,karyawan',
        ]);

        User::create([
            'username' => Str::lower($data['username']),
            'password' => bcrypt($data['password']),
            'nama_lengkap' => $data['nama_lengkap'],
            'role' => $data['role'],
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
        ]);

        $user->update([
            'username' => Str::lower($data['username']),
            'password' => $data['password'] ? bcrypt($data['password']) : $user->password,
            'nama_lengkap' => $data['nama_lengkap'],
            'role' => $data['role'],
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

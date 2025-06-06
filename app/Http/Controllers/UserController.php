<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index(Request $request) 
    {
        $search = $request->get('search');
        $search = trim($search);  // Menghapus spasi di awal dan akhir

        // Mulai query dengan filter role karyawan
<<<<<<< HEAD
        $query = User::query();
=======
        $query = User::where('role', 'karyawan');
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83

        // Hanya lakukan pencarian jika ada input yang valid
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('nama_lengkap', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%');
            });
        }

        // Ambil data dengan paginasi
<<<<<<< HEAD
        $users = $query->paginate(10);  // Gunakan paginate setelah query, bukan all()

        return view('user.index', compact('users'));
    }

=======
        $users = $query->paginate(10);

        return view('user.index', compact('users'));
    }
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('user.create');
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:admin,koki,karyawan',
            'no_hp' => 'required|numeric|digits_between:8,15',
            'shift' => 'required|in:1,2,3',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.index', ['openModal' => 1])
                ->withErrors($validator)
                ->withInput();
        }


        User::create([
            'username' => Str::lower($request->username),
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->no_hp),
            'shift' => $request->shift,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit pengguna
<<<<<<< HEAD
    public function edit( $id )
    {
       $user = User::findOrFail($id);
    return response()->json($user);
=======
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        // Ambil data pengguna
        $user = User::findOrFail($id);

        // Validasi input
=======
        $user = User::findOrFail($id);

>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'shift' => 'required|in:1,2,3',
            'username' => 'required|email|max:255',
<<<<<<< HEAD
            'password' => 'nullable|string|min:8|confirmed', // Validasi password
=======
            'no_hp' => 'required|numeric|min:8|max:15',
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
            'role' => 'required|in:admin,karyawan,koki',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
        ]);

<<<<<<< HEAD
        // Update data pengguna tanpa password terlebih dahulu
        $user->update($validatedData);

        // Jika password diubah, enkripsi dan simpan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);  // Mengenkripsi password baru
            $user->save();
        }

        // Jika request dilakukan dengan AJAX, kembalikan response JSON
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Data karyawan berhasil diperbarui.']);
        }

        // Redirect jika tidak menggunakan AJAX
        return redirect()->route('user.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

=======
        $user->update($validatedData);

        // Jika request dilakukan dengan AJAX, kembalikan response JSON
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('user.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }


>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

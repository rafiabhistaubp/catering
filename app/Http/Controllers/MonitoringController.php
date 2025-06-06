<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;  


class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('monitor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
     public function dm()
    {
          $pesans = Pesan::all();
        return view('monitor.dm', compact('pesans'));
    }
    public function hadir(Request $request)
    {
        // Mendapatkan parameter pencarian dari request
        $search = $request->get('search');
        $search = trim($search);  // Menghapus spasi di awal dan akhir

        // Query builder untuk mengambil data karyawan
        $users = User::query();

        // Cek jika ada parameter pencarian
        if (!empty($search)) {
            $users->where(function ($query) use ($search) {
                $query->where('nama_lengkap', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%');
            });
        }

        // Ambil data karyawan dengan paginasi
        $users = $users->paginate(10);  // Gunakan paginate setelah query, bukan all()

        // Mengambil data makanan yang diterima dari table makanan_terima
        $makananTerima = DB::table('makanan_terima')
            ->join('users', 'makanan_terima.user_id', '=', 'users.id')
            ->select('makanan_terima.*', 'users.nama_lengkap') // Menampilkan kolom yang diinginkan
            ->paginate(10);  // Anda bisa menyesuaikan jumlah data yang ditampilkan

        return view('monitor.hadir', compact('users', 'makananTerima'));
    }

}

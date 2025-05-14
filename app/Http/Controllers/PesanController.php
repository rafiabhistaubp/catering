<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $search = trim($search);  // Menghapus spasi di awal dan akhir

        // Mulai query tanpa filter berdasarkan role
        $query = Pesan::query();

        // Hanya lakukan pencarian jika ada input yang valid
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('deskripsi', 'like', '%'.$search.'%')
                    ->orWhere('porsi', 'like', '%'.$search.'%');
            });
        }

        // Ambil data dengan pagination menggunakan query yang telah difilter
        $pesans = $query->paginate(10); // Menampilkan 10 data per halaman

        return view('pesan.index', compact('pesans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input (optional but recommended)
        $validatedData = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'untuk_tanggal' => 'required|date',
            'porsi' => 'required|integer',
            'shift' => 'required|in:1,2,3',
        ]);

        // Create a new Pesan record
        Pesan::create([
            'deskripsi' => $validatedData['deskripsi'],  // Deskripsi pesanan
            'untuk_tanggal' => $validatedData['untuk_tanggal'],  // Tanggal untuk pesanan
            'porsi' => $validatedData['porsi'],  // Jumlah porsi
            'shift' => $validatedData['shift'],  // Shift kerja
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        //
    }
}

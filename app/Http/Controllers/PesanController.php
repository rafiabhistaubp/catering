<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

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
            'nama_makanan' => 'required|string|max:255',
            'untuk_tanggal' => 'required|date',
            'porsi' => 'required|integer',
            'shift' => 'required|in:1,2,3',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi foto
        ]);

        // Menangani foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            // Menyimpan file gambar sementara
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Mendapatkan path gambar yang diupload
            $imagePath = $image->getRealPath();
            
            // Membaca gambar menggunakan GD (format JPEG, PNG, dll)
            $img = imagecreatefromjpeg($imagePath);  // Ganti dengan imagecreatefrompng atau imagecreatefromgif jika format lain

            // Mendapatkan dimensi gambar asli
            $width = imagesx($img);
            $height = imagesy($img);

            // Tentukan ukuran baru
            $newWidth = 800;
            $newHeight = 800;

            // Membuat gambar baru dengan ukuran yang diubah
            $newImg = imagecreatetruecolor($newWidth, $newHeight);

            // Menyesuaikan gambar dengan ukuran baru
            imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Menyimpan gambar yang sudah diubah ukurannya
            imagejpeg($newImg, storage_path('app/public/uploads/foto/' . $imageName));

            // Menyimpan path gambar ke variabel
            $fotoPath = 'uploads/foto/' . $imageName;

            // Membersihkan memori
            imagedestroy($img);
            imagedestroy($newImg);
        }

        // Menyimpan data pesanan baru
        Pesan::create([
            'deskripsi' => $validatedData['deskripsi'],
            'nama_makanan' => $validatedData['nama_makanan'],
            'untuk_tanggal' => $validatedData['untuk_tanggal'],
            'porsi' => $validatedData['porsi'],
            'shift' => $validatedData['shift'],
            'foto' => $fotoPath,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        // Menampilkan detail pesanan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('pesan.edit', compact('pesan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        // Validasi input
        $validatedData = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'nama_makanan' => 'required|string|max:255',
            'untuk_tanggal' => 'required|date',
            'porsi' => 'required|integer',
            'shift' => 'required|in:1,2,3',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // Menangani foto jika ada
        $fotoPath = $pesan->foto; // Menggunakan foto yang ada jika tidak ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fotoPath) {
                $oldFilePath = storage_path('app/public/' . $fotoPath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);  // Menghapus foto lama
                }
            }

            // Menyimpan file gambar sementara
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Mendapatkan path gambar yang diupload
            $imagePath = $image->getRealPath();
            
            // Menangani format gambar dengan GD
            if ($image->getClientOriginalExtension() == 'jpeg' || $image->getClientOriginalExtension() == 'jpg') {
                $img = imagecreatefromjpeg($imagePath);
                // Menyimpan gambar yang sudah diubah ukurannya
                imagejpeg($img, storage_path('app/public/uploads/foto/' . $imageName));
            } elseif ($image->getClientOriginalExtension() == 'png') {
                $img = imagecreatefrompng($imagePath);
                // Menyimpan gambar yang sudah diubah ukurannya
                imagepng($img, storage_path('app/public/uploads/foto/' . $imageName));
            } elseif ($image->getClientOriginalExtension() == 'gif') {
                $img = imagecreatefromgif($imagePath);
                // Menyimpan gambar yang sudah diubah ukurannya
                imagegif($img, storage_path('app/public/uploads/foto/' . $imageName));
            } else {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }

            // Set path gambar untuk disimpan di database
            $fotoPath = 'uploads/foto/' . $imageName;

            // Membersihkan memori
            imagedestroy($img);
        }

        // Perbarui data pesanan yang ada
        $pesan->update([
            'deskripsi' => $validatedData['deskripsi'],
            'nama_makanan' => $validatedData['nama_makanan'],
            'untuk_tanggal' => $validatedData['untuk_tanggal'],
            'porsi' => $validatedData['porsi'],
            'shift' => $validatedData['shift'],
            'foto' => $fotoPath,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pesans = Pesan::findOrFail($id);
        $pesans->delete();

        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}

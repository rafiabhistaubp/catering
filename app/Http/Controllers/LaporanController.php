<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pesan;
use App\Models\MakananTerima;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari pesanan dan makanan_terima
        $laporan = DB::table('pesanan')
        ->join('makanan_terima', 'pesanan.id', '=', 'makanan_terima.pesanan_id')
        ->select(
            'pesanan.nama_makanan',
            DB::raw('SUM(pesanan.porsi) as jumlah_porsi_dipesan'),
            DB::raw('SUM(makanan_terima.porsi_terima) as jumlah_porsi_dikonumsi'),
            DB::raw('(pesanan.porsi - SUM(makanan_terima.porsi_terima)) as sisa_porsi'),
            DB::raw('(pesanan.porsi - (SELECT SUM(porsi_terima) FROM makanan_terima WHERE pesanan_id = pesanan.id)) as sisa_tidak_dikonumsi')
        )
        ->groupBy('pesanan.id')
        ->get();


        return view('laporan.index', compact('laporan'));
    }

    public function updatePorsi()
    {
        // Mengurangi jumlah porsi di tabel pesanan berdasarkan jumlah porsi yang diterima
        $makanan_terima = MakananTerima::all();
        
        foreach ($makanan_terima as $item) {
            // Update tabel pesanan untuk mengurangi jumlah porsi yang dipesan
            $pesanan = Pesan::find($item->pesanan_id);
            if ($pesanan) {
                $pesanan->jumlah_porsi -= $item->porsi_terima;
                $pesanan->save();
            }
        }

        return redirect()->route('laporan.index')->with('success', 'Jumlah porsi diperbarui');
    }
}

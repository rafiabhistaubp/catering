<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        
=======
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
        $users = User::where('role', 'karyawan')->get();
        $jumlahKaryawan = User::where('role', 'karyawan')->count();
        $jumlahPesanan = Pesan::sum('porsi');
        return view('dashboard.index', compact('users', 'jumlahKaryawan', 'jumlahPesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}

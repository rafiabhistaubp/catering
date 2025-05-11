@extends('layouts.master')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <div class="main-content">
        <!-- Kolom Kiri: Tabel Data Karyawan -->
        <div class="table-section">
            <!-- Kartu Informasi -->
            <div class="cards">
                <div class="card">
                    <span>30,000</span>
                    Data Karyawan
                </div>
                <div class="card">
                    <span>30,000</span>
                    Jumlah Pesanan Makanan Untuk Hari Ini
                </div>
                <div class="card">
                    <span>30,000</span>
                    Data Karyawan
                </div>
            </div>

            <!-- Tabel Data Karyawan -->
            <div class="section">
                <h2>All</h2>
                <input type="text" placeholder="Search" class="search">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Shift</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mayla</td>
                            <td>1</td>
                            <td>Maylove@gmail.com</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>Bunga</td>
                            <td>2</td>
                            <td>Bungacilya@gmail.com</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>Asniya</td>
                            <td>1</td>
                            <td>Asniyatutik@gmail.com</td>
                            <td>Laki-laki</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Kolom Kanan: Shift Info -->
        <div class="shift-info-container">
            <div class="shift-info">
                <h3>Telah Mengambil Makan Hari Ini (Shift 1)</h3>
                <div class="shift-persons">
                    <p>Abiyyu</p>
                    <p>Ronaldo</p>
                    <p>Mayla</p>
                </div>
                <button>View all</button>
            </div>

            <div class="shift-info">
                <h3>Telah Mengambil Makan Hari Ini (Shift 2)</h3>
                <div class="shift-persons">
                    <p>Jamal</p>
                    <p>Dobieh</p>
                    <p>Kabar</p>
                </div>
                <button>View all</button>
            </div>
        </div>
    </div>
@endsection

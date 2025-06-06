@extends('layouts.master')

@section('title', 'Laporan Porsi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endpush

@section('content')
<div class="main-content">
    <!-- Table Section with Search and Add Button -->
    <div class="table-section">
        
        <!-- Column for Search Form and Table -->
        <div class="table-column">
            <!-- Search Form -->
            <div class="header">
                <h2>Laporan</h2>
                <h4>Rekap porsi tersisa dan tidak dikonsumsi</h4>

                <form action="{{ route('laporan.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search" class="search">
                    <button type="submit" class="btn-search">Cari</button>
                </form>
            </div>

            <!-- Table for Karyawan Data -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Jumlah Pesan</th>
                        <th>Jumlah Konsumsi</th>
                        <th>Sisa Porsi</th>
                        <th>Sisa Tidak Dikonsumsi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->nama_makanan }}</td>
                        <td>{{ $data->jumlah_porsi }}</td>
                        <td>{{ $data->porsi_terima }}</td>
                        <td>{{ $data->sisa_porsi }}</td>
                        <td>{{ $data->sisa_tidak_dikonsumsi }}</td>
                        <td>Porsi sisa karena pelanggan tidak hadir</td>
                    </tr>
            @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Next</a>
            </div>
        </div>

        <!-- Column for Add Button -->
        <div class="add-column">
            <a href="javascript:void(0);" class="btn-add">+</a>
        </div>

    </div>
</div>

@endsection

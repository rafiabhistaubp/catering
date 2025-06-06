@extends('layouts.master')

@section('title', 'Monitoring Konsumsi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('content')
<div class="cards">
    @foreach ($pesans as $pesan)
        <div class="card">
            <div class="card-image">
                <!-- Menampilkan foto jika ada -->
                @if ($pesan->foto)
                    <img src="{{ asset('storage/' . $pesan->foto) }}" alt="Foto Pesanan">
                @else
                    <img src="path-to-default-image.jpg" alt="No Image Available">
                @endif
            </div>
            <div class="card-details">
                <p><strong>Nama Makanan</strong>: {{ $pesan->nama_makanan }}</p>
                <p><strong>Konsumsi Tersedia</strong>: {{ $pesan->porsi }}</p>
                <p><strong>Jam Kerja (Shift)</strong>: Shift {{ $pesan->shift }}</p>
                <p><strong>Tanggal Distribusi</strong>: {{ \Carbon\Carbon::parse($pesan->untuk_tanggal)->format('d F Y') }}</p>
                <p class="date"><strong>Distribusi pada</strong>: {{ \Carbon\Carbon::parse($pesan->untuk_tanggal)->format('d F Y') }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection

@push('scripts')

@endpush
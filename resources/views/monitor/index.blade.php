@extends('layouts.master')

@section('title', 'Monitoring Konsumsi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/monitor.css') }}">
@endpush

@section('content')
<div class="cards">
  <div class="card-container">
    <a href="{{ route('monitor.dm') }}" class="card-link">
      <div class="card">
        <i class="fas fa-utensils"></i>
      </div>
      <p class="card-text">Distribusi Makanan</p>
    </a>
  </div>

  <div class="card-container">
    <a href="{{ route('monitor.hadir') }}" class="card-link">
      <div class="card">
        <i class="fas fa-users"></i>
      </div>
      <p class="card-text">Kehadiran Konsumsi Karyawan</p>
    </a>
  </div>
</div>
@endsection

@push('scripts')

@endpush
@extends('layouts.master')

@section('title', 'Monitoring Kehadiran Karyawan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/hadir.css') }}">
@endpush

@section('content')
    <div class="main-content">
        <div class="table-section">
            <!-- Kolom Kiri (Tabel Data Karyawan) -->
            <div class="table-column">
                <div class="header">
                    <h2>Kehadiran Konsumsi Karyawan</h2>
                    <h4>Daftar yang sudah menerima makan</h4>

                    <!-- Form Pencarian -->
                    <form action="{{ route('monitor.hadir') }}" method="GET" class="search-form" onsubmit="return validateSearch()">
                        <input type="text" name="search" placeholder="Cari Karyawan" class="search" value="{{ request()->get('search') ?? '' }}">
                        <button type="submit" class="btn-search">Cari</button>
                        @if(request()->get('search') !== null && request()->get('search') !== '')
                            <a href="{{ route('monitor.hadir') }}" class="btn-reset">Reset</a>
                        @endif
                    </form>
                </div>

                <!-- Tabel Data Karyawan -->
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
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td class="shift-{{ $user->shift }}">{{ $user->shift }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->jenis_kelamin }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                {{ $users->links() }}
            </div>

        </div>
    </div>
@endsection
@push('scripts')
<script>
    function validateSearch() {
        const searchValue = document.querySelector('input[name="search"]').value.trim();
        if (searchValue === '') {
            // Jika search kosong, mencegah pengiriman form dan redirect ke URL tanpa query string
            window.location.href = "{{ route('monitor.hadir') }}"; // Mengarahkan ke halaman tanpa query string
            return false;
        }
        return true; // Lanjutkan mengirim form jika ada input pencarian
    }
</script>
 @endpush   

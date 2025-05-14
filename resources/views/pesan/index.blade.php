@extends('layouts.master')

@section('title', 'Data Pesanan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="table-section">
        <div class="header">
            <h2>Pemesanan Makanan</h2>

            <!-- Form Pencarian -->
            <form action="{{ route('pesan.index') }}" method="GET" class="search-form" onsubmit="return validateSearch()">
                <input type="text" name="search" placeholder="Search" class="search" value="{{ request()->get('search') ?? '' }}">
                <button type="submit" class="btn-search">Cari</button>
                @if(request()->get('search') !== null && request()->get('search') !== '')
                    <a href="{{ route('pesan.index') }}" class="btn-reset">Reset</a>
                @endif
            </form>

            <!-- Tombol buka modal -->
            <a href="javascript:void(0);" id="openModal" class="btn-add">+</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <!-- Tabel Data Pesanan -->
        <table>
            <thead>
                <tr>
                    <th>Deskripsi Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Untuk Tanggal</th>
                    <th>Banyak Porsi</th>
                    <th>Shift</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesans as $pesan)
                <tr>
                    <td>{{ $pesan->deskripsi }}</td>
                    <td>{{ $pesan->tanggal_pesanan }}</td>
                    <td>{{ $pesan->untuk_tanggal }}</td>
                    <td>{{ $pesan->porsi }}</td>
                    <td>{{ $pesan->shift }}</td>
                    <td>
                        <a href="{{ route('pesan.edit', $pesan->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $pesans->links() }}
    </div>

    <!-- Modal -->
    @include('pesan.create')
</div>
@endsection

@push('scripts')
<script>
    window.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modal");
        const openModalButton = document.getElementById("openModal");
        const closeModalButton = document.getElementById("closeModal");

        // ✅ Buka modal jika ada ?openModal=1
        const params = new URLSearchParams(window.location.search);
        if (params.get("openModal") === "1" && modal) {
            modal.style.display = "flex";

            // 🔥 Hapus param setelah modal terbuka (biar ga muncul pas refresh)
            setTimeout(() => {
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 200);
        }

        // Klik tombol +
        openModalButton?.addEventListener("click", () => {
            modal.style.display = "flex";
        });

        // Klik tombol x
        closeModalButton?.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // Klik luar modal
        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    });

    function validateSearch() {
        const searchValue = document.querySelector('input[name="search"]').value.trim();
        if (searchValue === '') {
            // Jika search kosong, mencegah pengiriman form dan redirect ke URL tanpa query string
            window.location.href = "{{ route('pesan.index') }}"; // Mengarahkan ke halaman tanpa query string
            return false;
        }
        return true; // Lanjutkan mengirim form jika ada input pencarian
    }
</script>
@endpush
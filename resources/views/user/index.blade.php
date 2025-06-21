@extends('layouts.master')

@section('title', 'Data Karyawan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="table-section">
        <div class="header">
            <h2>Data Karyawan</h2>
            <h4>Monitor Data Karyawan</h4>

            <!-- Form Pencarian -->
            <form action="{{ route('user.index') }}" method="GET" class="search-form" onsubmit="return validateSearch()">
                <input type="text" name="search" placeholder="Search" class="search" value="{{ request()->get('search') ?? '' }}">
                <button type="submit" class="btn-search">Cari</button>
                @if(request()->get('search') !== null && request()->get('search') !== '')
                    <a href="{{ route('user.index') }}" class="btn-reset">Reset</a>
                @endif
            </form>

            <!-- Tombol buka modal -->
            <!-- Tombol Create -->
        <!-- Tombol Create -->
        <!-- Tombol Create -->
        <a href="javascript:void(0);" id="openModal" class="btn-add">+</a>
        </div>

        
        <!-- Tabel Data Karyawan -->
        <table>
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Shift</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Opsi</th>
                    <th>jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->nama_lengkap }}</td>
                    <td>{{ $user->shift }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role}}</td>
                    <td>{{ $user->jenis_kelamin}}</td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-edit" 
                            data-user-id="{{ $user->id }}" 
                            data-nama="{{ $user->nama_lengkap }}" 
                            data-shift="{{ $user->shift }}" 
                            data-username="{{ $user->username }}" 
                            data-role="{{ $user->role }}" 
                            data-jenis-kelamin="{{ $user->jenis_kelamin }}">Edit</a>

                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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
        {{ $users->links() }}
    </div>

    <!-- Modal -->
    @include('user.create')
    @include('user.edit')
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}", // Menampilkan pesan dari session
                showConfirmButton: false,
                timer: 3000  // Notifikasi hilang setelah 3 detik
            });
        </script>
    @endif
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
            window.location.href = "{{ route('user.index') }}"; // Mengarahkan ke halaman tanpa query string
            return false;
        }
        return true; // Lanjutkan mengirim form jika ada input pencarian
    }
</script>
<script>
    window.addEventListener("DOMContentLoaded", () => {
    const modalEdit = document.getElementById("modalEdit");
    const openModalButton = document.querySelectorAll(".btn-edit"); // Tombol Edit
    const closeModalButton = document.getElementById("closeEditModal"); // Tombol penutupan modal

    // Klik tombol Edit untuk membuka modal
    openModalButton.forEach(button => {
        button.addEventListener("click", (e) => {
            const userId = e.target.dataset.userId;
            const nama = e.target.dataset.nama;
            const shift = e.target.dataset.shift;
            const username = e.target.dataset.username;
            const role = e.target.dataset.role;
            const jenisKelamin = e.target.dataset.jenisKelamin;

            // Isi data pengguna di dalam modal
            document.getElementById("editNama_lengkap").value = nama;
            document.getElementById("editShift").value = shift;
            document.getElementById("editUsername").value = username;
            document.getElementById("editRole").value = role;
            document.getElementById("editJenis_kelamin").value = jenisKelamin;

            // Menampilkan modal
            modalEdit.style.display = "block";

            // Ubah action form dengan ID pengguna
            document.getElementById("editForm").action = `/user/${userId}`; // Menetapkan form action ke URL yang sesuai
        });
    });

    // Klik tombol X untuk menutup modal
    closeModalButton?.addEventListener("click", () => {
        modalEdit.style.display = "none";
    });

    // Klik luar modal untuk menutup modal
    window.addEventListener("click", (e) => {
        if (e.target === modalEdit) {
            modalEdit.style.display = "none";
        }
    });
});

</script>
@endpush

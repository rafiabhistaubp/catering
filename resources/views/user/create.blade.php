@extends('layouts.master')  <!-- Melekatkan ke layout utama -->

@section('title', 'Tambah Data Karyawan')  <!-- Menentukan judul halaman -->

@section('content')  <!-- Konten yang akan ditampilkan -->
    <!-- Tombol untuk membuka modal -->
    <button id="openModal">Tambah Data Karyawan</button>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Menambahkan Data Karyawan</h2>
            <form>
                <label for="nama">Nama Karyawan</label>
                <input type="text" id="nama" name="nama" required placeholder="Nama Karyawan">

                <label for="shift">Jam Kerja (Shift)</label>
                <select id="shift" name="shift">
                    <option value="1">Shift 1</option>
                    <option value="2">Shift 2</option>
                    <option value="3">Shift 3</option>
                </select>

                <label for="email">Email Karyawan</label>
                <input type="email" id="email" name="email" required placeholder="Email Karyawan">

                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>

                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>
@endsection

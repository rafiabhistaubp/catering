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
                <form action="{{ route('user.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search" class="search" value="{{ request()->get('search') }}">
                </form>
                <!-- Button to trigger modal -->
                <a href="javascript:void(0);" id="openModal" class="btn-add">+</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Shift</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->shift }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-edit">Edit</a>
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
        </div>

        <!-- Modal -->
        <!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Menambahkan Data Karyawan</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="nama">Nama Karyawan</label>
            <input type="text" id="nama" name="nama_lengkap" required placeholder="Nama Karyawan">

            <label for="shift">Jam Kerja (Shift)</label>
            <select id="shift" name="shift">
                <option value="1">Shift 1</option>
                <option value="2">Shift 2</option>
                <option value="3">Shift 3</option>
            </select>

            <label for="email">Email Karyawan</label>
            <input type="email" id="email" name="username" required placeholder="Email Karyawan">

            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>

            <button type="submit">Tambah</button>
        </form>
    </div>
</div>

        </div>
    </div>
    <script src="{{asset ('js/user.js') }}"></script>

@endsection

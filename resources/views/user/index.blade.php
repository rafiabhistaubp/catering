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
                <a href="{{ route('user.create') }}" class="btn-add">+</a>
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
    </div>
@endsection

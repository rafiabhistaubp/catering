<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Menambahkan file CSS untuk layout umum -->
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">

    <!-- Menambahkan file CSS yang dikompilasi oleh Vite -->
   
    <!-- File tambahan CSS untuk halaman tertentu -->
    @stack('styles')
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        @include('layouts.sidebar') <!-- Sidebar yang akan diletakkan di folder resources/views/layouts -->

        <!-- Konten Utama -->
        <div class="main-content">
            <!-- Navbar -->
            @include('layouts.navbar') <!-- Navbar yang akan diletakkan di folder resources/views/partials -->

            <!-- Konten Halaman Spesifik -->
            @yield('content') <!-- Konten halaman spesifik akan ditampilkan di sini -->
        </div>
    </div>

</body>

</html>

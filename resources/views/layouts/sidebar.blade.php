<!-- resources/views/partials/sidebar.blade.php -->
<div class="sidebar">
    <div class="logo">
        <span>Logo/Nama Perusahaan</span>
    </div>
    <div class="menu">
        <a href="{{ route('dashboard') }}" class="menu-item active">Dashboard</a>
        <a href="{{ route('user.index') }}" class="menu-item">Data Karyawan</a>
        <a href="#" class="menu-item">Pesanan Makanan</a>
        <a href="#" class="menu-item">Monitoring Konsumsi</a>
        <a href="#" class="menu-item">Laporan</a>
    </div>
    <div class="bottom-menu">
        <a href="#" class="menu-item">Settings</a>
        <a href="{{ route('logout') }}" class="menu-item logout">Logout</a>
    </div>
</div>

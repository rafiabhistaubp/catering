<!-- resources/views/partials/sidebar.blade.php -->
<div class="sidebar">
    <div class="logo">
        <span>Logo/Nama Perusahaan</span>
    </div>
    <div class="menu">
        <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard
        </a>
        <a href="{{ route('user.index') }}" class="menu-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="fa-regular fa-user"></i> Data Karyawan
        </a>
        <a href="{{ route('pesan.index') }}" class="menu-item {{ request()->routeIs('pesan.index') ? 'active' : '' }}">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Pesanan Makanan
        </a>
        <a href="#" class="menu-item {{ request()->routeIs('consumption.monitoring') ? 'active' : '' }}">
            <i class="fa-solid fa-magnifying-glass-chart"></i> Monitoring Konsumsi
        </a>
        <a href="#" class="menu-item {{ request()->routeIs('report') ? 'active' : '' }}">
            <i class="fa-solid fa-file-export"></i> Laporan
        </a>
    </div>
    <div class="bottom-menu">
        <a href="#" class="menu-item">
            <i class="fa fa-cog" aria-hidden="true"></i> Settings
        </a>
        <a href="{{ route('logout') }}" class="menu-item logout">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        </a>
    </div>
</div>

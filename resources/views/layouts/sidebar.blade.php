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
        <a href="{{ route('monitor.index') }}" class="menu-item {{ request()->routeIs('monitor.index', 'monitor.dm', 'monitor.hadir') ? 'active' : '' }}">
            <i class="fa-solid fa-magnifying-glass-chart"></i> Monitoring Konsumsi
        </a>
        <a href="{{ route('laporan.index') }}" class="menu-item {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
            <i class="fa-solid fa-file-export"></i> Laporan
        </a>
    </div>
    <div class="bottom-menu">
        <a href="#" class="menu-item settings">
            <i class="fa fa-cog" aria-hidden="true"></i> Settings
        </a>
        <a href="{{ route('logout') }}" class="menu-item logout">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        </a>
    </div>
</div>

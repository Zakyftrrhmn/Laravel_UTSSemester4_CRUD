<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Master Data</div>
            <a class="nav-link {{ request()->routeIs('pengguna.*') ? 'active' : '' }}" href="{{ route('pengguna.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Pengguna
            </a>
            
            <a class="nav-link {{ request()->routeIs('buku.*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Buku
            </a>
            
            <a class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}" href="{{ route('peminjaman.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                Peminjaman
            </a>
            
            <a class="nav-link {{ request()->routeIs('ulasan.*') ? 'active' : '' }}" href="{{ route('ulasan.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                Ulasan
            </a>
            
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
         {{ Auth::user()->name }}
    </div>
</nav>
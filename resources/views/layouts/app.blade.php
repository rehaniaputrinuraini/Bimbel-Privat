<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bimbel Privat - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style_bimbel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <i class="fas fa-bars burger-btn"></i>
            <img src="{{ asset('images/galeri/foto_logo.png') }}" class="logo-img" alt="Logo">
        </div>
        <div class="header-center">
            <div class="tagline">Prestasi lebih baik</div>
        </div>
        <div class="header-right">
            <div class="user-avatar-top"><i class="fas fa-user"></i></div>
        </div>
    </header>

    <div class="main-container">
        <aside class="sidebar">
            <div class="sidebar-profile">
                <div class="avatar-circle">MP</div>
                <div class="profile-info">
                    <h4>Maria Putri</h4>
                    <p style="font-size: 11px; opacity: 0.8;">Super Admin</p>
                </div>
            </div>

            <nav class="nav-group">
                <a href="#" class="nav-link"><i class="fas fa-th-large"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="fas fa-graduation-cap"></i> Kelola Tentor</a>
                <a href="#" class="nav-link"><i class="fas fa-user-shield"></i> Kelola Admin</a>
                <a href="{{ route('murid.index') }}" class="nav-link nav-active"><i class="fas fa-user-friends"></i> Kelola Murid</a>
                <a href="#" class="nav-link"><i class="fas fa-tags"></i> Harga Paket</a>
                <a href="#" class="nav-link"><i class="fas fa-calendar-check"></i> Riwayat Presensi</a>
                <a href="#" class="nav-link"><i class="fas fa-wallet"></i> Pembayaran</a>
                <a href="#" class="nav-link"><i class="fas fa-money-check-alt"></i> Rekap Gaji</a>
                <a href="#" class="nav-link"><i class="fas fa-file-invoice"></i> Laporan Keuangan</a>
                
                <a href="#" class="nav-link" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <main class="content-wrapper">
            @yield('content')
        </main>
    </div>

</body>
</html>
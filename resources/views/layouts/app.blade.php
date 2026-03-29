<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel Privat - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style-bimbel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Pengaturan Transisi Sidebar */
        .sidebar {
            transition: all 0.3s ease;
            width: 280px;
            min-width: 280px;
        }

        /* Class untuk menyembunyikan sidebar */
        .sidebar.collapsed {
            width: 0 !important;
            min-width: 0 !important;
            overflow: hidden;
            padding: 0 !important;
        }

        /* Ikon Menu Sidebar: Tetap Putih */
        .sidebar-icon {
            width: 24px; 
            height: 24px; 
            margin-right: 15px; 
            object-fit: contain;
            filter: brightness(0) invert(1); 
        }

        /* Ikon Orang Admin: Warnanya ungu pekat #4D0B87 */
        .icon-admin-color {
            width: 80%;
            height: 80%;
            object-fit: contain;
            /* Filter ini mengubah hitam menjadi Ungu Pekat #4D0B87 */
            filter: invert(12%) sepia(82%) saturate(4645%) hue-rotate(269deg) brightness(88%) contrast(110%);
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Memastikan konten mengisi sisa layar */
        .content-wrapper {
            flex: 1;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <i class="fas fa-bars burger-btn" id="toggle-sidebar" style="color: #5D10A2; font-size: 24px; cursor: pointer; margin-right: 20px;"></i>
            <img src="{{ asset('images/foto_logo.png') }}" class="logo-img">
        </div>
        <div class="header-center">
            <div class="tagline" style="font-family: 'Brush Script MT', cursive; color: #5D10A2; font-size: 36px; margin: 0;">
                Prestasi Lebih Baik
            </div>
        </div>
        <div class="header-right">
            <div class="user-avatar-top" style="width: 45px; height: 45px; border-radius: 50%; overflow: hidden; border: 2px solid #5D10A2; background: white; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/icon_orang.png') }}" class="icon-admin-color" style="width: 30px; height: 30px;">
            </div>
        </div>
    </header>

    <div class="main-container" style="display: flex; height: calc(100vh - 80px);">
        <aside class="sidebar">
            <div class="sidebar-profile">
                <div class="avatar-circle" style="width:55px; height:55px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                    <img src="{{ asset('images/icon_orang.png') }}" class="icon-admin-color">
                </div>
                <div class="profile-info">
                    <h4 style="margin: 0; font-size: 16px;">Rahmanda Alvin</h4>
                    <p style="margin: 0; font-size: 12px; opacity: 0.8;">Admin</p>
                </div>
            </div>

            <nav class="nav-group" style="display: flex; flex-direction: column; height: 100%;">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'nav-active' : '' }}">
                    <img src="{{ asset('images/icon_dashboard.png') }}" class="sidebar-icon"> Dashboard
                </a>

                <a href="#" class="nav-link">
                    <img src="{{ asset('images/icon_datatentor.png') }}" class="sidebar-icon"> Data Tentor
                </a>

                <a href="{{ route('murid.index') }}" class="nav-link {{ request()->is('murid*') ? 'nav-active' : '' }}">
                    <img src="{{ asset('images/icon_kelolamurid.png') }}" class="sidebar-icon"> Kelola Murid
                </a>

                <a href="{{ route('harga_paket.index') }}" class="nav-link {{ request()->is('harga-paket*') ? 'nav-active' : '' }}">
                     <img src="{{ asset('images/icon_hargapaket.png') }}" class="sidebar-icon"> Harga Paket
                </a>
                <a href="#" class="nav-link"><img src="{{ asset('images/icon_riwayatpresensi.png') }}" class="sidebar-icon"> Riwayat Presensi</a>
                <a href="#" class="nav-link"><img src="{{ asset('images/icon_pembayaran.png') }}" class="sidebar-icon"> Pembayaran</a>
                <a href="#" class="nav-link"><img src="{{ asset('images/icon_rekapgaji.png') }}" class="sidebar-icon"> Rekap Gaji</a>
                <a href="#" class="nav-link"><img src="{{ asset('images/icon_laporankeuangan.png') }}" class="sidebar-icon"> Laporan Keuangan</a>

                <div style="margin-top: auto; padding-bottom: 20px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link" style="background:none; border:none; width:100%; cursor:pointer; text-align:left; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px;">
                            <img src="{{ asset('images/icon_logout.png') }}" class="sidebar-icon"> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="content-wrapper" style="padding: 30px; overflow-y: auto; background-color: #F3F4F6;">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-sidebar');
            const sidebar = document.querySelector('.sidebar');

            toggleBtn.addEventListener('click', function() {
                // Menambah/menghapus class collapsed saat ikon burger diklik
                sidebar.classList.toggle('collapsed');
            });
        });
    </script>
</body>
</html>
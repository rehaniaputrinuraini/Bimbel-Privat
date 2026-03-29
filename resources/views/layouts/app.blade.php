<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel Privat - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{ asset('css/style-bimbel.css') }}">
    
    <style>
        /* CSS ASLI TEMANMU - TIDAK ADA YANG DIUBAH */
        .sidebar {
            transition: all 0.3s ease;
            width: 280px;
            min-width: 280px;
            background-color: #5D10A2;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            color: white;
        }

        .sidebar.collapsed {
            width: 0 !important;
            min-width: 0 !important;
            overflow: hidden;
            padding: 0 !important;
        }

        .sidebar-icon {
            width: 20px; 
            height: 20px; 
            margin-right: 15px; 
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        .icon-admin-color {
            width: 80%;
            height: 80%;
            object-fit: contain;
            filter: invert(12%) sepia(82%) saturate(4645%) hue-rotate(269deg) brightness(88%) contrast(110%);
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .content-wrapper {
            flex: 1;
            transition: all 0.3s ease;
            background-color: #F8F9FA;
            overflow-y: auto;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: all 0.2s;
        }

        .nav-link-custom:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        
        .nav-active {
            background-color: rgba(255,255,255,0.2);
            color: white;
            font-weight: 600;
        }

        .main-container {
            display: flex;
            height: calc(100vh - 80px);
            overflow: hidden;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left d-flex align-items-center">
            <i class="fas fa-bars burger-btn" id="toggle-sidebar" style="color: #5D10A2; font-size: 24px; cursor: pointer; margin-right: 20px;"></i>
            <img src="{{ asset('images/foto_logo.png') }}" class="logo-img" style="height: 50px;">
        </div>
        <div class="header-center">
            <div class="tagline" style="font-family: 'Brush Script MT', cursive; color: #5D10A2; font-size: 32px; margin: 0;">
                Prestasi Lebih Baik
            </div>
        </div>
        <div class="header-right">
            <div class="user-avatar-top" style="width: 45px; height: 45px; border-radius: 50%; overflow: hidden; border: 2px solid #5D10A2; background: white; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/icon_orang.png') }}" class="icon-admin-color">
            </div>
        </div>
    </header>

    <div class="main-container">
        <aside class="sidebar p-3">
            <div class="sidebar-profile d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                <div class="avatar-circle" style="width:55px; height:55px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink: 0;">
                    <img src="{{ asset('images/icon_orang.png') }}" class="icon-admin-color" style="width: 35px; height: 35px;">
                </div>
                <div class="profile-info" style="overflow: hidden;">
                    <h4 style="margin: 0; font-size: 16px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                        {{ $namaUser ?? Auth::user()->username }}
                    </h4>
                    <p style="margin: 0; font-size: 12px; opacity: 0.8;">
                        {{ request()->is('tentor*') ? 'Tentor' : 'Admin' }}
                    </p>
                </div>
            </div>

            <nav class="nav-group flex-grow-1">
                @if(request()->is('tentor*'))
                    {{-- MENU KHUSUS TENTOR --}}
                    <a href="{{ route('tentor.dashboard') }}" class="nav-link-custom {{ request()->is('tentor/dashboard') ? 'nav-active' : '' }}">
                        <img src="{{ asset('images/icon_dashboard.png') }}" class="sidebar-icon"> Dashboard
                    </a>
                    {{-- MENU PRESENSI BARU --}}
                    <a href="#" class="nav-link-custom {{ request()->is('tentor/presensi*') ? 'nav-active' : '' }}">
                        <img src="{{ asset('images/icon_presensi.png') }}" class="sidebar-icon"> Presensi
                    </a>
                    <a href="#" class="nav-link-custom">
                        <img src="{{ asset('images/icon_riwayatpresensi.png') }}" class="sidebar-icon"> Riwayat Presensi
                    </a>
                    {{-- MENU REKAP GAJI SUDAH DIHAPUS --}}
                @else
                    {{-- MENU ADMIN ASLI --}}
                    <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->is('dashboard') ? 'nav-active' : '' }}">
                        <img src="{{ asset('images/icon_dashboard.png') }}" class="sidebar-icon"> Dashboard
                    </a>
                    <a href="#" class="nav-link-custom">
                        <img src="{{ asset('images/icon_datatentor.png') }}" class="sidebar-icon"> Data Tentor
                    </a>
                    <a href="{{ route('murid.index') }}" class="nav-link-custom {{ request()->is('murid*') ? 'nav-active' : '' }}">
                        <img src="{{ asset('images/icon_kelolamurid.png') }}" class="sidebar-icon"> Kelola Murid
                    </a>
                    <a href="{{ route('harga_paket.index') }}" class="nav-link-custom {{ request()->is('harga-paket*') ? 'nav-active' : '' }}">
                        <img src="{{ asset('images/icon_hargapaket.png') }}" class="sidebar-icon"> Harga Paket
                    </a>
                @endif
            </nav>

            <div class="sidebar-footer mt-auto pt-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link-custom w-100 border-0" style="background:none; cursor:pointer; text-align:left;">
                        <img src="{{ asset('images/icon_logout.png') }}" class="sidebar-icon"> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="content-wrapper p-4 p-md-5">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-sidebar');
            const sidebar = document.querySelector('.sidebar');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
        });
    </script>
</body>
</html>
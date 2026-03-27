<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Bimbel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ route('tentor.index') }}"><i class="fas fa-chalkboard-teacher"></i> Data Tentor</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('murid.index') }}"><i class="fas fa-users"></i> Kelola Murid</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('paket.index') }}"><i class="fas fa-tag"></i> Harga Paket</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('presensi.index') }}"><i class="fas fa-calendar-check"></i> Riwayat Presensi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fas fa-money-bill-wave"></i> Pembayaran</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('gaji.index') }}"><i class="fas fa-wallet"></i> Rekap Gaji</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}"><i class="fas fa-chart-line"></i> Laporan Keuangan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li> -->
                    </ul> 
                </div>
            </nav>

            {{-- Main content --}}
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <span class="text-muted">{{ \Carbon\Carbon::now()->format('F Y') }}</span>
                        </div>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
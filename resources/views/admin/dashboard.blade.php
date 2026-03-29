<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - Bimbel Privat</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Caveat:wght@700&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple-main: #6F2DA8; 
            --purple-light: #E0CFFC;
            --white: #FFFFFF;
            --bg-main: #FDF5FF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background-color: var(--purple-main);
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .profile-sidebar {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .avatar-box {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--purple-main);
            font-size: 2rem;
        }

        .nav-menu { flex: 1; padding: 15px; overflow-y: auto; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.2); }

        .nav-link i { width: 25px; text-align: center; font-size: 16px; }

        /* MAIN CONTENT */
        .main-content { flex: 1; display: flex; flex-direction: column; }

        .header-top {
            background: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .dashboard-body { padding: 40px; }

        /* STATS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            position: relative;
            box-shadow: 0 10px 30px rgba(111, 45, 168, 0.08);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 140px;
        }

        .stat-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .stat-number { font-size: 1.8rem; font-weight: 800; margin-top: 20px; color: #333; }
        .stat-label { font-size: 10px; font-weight: 700; color: #999; text-transform: uppercase; }

        /* RINCIAN LIST */
        .rincian-box {
            background: white;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        }

        .list-item {
            display: flex;
            justify-content: space-between;
            padding: 18px 25px;
            border-radius: 15px;
            color: white;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .bg-success { background: #58A85C; }
        .bg-danger { background: #D3514C; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="profile-sidebar">
            <div class="avatar-box"><i class="fas fa-user"></i></div>
            <h2 style="text-transform: uppercase; font-size: 16px; letter-spacing: 1px;">{{ Auth::user()->username }}</h2>
            <p style="font-size: 9px; opacity: 0.7; letter-spacing: 2px; font-weight: 800;">{{ Auth::user()->peran }}</p>
        </div>

        <nav class="nav-menu">
            <a href="#" class="nav-link active"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-user-graduate"></i> <span>Data Tentor</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-users"></i> <span>Kelola Murid</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-tags"></i> <span>Harga Paket</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-clipboard-check"></i> <span>Riwayat Presensi</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-wallet"></i> <span>Pembayaran</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-file-invoice-dollar"></i> <span>Rekap Gaji</span></a>
            
            <a href="#" class="nav-link"><i class="fas fa-chart-line"></i> <span>Laporan Keuangan</span></a>
        </nav>

        <div style="padding: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link" style="background:none; border:none; color:#ffbaba; cursor:pointer; width:100%; font-weight:bold;">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content">
        <header class="header-top">
            <i class="fas fa-bars" style="color: #999;"></i>
            <h1 style="font-family: 'Caveat'; color: var(--purple-main); font-size: 35px;">Prestasi lebih baik</h1>
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-weight: 600; color: #666;">{{ Auth::user()->username }}</span>
                <div style="width: 40px; height: 40px; background: var(--purple-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--purple-main);">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <div class="dashboard-body">
            <div style="margin-bottom: 30px;">
                <p style="color: #bbb; font-weight: 700; font-size: 13px;">MARET 2026</p>
                <h2 style="font-size: 32px; font-weight: 800; color: #333;">Dashboard Admin</h2>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #3F51B5;"><i class="fas fa-users"></i></div>
                    <div class="stat-number">{{ $totalMurid }}</div>
                    <p class="stat-label">Total Murid</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #B8866B;"><i class="fas fa-user-tie"></i></div>
                    <div class="stat-number">{{ $totalTentor }}</div>
                    <p class="stat-label">Total Tentor</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #00C853;"><i class="fas fa-hand-holding-dollar"></i></div>
                    <div class="stat-number">Rp {{ number_format($pemasukan, 0, ',', '.') }}</div>
                    <p class="stat-label">Pemasukan</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #F44336;"><i class="fas fa-money-bill-transfer"></i></div>
                    <div class="stat-number">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</div>
                    <p class="stat-label">Pengeluaran</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #FFD600;"><i class="fas fa-sack-dollar"></i></div>
                    <div class="stat-number">Rp {{ number_format($labaBersih, 0, ',', '.') }}</div>
                    <p class="stat-label">Laba Bersih</p>
                </div>
            </div>

            <div class="rincian-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h3 style="font-size: 22px; font-weight: 800; color: #333;">Rincian Keuangan Terakhir</h3>
                    <a href="#" style="color: #3F51B5; font-weight: 700; text-decoration: none;">Lihat Semua &rarr;</a>
                </div>
                
                @foreach($rincian as $item)
                @php $isPemasukan = str_contains(strtolower($item->keterangan), 'pembayaran'); @endphp
                <div class="list-item {{ $isPemasukan ? 'bg-success' : 'bg-danger' }}">
                    <span>{{ $item->keterangan }}</span>
                    <span>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
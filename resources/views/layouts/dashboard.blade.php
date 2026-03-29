<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Bimbel Privat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Caveat:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .handwriting { font-family: 'Caveat', cursive; }
    </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <aside class="w-64 bg-[#5E2B91] text-white flex flex-col shadow-xl">
        <div class="p-6 flex flex-col items-center border-b border-purple-400/30">
            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-3">
                <i class="fas fa-user text-[#5E2B91] text-4xl"></i>
            </div>
            <h2 class="font-bold text-lg">Maria Putri</h2>
            <p class="text-xs opacity-80 uppercase tracking-widest">Admin</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="#" class="flex items-center space-x-3 bg-white/20 p-3 rounded-xl shadow-inner font-semibold">
                <i class="fas fa-th-large w-5"></i> <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-user-graduate w-5"></i> <span>Data Tentor</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-users w-5"></i> <span>Kelola Murid</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-tags w-5"></i> <span>Harga Paket</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-clipboard-check w-5"></i> <span>Riwayat Presensi</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-wallet w-5"></i> <span>Pembayaran</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-file-invoice-dollar w-5"></i> <span>Rekap Gaji</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 hover:bg-white/10 rounded-xl transition">
                <i class="fas fa-chart-line w-5"></i> <span>Laporan Keuangan</span>
            </a>
        </nav>

        <div class="p-4 border-t border-purple-400/30">
            <a href="#" class="flex items-center space-x-3 p-3 text-red-300 hover:bg-red-500/10 rounded-xl transition">
                <i class="fas fa-sign-out-alt w-5"></i> <span>Logout</span>
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col">
        <header class="bg-white p-4 shadow-sm flex justify-between items-center px-8">
            <i class="fas fa-bars text-gray-500 text-xl cursor-pointer"></i>
            <h1 class="handwriting text-4xl text-[#5E2B91]">Prestasi lebih baik</h1>
            <div class="bg-purple-100 p-2 rounded-full px-4 text-[#5E2B91]">
                <i class="fas fa-user-circle text-2xl"></i>
            </div>
        </header>

        <div class="p-8">
            <div class="mb-6">
                <p class="text-sm text-gray-400 font-semibold">Maret 2026</p>
                <h2 class="text-3xl font-bold text-gray-800">Dashboard Admin</h2>
                <p class="text-gray-500 italic">Selamat Datang di Sistem Manajemen Bimbel Privat</p>
            </div>

            <div class="grid grid-cols-5 gap-4 mb-8">
                <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 border-blue-600 text-center">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg">
                        <i class="fas fa-user"></i>
                    </div>
                    <p class="text-3xl font-bold">307</p>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Total Murid</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 border-orange-400 text-center">
                    <div class="bg-orange-400 text-white w-10 h-10 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <p class="text-3xl font-bold">20</p>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Total Tentor</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 border-green-500 text-center">
                    <div class="bg-green-500 text-white w-10 h-10 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <p class="text-xl font-bold">Rp 500.000</p>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Pemasukan</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 border-red-500 text-center">
                    <div class="bg-red-500 text-white w-10 h-10 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg">
                        <i class="fas fa-chart-line transform rotate-180"></i>
                    </div>
                    <p class="text-xl font-bold">Rp 200.000</p>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Pengeluaran</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 border-yellow-500 text-center">
                    <div class="bg-yellow-500 text-white w-10 h-10 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <p class="text-xl font-bold">Rp 300.000</p>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Laba Bersih</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[30px] shadow-lg border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Rincian Keuangan Terakhir</h3>
                    <a href="#" class="text-blue-600 font-bold hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-4">
                    <div class="bg-[#58A85C] text-white p-5 rounded-2xl flex justify-between items-center shadow-md">
                        <span class="font-semibold text-lg">Pembayaran Murid SD</span>
                        <span class="font-bold text-lg">Rp. 5.000.000</span>
                    </div>
                    <div class="bg-[#D3514C] text-white p-5 rounded-2xl flex justify-between items-center shadow-md">
                        <span class="font-semibold text-lg">Bayar WiFi</span>
                        <span class="font-bold text-lg">Rp. 100.000</span>
                    </div>
                    <div class="bg-[#58A85C] text-white p-5 rounded-2xl flex justify-between items-center shadow-md">
                        <span class="font-semibold text-lg">Pembayaran Murid SMA</span>
                        <span class="font-bold text-lg">Rp. 4.000.000</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
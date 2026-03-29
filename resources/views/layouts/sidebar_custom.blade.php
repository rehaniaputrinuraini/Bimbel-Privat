<aside class="w-64 bg-[#5E2B91] text-white flex flex-col shadow-xl min-h-screen">
    <div class="p-8 flex flex-col items-center border-b border-purple-400/30 text-center">
        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-lg overflow-hidden border-2 border-purple-300/40">
            <i class="fas fa-user text-[#5E2B91] text-4xl"></i>
        </div>
        
        <h2 class="font-bold text-lg leading-tight uppercase tracking-wide">
            {{ Auth::user()->username }}
        </h2>
        
        <p class="text-[10px] opacity-60 uppercase tracking-[0.3em] mt-1 font-extrabold text-purple-200">
            {{ Auth::user()->peran }}
        </p>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        
        @php
            // Menentukan route dashboard berdasarkan peran user agar tidak salah nyasar
            $dashRoute = (Auth::user()->peran == 'superadmin') ? 'superadmin.dashboard' : 'admin.dashboard';
        @endphp

        <a href="{{ route($dashRoute) }}" 
           class="flex items-center space-x-4 {{ request()->routeIs('*.dashboard') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} p-3 rounded-xl transition-all duration-200">
            <i class="fas fa-th-large w-6 text-center text-lg"></i> 
            <span class="font-semibold">Dashboard</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-user-graduate w-6 text-center text-lg"></i> 
            <span class="font-medium">Data Tentor</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-users w-6 text-center text-lg"></i> 
            <span class="font-medium">Kelola Murid</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-tags w-6 text-center text-lg"></i> 
            <span class="font-medium">Harga Paket</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-clipboard-check w-6 text-center text-lg"></i> 
            <span class="font-medium">Riwayat Presensi</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-wallet w-6 text-center text-lg"></i> 
            <span class="font-medium">Pembayaran</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200">
            <i class="fas fa-file-invoice-dollar w-6 text-center text-lg"></i> 
            <span class="font-medium">Rekap Gaji</span>
        </a>

        <a href="#" class="flex items-center space-x-4 p-3 hover:bg-white/10 rounded-xl transition-all duration-200 border-b border-purple-400/20 pb-4">
            <i class="fas fa-chart-line w-6 text-center text-lg"></i> 
            <span class="font-medium">Laporan Keuangan</span>
        </a>
    </nav>

    <div class="p-4 border-t border-purple-400/30">
        <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form">
            @csrf
            <button type="submit" 
               class="w-full flex items-center space-x-4 p-3 text-red-300 hover:bg-red-500/20 hover:text-red-100 rounded-xl transition-all duration-200 group font-bold">
                <i class="fas fa-sign-out-alt w-6 text-center text-lg group-hover:translate-x-1 transition-transform"></i> 
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
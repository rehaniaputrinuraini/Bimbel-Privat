<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Tentor;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMurid = Murid::count();
        $totalTentor = Tentor::count();
        $pemasukan = Pembayaran::sum('total_pembayaran');
        $pengeluaran = Pengeluaran::sum('jumlah');
        $labaBersih = $pemasukan - $pengeluaran;

        // 3 transaksi terakhir dari pembayaran
        $pembayaran = Pembayaran::with('murid')
            ->latest('tanggal')
            ->take(3)
            ->get()
            ->map(fn($item) => [
                'keterangan' => 'Pembayaran Murid ' . ($item->murid->nama_lengkap_murid ?? 'Unknown'),
                'jumlah' => $item->total_pembayaran,
                'tanggal' => $item->tanggal,
            ]);

        // 3 transaksi terakhir dari pengeluaran
        $pengeluaranList = Pengeluaran::latest('tanggal')
            ->take(3)
            ->get()
            ->map(fn($item) => [
                'keterangan' => $item->keterangan,
                'jumlah' => $item->jumlah,
                'tanggal' => $item->tanggal,
            ]);

        $rincian = $pembayaran->concat($pengeluaranList)
            ->sortByDesc('tanggal')
            ->take(3)
            ->values();

        if ($rincian->isEmpty()) {
            $rincian = collect([
                (object) ['keterangan' => 'Pembayaran Murid SD', 'jumlah' => 5000000],
                (object) ['keterangan' => 'Bayar WiFi', 'jumlah' => 100000],
                (object) ['keterangan' => 'Pembayaran Murid SMA', 'jumlah' => 4000000],
            ]);
        }

        return view('superadmin.dashboard', compact('totalMurid', 'totalTentor', 'pemasukan', 'pengeluaran', 'labaBersih', 'rincian'));
    }
}
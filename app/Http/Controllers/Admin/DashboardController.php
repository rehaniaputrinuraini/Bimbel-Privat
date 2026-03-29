<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statis sesuai desain (foto 1)
        $totalMurid = 307;
        $totalTentor = 20;
        $pemasukan = 500000;
        $pengeluaran = 200000;
        $labaBersih = 300000;

        $rincian = [
            (object) ['keterangan' => 'Pembayaran Murid SD', 'jumlah' => 5000000],
            (object) ['keterangan' => 'Bayar WiFi', 'jumlah' => 100000],
            (object) ['keterangan' => 'Pembayaran Murid SMA', 'jumlah' => 4000000],
        ];

        $bulanTahun = 'Maret 2026';

        return view('admin.dashboard', compact('totalMurid', 'totalTentor', 'pemasukan', 'pengeluaran', 'labaBersih', 'rincian', 'bulanTahun'));
    }
}
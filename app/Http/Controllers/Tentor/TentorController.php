<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TentorController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $bulanSekarang = Carbon::now()->translatedFormat('F Y');
        $hariIni = Carbon::now()->toDateString(); // Format YYYY-MM-DD
        
        $userId = Auth::id(); 
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // 1. Ambil Profil Tentor untuk Nama di Sidebar
        $dataTentor = DB::table('ms_tentor')->where('id_user', $userId)->first();
        $namaUser = $dataTentor ? $dataTentor->nama_lengkap_tentor : Auth::user()->username;

        // 2. Ambil data presensi KHUSUS HARI INI untuk menentukan Status Dashboard
        $presensiHariIni = DB::table('tr_presensi_tentor')
            ->where('id_tentor', $userId)
            ->where('tanggal', $hariIni)
            ->first();

        // LOGIC STATUS (Untuk tampilan warna bulatan di desain Figma kamu)
        $status = 'belum_presensi';
        if ($presensiHariIni) {
            if (is_null($presensiHariIni->jam_keluar)) {
                $status = 'sedang_mengajar';
            } else {
                $status = 'selesai';
            }
        }

        // 3. Hitung Total Hadir (Bulan Ini)
        $totalHadir = DB::table('tr_presensi_tentor')
            ->where('id_tentor', $userId)
            ->whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->count();

        // 4. Hitung Total Jam (Bulan Ini)
        $totalJam = DB::table('tr_presensi_tentor')
            ->where('id_tentor', $userId)
            ->whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->sum('jam_mengajar');

        // Kirim semua variabel ke view
        return view('tentor.dashboard', compact(
            'bulanSekarang', 
            'totalHadir', 
            'totalJam', 
            'namaUser', 
            'status', 
            'presensiHariIni'
        ));
    }
}
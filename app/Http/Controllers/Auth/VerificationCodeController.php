<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{
    /**
     * Tampilkan halaman verifikasi
     */
    public function create()
    {
        return view('auth.verify-email');
    }

    /**
     * Verifikasi kode OTP
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        // Cari kode verifikasi yang valid
        $verification = EmailVerification::where('code', $request->code)
            ->where('expires_at', '>', now())
            ->first();

        if (!$verification) {
            return back()->withErrors(['code' => 'Kode verifikasi tidak valid atau sudah kadaluarsa.']);
        }

        // Update user menjadi aktif
        $user = User::where('email', $verification->email)->first();
        $user->status = 1;
        $user->save();

        // Hapus kode verifikasi yang sudah digunakan
        $verification->delete();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Akun berhasil diaktivasi! Silakan login.');
    }
}
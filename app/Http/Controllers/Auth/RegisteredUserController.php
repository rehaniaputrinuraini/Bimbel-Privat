<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmailVerification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:15', 'unique:ms_user,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:ms_user,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user dengan status 0 (belum aktif)
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => 'tentor', // default role tentor, bisa diubah nanti oleh admin
            'status' => 0, // 0 = belum verifikasi
        ]);

        // Generate kode verifikasi 6 digit
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Simpan kode verifikasi
        EmailVerification::create([
            'email' => $user->email,
            'code' => $code,
            'expires_at' => now()->addMinutes(30),
        ]);

        // Kirim email verifikasi
        Mail::send('emails.verification', ['code' => $code, 'name' => $request->username], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Kode Verifikasi Akun - Bimbel Privat');
        });

        // Redirect ke halaman verifikasi email
        return redirect()->route('verification.notice')
            ->with('email', $user->email)
            ->with('status', 'Kode verifikasi telah dikirim ke email Anda.');
    }
}
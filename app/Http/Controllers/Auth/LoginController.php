<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
                'string',
            ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Membuat kunci pembatas percobaan login
        $throttleKey = Str::lower($request->input('email'))
            . '|' . $request->ip();

        // Maksimal 5 percobaan login
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => [
                    'Terlalu banyak percobaan login. '
                    . 'Silakan coba lagi dalam '
                    . $seconds . ' detik.',
                ],
            ]);
        }

        // Proses autentikasi
        if (! Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            RateLimiter::hit($throttleKey, 60);

            throw ValidationException::withMessages([
                'email' => 'Email atau password yang kamu masukkan salah.',
            ]);
        }

        // Hapus pembatas percobaan login
        RateLimiter::clear($throttleKey);

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // Redirect setelah login berhasil
        return redirect()->intended(
            route('topup.index')
        )->with('success', 'Berhasil login. Selamat datang di Tring.id!');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Kamu berhasil logout.');
    }
}
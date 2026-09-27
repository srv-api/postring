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
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],

                'password' => [
                    'required',
                    'string',
                ],
            ],
            [
                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'password.required' =>
                    'Password wajib diisi.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Rate Limiting
        |--------------------------------------------------------------------------
        */

        $throttleKey = Str::lower(
            Str::transliterate($request->input('email'))
        ) . '|' . $request->ip();

        $maxAttempts = 5;
        $decaySeconds = 60;

        if (RateLimiter::tooManyAttempts(
            $throttleKey,
            $maxAttempts
        )) {
            $seconds = RateLimiter::availableIn(
                $throttleKey
            );

            throw ValidationException::withMessages([
                'email' => [
                    'Terlalu banyak percobaan login. Silakan coba lagi dalam '
                    . $seconds
                    . ' detik.',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Coba Login
        |--------------------------------------------------------------------------
        */

        if (!Auth::attempt(
            [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ],
            $request->boolean('remember')
        )) {
            RateLimiter::hit(
                $throttleKey,
                $decaySeconds
            );

            throw ValidationException::withMessages([
                'email' => [
                    'Email atau password yang kamu masukkan salah.',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Login berhasil
        |--------------------------------------------------------------------------
        */

        RateLimiter::clear($throttleKey);

        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Pastikan User punya Merchant
        |--------------------------------------------------------------------------
        */

        if (empty($user->idmerchant)) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => [
                    'Akun belum terhubung dengan merchant Tring POS.',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Redirect Dashboard POS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->intended(
                route('dashboard.owner', [
                    'idmerchant' => $user->idmerchant,
                ])
            )
            ->with(
                'success',
                'Berhasil login. Selamat datang di Tring POS!'
            );
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Kamu berhasil logout dari Tring POS.'
            );
    }
}
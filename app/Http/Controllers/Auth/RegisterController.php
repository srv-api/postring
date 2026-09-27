<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi user dan merchant.
     */
    public function register(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'whatsapp' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],

                'password' => [
                    'required',
                    'string',
                    Password::min(8),
                ],

                'referral_code' => [
                    'nullable',
                    'string',
                    'max:50',
                ],

                'terms' => [
                    'accepted',
                ],
            ],
            [
                'name.required' => 'Nama lengkap wajib diisi.',
                'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'terms.accepted' => 'Kamu harus menyetujui Syarat dan Ketentuan.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Buat merchant dan user dalam satu transaksi
        |--------------------------------------------------------------------------
        */

        $user = DB::transaction(function () use ($validated) {

            /*
             * Ambil ID merchant berikutnya.
             * Contoh: MRC000001, MRC000002, dan seterusnya.
             */
            $lastMerchantId = Merchant::max('id');
            $nextMerchantId = ((int) $lastMerchantId) + 1;

            $idmerchant = 'MRC' . str_pad(
                $nextMerchantId,
                6,
                '0',
                STR_PAD_LEFT
            );

            /*
             * Buat data merchant terlebih dahulu.
             */
            $merchant = Merchant::create([
                'idmerchant' => $idmerchant,
                'name' => $validated['name'],
                'whatsapp' => $validated['whatsapp'],
                'status' => 'active',
            ]);

            /*
             * Buat user dan isi idmerchant dari merchant yang baru dibuat.
             */
            $user = User::create([
                'name' => $validated['name'],
                'whatsapp' => $validated['whatsapp'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'referral_code' => $validated['referral_code'] ?? null,
                'idmerchant' => $merchant->idmerchant,
            ]);

            return $user;
        });

        /*
        |--------------------------------------------------------------------------
        | Event registrasi
        |--------------------------------------------------------------------------
        */

        event(new Registered($user));

        /*
        |--------------------------------------------------------------------------
        | Login otomatis setelah registrasi
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | Masuk ke dashboard merchant
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('dashboard.owner', [
                'idmerchant' => $user->idmerchant,
            ])
            ->with(
                'success',
                'Akun Tring POS berhasil dibuat. Selamat datang!'
            );
    }
}
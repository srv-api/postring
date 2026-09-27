<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    public function index(Request $request, string $idmerchant)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan user punya merchant
        |--------------------------------------------------------------------------
        */

        if (empty($user->idmerchant)) {
            abort(403, 'Akun belum memiliki merchant.');
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan user hanya bisa membuka merchant miliknya
        |--------------------------------------------------------------------------
        */

        if ((string) $user->idmerchant !== (string) $idmerchant) {
            abort(403, 'Kamu tidak memiliki akses ke merchant ini.');
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil Merchant
        |--------------------------------------------------------------------------
        */

        $merchant = $user->merchant;

        if (!$merchant) {
            abort(404, 'Merchant tidak ditemukan.');
        }

        return view('dashboard.owner', [
            'user' => $user,
            'merchant' => $merchant,
        ]);
    }
}
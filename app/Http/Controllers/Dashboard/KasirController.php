<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function index($idmerchant)
    {
        $user = Auth::user();

        // Pastikan merchant milik user yang sedang login
        if ($user->idmerchant != $idmerchant) {
            abort(403, 'Anda tidak memiliki akses ke merchant ini.');
        }

        $merchant = [
            'idmerchant' => $user->idmerchant,
            'name'       => $user->name,
            'email'      => $user->email,
        ];

        return view('dashboard.owner.kasir', compact(
            'merchant',
            'user'
        ));
    }
}
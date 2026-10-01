<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class KasirController extends Controller
{
public function index(string $idmerchant)
{
    $products = Product::query()
        ->where('idmerchant', $idmerchant)
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

    $categories = $products
        ->pluck('category')
        ->filter()
        ->unique()
        ->sort()
        ->values();

    return view('dashboard.owner.kasir', [
        'products' => $products,
        'categories' => $categories,
        'idmerchant' => $idmerchant,
    ]);
}
}
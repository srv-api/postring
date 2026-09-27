<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index(Request $request, $idmerchant)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        $query = Product::where('idmerchant', $idmerchant);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('sku', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Product::where('idmerchant', $idmerchant)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $merchant = [
            'idmerchant' => $idmerchant,
        ];

        return view('dashboard.owner.products.index', compact(
            'user',
            'merchant',
            'products',
            'categories'
        ));
    }

    /**
     * Form tambah produk.
     */
    public function create($idmerchant)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        $merchant = [
            'idmerchant' => $idmerchant,
        ];

        return view('dashboard.owner.products.create', compact(
            'user',
            'merchant'
        ));
    }

    /**
     * Simpan produk baru.
     */
    public function store(Request $request, $idmerchant)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cost_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'minimum_stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'unit' => [
                'required',
                'string',
                'max:50',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK SKU
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['sku'])) {
            $exists = Product::where('idmerchant', $idmerchant)
                ->where('sku', $validated['sku'])
                ->exists();

            if ($exists) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'sku' => 'SKU tersebut sudah digunakan.',
                    ]);
            }
        }

        $validated['idmerchant'] = $idmerchant;
        $validated['is_active'] = $request->boolean('is_active');

        Product::create($validated);

        return redirect()
            ->route('products.index', [
                'idmerchant' => $idmerchant,
            ])
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Form edit produk.
     */
    public function edit($idmerchant, Product $product)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        if ($product->idmerchant !== $idmerchant) {
            abort(403);
        }

        $merchant = [
            'idmerchant' => $idmerchant,
        ];

        return view('dashboard.owner.products.edit', compact(
            'user',
            'merchant',
            'product'
        ));
    }

    /**
     * Update produk.
     */
    public function update(Request $request, $idmerchant, Product $product)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        if ($product->idmerchant !== $idmerchant) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cost_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'minimum_stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'unit' => [
                'required',
                'string',
                'max:50',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK SKU
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['sku'])) {
            $exists = Product::where('idmerchant', $idmerchant)
                ->where('sku', $validated['sku'])
                ->where('id', '!=', $product->id)
                ->exists();

            if ($exists) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'sku' => 'SKU tersebut sudah digunakan.',
                    ]);
            }
        }

        $validated['is_active'] = $request->boolean('is_active');

        $product->update($validated);

        return redirect()
            ->route('products.index', [
                'idmerchant' => $idmerchant,
            ])
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk.
     */
    public function destroy($idmerchant, Product $product)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        if ($product->idmerchant !== $idmerchant) {
            abort(403);
        }

        $product->delete();

        return redirect()
            ->route('products.index', [
                'idmerchant' => $idmerchant,
            ])
            ->with('success', 'Produk berhasil dihapus.');
    }
}
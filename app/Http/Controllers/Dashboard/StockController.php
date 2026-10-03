<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Halaman kelola stok.
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
        | FILTER STOK
        |--------------------------------------------------------------------------
        */

        if ($request->stock_status === 'habis') {
            $query->where('stock', 0);
        } elseif ($request->stock_status === 'menipis') {
            $query->where('stock', '>', 0)
                ->whereColumn('stock', '<=', 'minimum_stock');
        } elseif ($request->stock_status === 'aman') {
            $query->whereColumn('stock', '>', 'minimum_stock');
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER CATEGORY
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        /*
        |--------------------------------------------------------------------------
        | PRODUK
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->orderByRaw("
                CASE
                    WHEN stock = 0 THEN 1
                    WHEN stock <= minimum_stock THEN 2
                    ELSE 3
                END
            ")
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $baseQuery = Product::where('idmerchant', $idmerchant);

        $totalProducts = (clone $baseQuery)->count();

        $totalStock = (clone $baseQuery)->sum('stock');

        $stockHabis = (clone $baseQuery)
            ->where('stock', 0)
            ->count();

        $stockMenipis = (clone $baseQuery)
            ->where('stock', '>', 0)
            ->whereColumn('stock', '<=', 'minimum_stock')
            ->count();

        $stockAman = (clone $baseQuery)
            ->whereColumn('stock', '>', 'minimum_stock')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */

        $categories = Product::where('idmerchant', $idmerchant)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        /*
        |--------------------------------------------------------------------------
        | MERCHANT
        |--------------------------------------------------------------------------
        */

        $merchant = [
            'idmerchant' => $idmerchant,
        ];

        return view('dashboard.owner.stock.index', compact(
            'user',
            'merchant',
            'products',
            'categories',
            'totalProducts',
            'totalStock',
            'stockHabis',
            'stockMenipis',
            'stockAman'
        ));
    }

    /**
     * Tambah stok.
     */
    public function add(Request $request, $idmerchant, Product $product)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        if ($product->idmerchant !== $idmerchant) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
            'note' => [
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'quantity.required' => 'Jumlah stok wajib diisi.',
            'quantity.integer' => 'Jumlah stok harus berupa angka.',
            'quantity.min' => 'Jumlah stok minimal 1.',
        ]);

        DB::transaction(function () use (
            $product,
            $validated,
            $idmerchant,
            $user
        ) {
            $product = Product::where('id', $product->id)
                ->lockForUpdate()
                ->firstOrFail();

            $stockBefore = $product->stock;

            $product->stock = $stockBefore + $validated['quantity'];

            $product->save();

            StockMovement::create([
                'idmerchant' => $idmerchant,
                'product_id' => $product->id,
                'type' => 'in',
                'quantity' => $validated['quantity'],
                'stock_before' => $stockBefore,
                'stock_after' => $product->stock,
                'note' => $validated['note'] ?? null,
                'user_id' => $user->id,
            ]);
        });

        return redirect()
            ->route('stocks.index', [
                'idmerchant' => $idmerchant,
            ])
            ->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Kurangi stok.
     */
    public function remove(Request $request, $idmerchant, Product $product)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        if ($product->idmerchant !== $idmerchant) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
            'note' => [
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'quantity.required' => 'Jumlah stok wajib diisi.',
            'quantity.integer' => 'Jumlah stok harus berupa angka.',
            'quantity.min' => 'Jumlah stok minimal 1.',
        ]);

        DB::transaction(function () use (
            $product,
            $validated,
            $idmerchant,
            $user
        ) {
            $product = Product::where('id', $product->id)
                ->lockForUpdate()
                ->firstOrFail();

            $stockBefore = $product->stock;

            if ($validated['quantity'] > $stockBefore) {
                abort(
                    redirect()
                        ->back()
                        ->withInput()
                        ->withErrors([
                            'quantity' => 'Stok tidak mencukupi. Stok tersedia: ' . $stockBefore,
                        ])
                );
            }

            $product->stock = $stockBefore - $validated['quantity'];

            $product->save();

            StockMovement::create([
                'idmerchant' => $idmerchant,
                'product_id' => $product->id,
                'type' => 'out',
                'quantity' => $validated['quantity'],
                'stock_before' => $stockBefore,
                'stock_after' => $product->stock,
                'note' => $validated['note'] ?? null,
                'user_id' => $user->id,
            ]);
        });

        return redirect()
            ->route('stocks.index', [
                'idmerchant' => $idmerchant,
            ])
            ->with('success', 'Stok berhasil dikurangi.');
    }

    /**
     * Riwayat stok.
     */
    public function history(Request $request, $idmerchant)
    {
        $user = Auth::user();

        if (!$user || $user->idmerchant !== $idmerchant) {
            abort(403);
        }

        $query = StockMovement::with([
            'product',
            'user',
        ])->where('idmerchant', $idmerchant);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('sku', 'like', '%' . $search . '%');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | RIWAYAT
        |--------------------------------------------------------------------------
        */

        $movements = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | MERCHANT
        |--------------------------------------------------------------------------
        */

        $merchant = [
            'idmerchant' => $idmerchant,
        ];

        return view('dashboard.owner.stock.history', compact(
            'user',
            'merchant',
            'movements'
        ));
    }
}
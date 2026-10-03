<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'idmerchant',
        'name',
        'sku',
        'category',
        'cost_price',
        'selling_price',
        'stock',
        'minimum_stock',
        'unit',
        'is_active',
    ];

    protected $casts = [
        'cost_price'    => 'decimal:2',
        'selling_price' => 'decimal:2',
        'stock'         => 'integer',
        'minimum_stock' => 'integer',
        'is_active'     => 'boolean',
    ];

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
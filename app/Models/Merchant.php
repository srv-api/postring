<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'idmerchant',
        'name',
        'whatsapp',
        'address',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(
            User::class,
            'idmerchant',
            'idmerchant'
        );
    }
}
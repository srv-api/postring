<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();

            $table->string('idmerchant');

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->enum('type', [
                'in',
                'out',
                'adjustment',
            ]);

            $table->integer('quantity');

            $table->integer('stock_before');
            $table->integer('stock_after');

            $table->string('note')->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index('idmerchant');
            $table->index(['idmerchant', 'product_id']);
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
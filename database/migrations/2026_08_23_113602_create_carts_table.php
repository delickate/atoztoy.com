<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {

            $table->id();

            // Logged-in ecommerce customer
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers')
                ->nullOnDelete();

            // Guest shopper session
            $table->string('session_id')
                ->nullable();

            // Product
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // Quantity
            $table->unsignedInteger('quantity')
                ->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

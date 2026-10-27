<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
        $table->id();

        $table->foreignId('customer_id')
            ->nullable()
            ->constrained('customers')
            ->nullOnDelete();

        $table->string('order_number')->unique();

        // Customer information at time of order
        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('customer_phone')->nullable();

        // Shipping address snapshot
        $table->text('shipping_address');
        $table->string('shipping_city');
        $table->string('shipping_state')->nullable();
        $table->string('shipping_postal_code')->nullable();

        // Shipping
        $table->string('shipping_method');
        $table->decimal('shipping_amount', 10, 2)->default(0);

        // Payment
        $table->string('payment_method');
        $table->string('payment_status')->default('pending');

        // Order amounts
        $table->decimal('subtotal', 10, 2);
        $table->decimal('total', 10, 2);

        // Order status
        $table->string('status')->default('pending');

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

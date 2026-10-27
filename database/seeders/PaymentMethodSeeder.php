<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Cash on Delivery',
            'code' => 'cod',
            'description' => 'Pay cash when your order is delivered.',
            'is_active' => true,
        ]);

        PaymentMethod::create([
            'name' => 'Debit Card',
            'code' => 'debit_card',
            'description' => 'Pay securely using your debit card.',
            'is_active' => true,
        ]);

        PaymentMethod::create([
            'name' => 'Credit Card',
            'code' => 'credit_card',
            'description' => 'Pay securely using your credit card.',
            'is_active' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    public function run(): void
    {
        ShippingMethod::create([
            'name' => 'Standard Delivery',
            'description' => 'Delivery within 3-5 business days',
            'price' => 5.00,
            'estimated_days' => 5,
            'is_active' => true,
        ]);

        ShippingMethod::create([
            'name' => 'Express Delivery',
            'description' => 'Fast delivery within 1-2 business days',
            'price' => 12.00,
            'estimated_days' => 2,
            'is_active' => true,
        ]);
    }
}

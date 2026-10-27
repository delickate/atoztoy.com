<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AdminCustomerSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Admin User
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(
            [
                'email' => 'admin@atoztoys.com',
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin@12345'),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Ecommerce Customer
        |--------------------------------------------------------------------------
        */

        Customer::updateOrCreate(
            [
                'email' => 'customer@atoztoys.com',
            ],
            [
                'name' => 'Test Customer',
                'password' => Hash::make('Customer@12345'),
            ]
        );
    }
}

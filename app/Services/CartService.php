<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Customer;

class CartService
{
    public function items()
    {
        if (auth('customer')->check()) {

            return Cart::with('product')
                ->where('customer_id', auth('customer')->id())
                ->get();
        }

        return Cart::with('product')
            ->whereNull('customer_id')
            ->where('session_id', session()->getId())
            ->get();
    }

    public function count(): int
    {
        return $this->items()->sum('quantity');
    }

    public function mergeGuestCart(Customer $customer): void
    {
        $guestItems = Cart::whereNull('customer_id')
            ->where('session_id', session()->getId())
            ->get();

        foreach ($guestItems as $guestItem) {

            $existingItem = Cart::where(
                'customer_id',
                $customer->id
            )
            ->where(
                'product_id',
                $guestItem->product_id
            )
            ->first();

            if ($existingItem) {

                $existingItem->increment(
                    'quantity',
                    $guestItem->quantity
                );

                $guestItem->delete();

            } else {

                $guestItem->update([
                    'customer_id' => $customer->id,
                    'session_id' => null,
                ]);
            }
        }
    }
}

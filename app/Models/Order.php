<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',

        'customer_name',
        'customer_email',
        'customer_phone',

        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_postal_code',

        'shipping_method',
        'shipping_amount',

        'payment_method',
        'payment_status',

        'subtotal',
        'total',

        'status',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}

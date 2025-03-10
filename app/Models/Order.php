<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'total_price',
        'status',
        'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Address model (assuming Address is another model)
    public function address()
    {
        return $this->belongsTo(Address::class, 'addresses_id');
    }
}

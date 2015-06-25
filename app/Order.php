<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'number',
        'customer_name',
        'customer_email',
        'city',
        'country_code',
        'price',
        'shipment_id',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];
}

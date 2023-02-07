<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    Protected $primaryKey = 'order_id';

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Shipping', 'shipping_id');
    }


}

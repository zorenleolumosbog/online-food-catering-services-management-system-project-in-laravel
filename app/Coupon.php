<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
      'coupon_code',
      'coupon_type',
      'coupon_value',
      'cart_min_value',
      'expired_on',
      'coupon_status',
    ];

    protected $primaryKey = 'coupon_id';
}

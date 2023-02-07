<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_boy extends Model
{
    protected $fillable =
        [
          'delivery_boy_name',
          'delivery_boy_phone_number',
          'delivery_boy_password',
          'delivery_boy_status',
          'delivery_boy_name',
        ];
    protected $primaryKey = 'delivery_boy_id';
}

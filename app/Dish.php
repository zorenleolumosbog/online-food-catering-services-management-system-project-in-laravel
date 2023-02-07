<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable =
        [
            'category_id',
            'dish_name',
            'dish_detail',
            'dish_image',
            'full_price',
            'dish_status'
        ];
    protected $primaryKey = 'dish_id';

}

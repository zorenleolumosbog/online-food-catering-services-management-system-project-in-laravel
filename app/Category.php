<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name','order_number','category_status','added_on',
    ];

    protected $primaryKey = 'category_id';

}

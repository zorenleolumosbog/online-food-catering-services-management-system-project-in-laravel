<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'product_id');
    }
}

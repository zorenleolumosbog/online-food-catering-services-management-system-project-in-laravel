<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =
        [
            'Name',
            'Email',
            'Phone_Number',
            'Message'

        ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    public function view() {

        return view ('FrontEnd.include.about') ;

    }
}

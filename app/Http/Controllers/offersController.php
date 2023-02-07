<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class offersController extends Controller
{
    public function view() {

        return view ('FrontEnd.include.offers') ;

    }
}

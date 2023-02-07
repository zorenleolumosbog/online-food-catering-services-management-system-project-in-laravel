<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helpController extends Controller
{
     public function view() {

        return view ('FrontEnd.include.help') ;

    }
}

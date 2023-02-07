<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use Cart;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $dishes = Dish::where('dish_status', 1)->get();

        return view('FrontEnd.include.home', compact('dishes') );
    }
    public function dish_show($category_id)
    {
        $categoryDish   = Dish::where('category_id', $category_id)
                                ->where('dish_status', 1)
                                ->get();

        return view('FrontEnd.include.dish', compact('categoryDish'));
    }

}

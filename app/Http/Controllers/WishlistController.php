<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Session;

class WishlistController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->dish_id;
        $wishlist->customer_id = Session::get('customer_id');
        $wishlist->save();
        Session::flash('success', 'Order added into wishlist');
        return back();
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        Session::flash('success', 'Wishlist Remove Successfully.');
        return back();
    }
}

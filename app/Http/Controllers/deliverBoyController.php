<?php

namespace App\Http\Controllers;

use App\Delivery_boy;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler;

class deliverBoyController extends Controller
{
    public function index ()
    {
        return view('BackEnd.deliveryBoy.add');
    }

    public function save_boy (Request $request)
    {
        $request->validate([
            'delivery_boy_name' => 'required',
            'delivery_boy_phone_number' => 'min:11|required|unique:delivery_boys',
            'delivery_boy_address' => 'required',
            'delivery_boy_status' => 'required',
            'added_on'=> 'required'
        ]);

        $boy = new Delivery_boy();

        $boy->delivery_boy_name =   $request->delivery_boy_name;
        $boy->delivery_boy_phone_number =   $request->delivery_boy_phone_number;
        $boy->delivery_boy_address =   $request->delivery_boy_address;
        $boy->delivery_boy_status =   $request->delivery_boy_status;
        $boy->added_on =   $request->added_on;
        $boy->save();

        return back()->with('sms','Delivery Boy Data is Saved Successfully!!!');
    }

    public function boy_manage ()
    {
        $boys = Delivery_boy::all();

        return view('BackEnd.deliveryBoy.manage', compact('boys'));
    }

    public function boy_delete ($delivery_boy_id)
    {
        $boy = Delivery_boy::find($delivery_boy_id);

        $boy->delete();

        return back()->with('sms','Delivery Boy Data is Deleted Successfully!!!');
    }
    public function boy_inactive ($delivery_boy_id)
    {
        $boy = Delivery_boy::find($delivery_boy_id);
        $boy->delivery_boy_status = 0;
        $boy->save();

        return back();
    }
    public function boy_active ($delivery_boy_id)
    {
        $boy = Delivery_boy::find($delivery_boy_id);
        $boy->delivery_boy_status = 1;
        $boy->save();
        return back();
    }
    public function boy_update (Request $request)
    {
        $boy = Delivery_boy::find($request->delivery_boy_id);

        $boy->delivery_boy_name = $request->delivery_boy_name;
        $boy->delivery_boy_phone_number = $request->delivery_boy_phone_number;
        $boy->delivery_boy_address = $request->delivery_boy_address;
        $boy->save();

        return back()->with('sms','Delivery Boy Data is Updated Successfully!!!');
    }
}

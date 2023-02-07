<?php

namespace App\Http\Controllers;

use App\Coupon;
use Session;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('BackEnd.Coupon.add');
    }

    public function code_save (Request $request)
    {

             $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_value'=> 'required',
            'cart_min_value'=> 'required',
            'expired_on'=> 'required',
            'coupon_status'=> 'required',
            'added_on' => 'required'
        ]);
        $coupon =  new Coupon();
        $coupon->coupon_code    =   $request->coupon_code;
        $coupon->coupon_type    =   $request->coupon_type;
        $coupon->coupon_value    =   $request->coupon_value;
        $coupon->cart_min_value    =   $request->cart_min_value;
        $coupon->expired_on    =   $request->expired_on;
        $coupon->coupon_status    =   $request->coupon_status;
        $coupon->added_on    =   $request->added_on;

        $coupon->save();

        return back()->with('sms','Coupon Data is Saved Successfully!!!');
    }

    public function code_manage ()
    {
        $coupons = Coupon::all();

        return view('BackEnd.Coupon.manage', compact('coupons'));
    }

    public function code_active ($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_status = 1;
        $coupon->save();

        return back();
    }

    public function code_inactive ($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_status = 0;
        $coupon->save();

        return back();
    }

    public function code_delete ($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return back();
    }

    public function code_update(Request $request)
    {
        $coupon = Coupon::find($request->coupon_id);

        $coupon->coupon_code    =   $request->coupon_code;
        $coupon->coupon_type    =   $request->coupon_type;
        $coupon->coupon_value    =   $request->coupon_value;
        $coupon->cart_min_value    =   $request->cart_min_value;
        $coupon->save();

        return back()->with('sms','Coupon Data is Updated Successfully!!!');
    }

    public function apply(Request $request)
    {
        // if(Session::has('sum')
        // {

        // }

        $check = Coupon::where('coupon_code',$request->coupon_code)->first();
        if($check){
            session()->put('coupon',[
                'coupon_code' => $check->coupon_code,
                'coupon_value' => $check->coupon_value,
            ]);
            Session()->flash('success', 'Hurray you found a coupon');
            return back();
        }else{
            Session()->flash('success', 'Oops we do not found any coupon name you entered');
            return back();
        }


    }
}

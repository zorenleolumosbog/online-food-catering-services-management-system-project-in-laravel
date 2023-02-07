<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shipping;
use Illuminate\Http\Request;
use App\Customer;
use Session;

class profileController extends Controller
{
     public function view() {

         if (!empty(Session::get('customer_id')))
         {
             $customer = Customer::find(Session::get('customer_id'));
//         dd($customer->customer_id);
             $customer_order = Order::where('customer_id',$customer->customer_id)->get();

             return view ('FrontEnd.include.profile',compact('customer','customer_order'));
         }else{
             return view ('FrontEnd.include.profile');
         }
    }

    public function OrderCancel($id)
    {
        $order = Order::find($id);
        $order->order_status = 'cancelled';
        $order->save();
        Session::flash('success', 'Your order has been cancelled');
        return back();
    }

    /*======================== customer profile ===================================*/
    // public function dashboard()
    // {
    //     $customer = Customer::find(Session::get('customer_id'));

    //     //  return view ('FrontEnd.include.profile');

    //     return view('FrontEnd.customer.dashboard',compact('customer'));
    // }

}

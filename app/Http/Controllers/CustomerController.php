<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use Mail;
use Session;
use Cart;

class CustomerController extends Controller
{
    public function show ()
    {
        return view('FrontEnd.customer.register');
    }

    public function store (Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone_no' => 'min:11| max:14|required|unique:customers'
        ]);

        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_no = $request->phone_no;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $customer_id = $customer->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer->name);


        // for email..........

       /* $data = $customer->toArray();

        Mail::send('FrontEnd.mail.welcome_mail', $data, function ($message) use($data) {
            $message->to($data['email']);
            $message->subject('Welcome To Staple Food');
        });*/

        return back();

    }
    public function login()
    {
        return view('FrontEnd.customer.login');
    }
    public function check(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if(password_verify($request->password, $customer->password))
        {
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->name);

            return back();
        }
        elseif($customer->email !== $request->email)
        {
            Session::flash('sms','Your email do not match our record');

            return back();
        }
        else
        {
                Session::flash('sms', 'Your password is incorrect Please provide valid password!!!');
                 return back();
        }
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function shipping ()
    {
        $customer = Customer::find(Session::get('customer_id'));

        return view('FrontEnd.checkOut.shipping', compact('customer'));
    }
    public function save (Request $request)
    {
        $shipping = new Shipping();

        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone_no = $request->phone_no;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shipping_id', $shipping->id);

        return redirect()->route('checkout_payment');
    }


}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('FrontEnd.checkOut.stripe');
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $request->input('grandTotal'),
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $request->name
        ]);

        Session::flash('success', 'Payment has been successfully processed!!!');

        return redirect('/checkout/order/complete');
    }
}

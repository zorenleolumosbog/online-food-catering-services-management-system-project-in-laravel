<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Mail;
use Session;

class CheckOutController extends Controller
{
    public function payment()
    {
        return view('FrontEnd.checkOut.checkout_payment');
    }

    public function order(Request $request)
    {
        $paymentType = $request->payment_type;

        if ($paymentType == 'Cash On') {
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('sum');

            if (Session::has('coupon_discount')) {
                $order->coupon_discount = Session::get('coupon_discount');
            } else {
                $order->coupon_discount = 0;
            }

            $order->save();

            $payMent = new payment();
            $payMent->order_id = $order->order_id;
            $payMent->payment_type = $paymentType;
            $payMent->save();

            $CartDish = Cart::content();

            foreach ($CartDish as $cart) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->order_id;
                $orderDetail->dish_id = $cart->id;
                $orderDetail->dish_name = $cart->name;
                $orderDetail->dish_price = $cart->price;
                $orderDetail->dish_qty = $cart->qty;
                $orderDetail->save();
            }

            $shipping = Shipping::where('id', $order->shipping_id)->first();
            $shipping = json_decode(json_encode($shipping), true);

            $email = $shipping['email'];
//            echo "<pre>"; print_r($shipping); die;

//             $data['order'] = $order->toArray();

            $emailDate = [
                'email' => $email,
                'name' => $shipping['name'],
                'order_id' => $order->id,
            ];

            /*Mail::send('FrontEnd.mail.welcome_mail', $emailDate, function ($message) use($email) {
            $message->to($email);
            $message->subject('Order Invoice');
            });*/

            if (Session::has('coupon')) {
                session()->forget('coupon');
            }
            Cart::destroy();

            Session::flash('success', 'Your order has been successfully processed!!!');

            return redirect('/checkout/order/complete');

        } elseif ($paymentType == 'Stripe') {

            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('sum');

            if (Session::has('coupon_discount')) {
                $order->coupon_discount = Session::get('coupon_discount');
            } else {
                $order->coupon_discount = 0;
            }

            $order->save();

            $payMent = new payment();
            $payMent->order_id = $order->order_id;
            $payMent->payment_type = $paymentType;
            $payMent->save();

            $CartDish = Cart::content();

            foreach ($CartDish as $cart) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->order_id;
                $orderDetail->dish_id = $cart->id;
                $orderDetail->dish_name = $cart->name;
                $orderDetail->dish_price = $cart->price;
                $orderDetail->dish_qty = $cart->qty;
                $orderDetail->save();
            }

            $shipping = Shipping::where('id', $order->shipping_id)->first();
            $shipping = json_decode(json_encode($shipping), true);

//            echo "<pre>"; print_r($shipping); die;
            $email = $shipping['email'];
            $name = $shipping['name'];
            $phone_no = $shipping['phone_no'];
            $address = $shipping['address'];
            $total = $order->order_total;

//             $data['order'] = $order->toArray();

            $emailData = [
                'email' => $email,
                'name' => $name,
                'number' => $phone_no,
                'address' => $address,
                'order_id' => $order->id,
                'total' => $total,
            ];

            Mail::send('FrontEnd.mail.welcome_mail', $emailData, function ($message) use ($email) {
                $message->to($email);
                $message->subject('Order Invoice');
            });

            if (Session::has('coupon')) {
                session()->forget('coupon');
            }
            Cart::destroy();

            return redirect('/stripe-payment');

        }

    }

    public function complete()
    {
        return view('FrontEnd.checkOut.order_complete');
    }

}

<?php

namespace App\Http\Controllers;
use App\Order;

use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function bookingReport ()
    {
       $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.name','payments.payment_type','payments.payment_status')
            ->latest()->get();

        return view('BackEnd.Report.booking', compact('orders'));
    }
}

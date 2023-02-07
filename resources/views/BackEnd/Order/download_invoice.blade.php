<!doctype html>
<html>
<head>
    <style>


        .padding {
            padding: 2rem !important
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 20px
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium'
        }

        .text-dark {
            color: #3d405c !important
        }

    </style>
</head>
<body>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <div class="float-right">
                <h3 class="mb-0">Invoice #{{ $order->order_id }}</h3>
                Date: {{ $order->created_at }}
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">O F C S M S</h3>
                    <div>22, West Datta Para </div>
                    <div>Nishat Nagar, Tongi, Gazipur 1712</div>
                    <div>Email: ofcsms@gmail.com</div>
                    <div>Phone: +88 015 2132 8545</div>
                </div>
                <hr>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark"> {{ $shipping->name }}</h3>
                    <div>{{ $shipping->address }}</div>
                    <div>{{ $shipping->email }}</div>
                    <div>{{ $shipping->phone_no }}</div>
                </div>
                <hr>
            </div>
            {{-- <div>
                <table border="1">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Item</th>
                        <th class="right">Price</th>
                        <th class="center">Qty</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @php($sum = 0)

                    @foreach($order_details as $orderD)
                        <tr>
                            <td class="center">{{ $i++ }}</td>
                            <td class="left strong">{{ $orderD->dish_name }}</td>
                            <td class="right">TK. {{$orderD->dish_price }}</td>
                            <td class="center">{{ $orderD->dish_qty }}</td>
                            <td class="right">TK. {{ $total = $orderD->dish_price * $orderD->dish_qty}}</td>
                        </tr>
                        @php($sum = $sum + $total)
                    @endforeach


                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr style="float: right">
                            <td class="left">
                                <strong > Grand Total</strong>
                            </td>
                            <td class="right">TK. {{ $sum}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div> --}}






            <div>
                        <table border="1">
                            <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th class="center">Qty</th>
                                <th class="right">Price</th>
                                <th class="right">Discount Price</th>
                                <th class="right">Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @php($sum = 0)

                            @foreach($order_details as $orderD)
                                <tr>
                                    <td class="center">{{ $i++ }}</td>
                                    <td class="left strong">{{ $orderD->dish_name }}</td>
                                    <td class="center">{{ $orderD->dish_qty }}</td>
                                    <td class="right">{{ $orderD->dish_price }}tk</td>
                                    <td class="right" title="Coupon Discount">
                                        <?php
                                            $subTatal = $orderD->dish_qty * $orderD->dish_price;
                                            $discount = $subTatal * $orderD->order->coupon_discount/ 100
                                        ?>

                                        @if(!empty($order->coupon_discount))
                                            {{ $discount }}tk
                                        @else
                                            0 tk
                                        @endif
                                    </td>
                                    <td class="right">{{ $subTatal-$discount  }}tk</td>
                                </tr>
                            @endforeach

                            <tr>
                               {{-- <th> $orderD->order->order_total</th> --}}
                               <td colspan="12" style="text-align: center"><b>Grand Total :</b> {{ $order->order_total }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">O F C S M S, 22, West Datta Para, Nishat Nagar, Tongi, Gazipur 1712</p>
        </div>
    </div>
</div>

</body>
</html>


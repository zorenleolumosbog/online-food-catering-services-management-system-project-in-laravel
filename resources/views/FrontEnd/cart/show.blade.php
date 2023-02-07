@extends('FrontEnd.master')

@section('title')
    Cart Show item
@endsection

@section('content')

    <div class="products">
        <div class="container">

            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <h4>{{ Session::get('success') }}</h4>
                </div>
            @endif

            @if(Session::has('coupon'))

                {{-- hide coupon field if have coupon--}}
            @else
                <div class="offset-2 col-lg-4 col-md-4 col-sm-4">
                    <form action="{{ route('coupon_apply') }}" method="post">
                        @csrf
                        <div class="card">
                            <h3 class="card-header" style="margin: 5px 0 ">Have Coupon</h3>
                            <div class="card-body">
                                <input type="text" name="coupon_code" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success" style="margin: 10px 0" value="Poo">
                            </div>
                        </div>
                    </form>
                </div>
            @endif



                                          {{-- Coupon Card --}}

<div class="row">
    <div class=" col-md-4 card text-white bg-danger mb-3" style="max-width: 18rem; margin:50px; margin-top:0px">
  <div class="card-header">Use This Code For(100-1000)TK</div>
  <div class="card-body">
    <h1 class="card-title">c12335</h1>
    <p class="card-text">You Can get 10% Off for this Coupon. So hurry up for order!!!</p>
  </div>
</div>
<div class="col-md-4  card text-white bg-info mb-3" style="max-width: 18rem; margin:50px; margin-top:0px">
  <div class="card-header">Use This Code For(1000-2000)TK</div>
  <div class="card-body">
    <h1 class="card-title">a2345</h1>
    <p class="card-text">You Can get 20% Off for this Coupon. So hurry up for order!!!</p>
  </div>
</div>
<div class="col-md-4  card text-white bg-success mb-3" style="max-width: 18rem; ">
  <div class="card-header">Use This Code For(2000-10000)TK</div>
  <div class="card-body">
    <h1 class="card-title">b12345</h1>
    <p class="card-text">You Can get 30% Off for this Coupon. So hurry up for order!!!</p>
  </div>
</div>
</div>




            <div class="col-md-9 product-w3ls-right">

                <div class="card">
                    <h3 class="card-header text-center" style="background-color: lightyellow; height: 70px;width: auto">
                        Cart Items
                    </h3>
                    <div class="card-body">

                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Remove</th>
                                <th scope="col">Dish Name</th>
                                <th scope="col">Dish Image</th>
                                <th scope="col">Dish Price</th>
                                <th scope="col">Quantity</th>
                                @if(Session::has('coupon'))
                                    <th scope="col">Coupon</th>
                                    <th scope="col">Discount</th>
                                @else

                                @endif
                                <th scope="col">Total Price</th>

                                <th scope="col">Grand Total Price</th>
                            </tr>

                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($sum=0)
                            @php($couponTotal=0)

                            @foreach( $CartDish as $dish)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <th scope="row">
                                    <a href="{{ route('remove_item', ['rowId' => $dish->rowId]) }}" type="button" class="btn btn-danger">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </th>

                                <td>{{ $dish->name }}</td>
                                <td>
                                    <img src="{{ asset($dish->options->image) }}" style="width: 50px; height: 50px; border-radius: 50%">
                                </td>
                                <td>{{ $dish->price }} TK</td>

                                @if(Session::has('coupon'))

                                    <form action="{{ route('update_cart') }}" class="form-inline" method="post">
                                        @csrf
                                        <td>
                                            <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                            <input type="text" name="qty" value="{{ $dish->qty }}" style="width: 50px; height:25px" minlength="1">
                                            <input type="submit" name="btn" class="btn btn-success" value="Update" style="width: 50px; height:25px;padding: 0; float: right; margin-top: -25px; margin-left: 5px;">
                                        </td>

                                        <td>
                                            {{ session()->get('coupon')['coupon_code'] }}
                                        </td>
                                        <td>
                                            {{ $coupon_discount = session()->get('coupon')['coupon_value'] }}%
                                        </td>

                                        <td>
                                            {{ $subTotal= $dish->price*$dish->qty }} TK
                                            ( - {{$discount = $subTotal * session()->get('coupon')['coupon_value'] / 100 }}tk)

                                            <?php
                                                Session::put('coupon_discount', $coupon_discount);
                                            ?>
                                        </td>
                                        <td>
                                            <input type="hidden" value="{{ $total= $dish->price*$dish->qty }}">
                                            <input type="hidden" value="{{$discount = $total * session()->get('coupon')['coupon_value'] / 100 }}">

                                            <input type="hidden" value="{{ $couponSubTotal = $total-$discount }}">

                                            <input type="hidden" value="{{ $couponTotal += $couponSubTotal }}">

                                            <?php
                                                Session::put('sum', $couponTotal);
                                            ?>

                                            <?php
                                                Session::put('coupon_discount', $coupon_discount);
                                            ?>
                                        </td>
                                    </form>

                                @else
                                    <td>
                                        <form action="{{ route('update_cart') }}" class="form-inline" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                            <input type="text" name="qty" value="{{ $dish->qty }}" style="width: 50px; height:25px" minlength="1">
                                            <input type="submit" name="btn" class="btn btn-success" value="Update" style="width: 50px; height:25px;padding: 0;">
                                        </form>
                                    </td>

                                    <td class="form-inline">{{ $subTotal= $dish->price*$dish->qty }} TK</td>

                                <input type="hidden" value="{{ $sum +=$subTotal }}">
                                <?php
                                    Session::put('sum', $sum);
                                ?>

                                @endif

                            </tr>
                            @endforeach

                            @if(Session::has('coupon'))
                                <tr>
                                    <td></td> <td></td> <td></td>
                                    <td></td><td></td>
                                    <td><td> <td><td><td>  = {{ $couponTotal }} tk</td>
                                </tr>
                            @else
                            <tr>
                                <td></td> <td></td> <td></td>
                                <td></td><td></td>
                                <td><td><td>  = {{ $sum }} tk</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

                <div class="col-md-9 product-w3ls-left">
                    <a href="{{ url('/') }}" class="btn btn-primary" style="float: left">
                        <i class="fa fa-arrow-left"></i>
                        Order More<br/>
                    </a>
                </div>

            @if(Session::get('shipping_id') )
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/checkout/payment') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @elseif(Session::get('customer_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/shipping') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @else

            <div class="col-md-9 product-w3ls-right" title="Please Login First To Continue Your Process">
                <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-info" style="float: right">
                    <i class="fa fa-shopping-bag"></i>
                    Checkout
                </a>
            </div>

            @endif

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="login_or_register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>
                                    Welcome..! To Food Catering Service
                                </h3>
                                <div class="text-center" style="
                                                                margin-top:25px;
                                                                height: 160px;
                                                                width: 160px;
                                                                border-radius: 50%;
                                                                background-color: darkblue;
                                                                color: ghostwhite;
                                                                padding-top: 65px;
                                                                font-size: 20px">
                                    Keep your smile...
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Are you a new member...! </h4>
                                <a href="#sigup-modal" data-toggle="modal" class="btn-block btn-primary text-center"
                                   style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 25px;
                                            font-size: 25px
                                           ">
                                    <span class="mt-5">Register</span>
                                </a>

                                <h3 class="mt-lg-5 text-center">Or</h3>

                                <h4 class="mt-5">Already have an account... </h4>

                                <a href="#signin-modal" data-toggle="modal" class="btn-block btn-success text-center"
                                   style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 10px;
                                            font-size: 25px
                                           ">
                                    <span class="mt-5">Login</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
@endsection



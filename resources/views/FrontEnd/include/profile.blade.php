@extends('FrontEnd.master')

@section('title')
    Profile Information
@endsection

@section('content')



    <div class="w3agile-spldishes">
        <div class="container">
            <h3 class="w3ls-title">
                @if(!empty($customer->photo))
                    <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{$profile->photo}}" alt="profile picture">
                @else
                    <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{ asset('/') }}frontEndSourceFile/images/i2.jpg" alt="profile picture">
                @endif
                Welcome
                @if(!empty($customer->name))
                    "{{$customer->name}}"
                @endif
                ...!</h3>
            <div class="order-agileinfo">
                <div class="offset-1 col-lg-6 col-md-6 col-sm-12 col-xs-12 order-w3lsgrids text-center">
                    <h4 class="form-inline">
                        Your Email :
                        <span>@if(!empty($customer->email)){{$customer->email}}@endif</span>
                    </h4>
                </div>
                <div class="offset-1 col-lg-6 col-md-6 col-sm-12 col-xs-12 order-w3lsgrids text-center">
                    <h4 class="form-inline">
                        Your Phone Number :
                        <span>@if(!empty($customer->phone_no)){{$customer->phone_no}}@endif</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="wthree-order">

        <div class="container">

            <h4 class="w3lsorder-text text-center">Here You can customize your <strong>Recent Order & Wishlist</strong>.</h4>
            <hr/>
            <div class="order-agileinfo">
                <div class="col-md-10 col-sm-10 col-xs-10 order-w3lsgrids">
                    {{-- For show flash message --}}

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <h4>{{ Session::get('success') }}</h4>
                        </div>
                    @endif

                    {{-- // For show flash message --}}
                    <h3>Order List</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Order Discound</th>
                                <th scope="col">Order Total</th>
                                <th scope="col">Shipping Address</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @if (Session::has('customer_id'))

                                @forelse($customer_order as $key => $order)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td style="color: #2a07b3;font-size: 15px">{{ $order->order_status }}</td>
                                        <td style="color: #2a07b3;font-size: 15px">
                                          @if(!empty($order->coupon_discount))
                                            {{ $order->coupon_discount }}%
                                            @else
                                              0%
                                            @endif
                                        </td>
                                        <td style="color: #2a07b3;font-size: 15px">
                                            {{ $order->order_total }}tk
                                        </td>
                                        <td style="color: #2a07b3;font-size: 15px">
                                            {{ $order->shipping->address }}
                                        </td>
                                        @if($order->order_status == 'pending')
                                            <td>
                                                <a title="Want to cancel this order" href="{{ route('order_cancel',$order->order_id) }}"
                                                   style="color: #2a07b3;font-size: 15px" class="btn btn-danger">
                                                    <i class="fa fa-trash" style="font-size: 15px; color: red"></i>
                                                    Cancel
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a title="Your order cancelled" href="#" style="color: #2a07b3;font-size: 15px" class="btn">
                                                    <i class="fa fa-cross" style="font-size: 15px; color: red"></i>
                                                    Cancelled
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center; color: #0b2e13; font-size: 24px" >
                                          Oops... No Order Found
                                        </td>
                                    </tr>
                                @endforelse

                            @else

                            @endif

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <div class="order-agileinfo">
                <div class="col-md-10 col-sm-10 col-xs-10 order-w3lsgrids">
                    <h3>Wishlist</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dish Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>


                            @php
                                $customerId = Session::get('customer_id');
                                 $customerWishlist = App\Wishlist::where('customer_id',$customerId)->latest()->get();
                            @endphp

                            <tbody>
                                @php($i = 1)
                                @forelse($customerWishlist as $wish)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td style="color: #2a07b3;font-size: 15px">{{ $wish->dish->dish_name }}</td>
                                        <td>
                                            <img src="{{ asset($wish->dish->dish_image) }}" alt="dish-img"
                                                 style="width: 70px; height: 70px; border-radius: 50%">
                                        </td>
                                        <td style="color: #2a07b3;font-size: 15px">{{ $wish->dish->full_price }}</td>
                                        <td>
                                            <a href="{{ route('wish_destroy',$wish->id) }}" style="color: #2a07b3;font-size: 15px" class="btn">
                                                <i class="fa fa-trash" style="font-size: 15px; color: red"></i> Remove</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center; color: #0b2e13; font-size: 24px" >Oops... No Wishlist Found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

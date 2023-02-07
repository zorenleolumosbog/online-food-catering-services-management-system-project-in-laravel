@extends('FrontEnd.master')

@section('title')
    Shipping
@endsection

@section('content')

    <!-- Shipping -page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{ asset('/') }}frontEndSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Enter Your Shipping Information</h3>
            <p class="w3ls-title w3ls-title1 text-center" >You can change your shipping information</p>
            <div class="login-agileinfo">
                <form action="{{ route('store_shipping') }}" method="post">
                    @csrf
                    <label>Full Name</label>
                    <input class="agile-ltext" type="text" name="name" placeholder="Enter your good name" value="{{ $customer->name }}">
                    <label>Email</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your email is..." value="{{ $customer->email }}">
                    <label>Phone NO</label>
                    <input class="agile-ltext" type="text" name="phone_no" placeholder="Your phone number is..." value="{{ $customer->phone_no }}">
                    <label>Address</label>
                    <input class="agile-ltext" type="text" name="address" placeholder="Enter your address..." value="" required="">
                    <div class="wthreelogin-text">
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Click To Confirm Order">
                </form>
            </div>
        </div>
    </div>
    <!-- //Shipping -page -->

@endsection

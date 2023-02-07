@extends('FrontEnd.master')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                {{--@if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif--}}

                <div class="card">
                    <div class="card-header text-muted">
                        <h3 class="text-center">We've to know which payment method you want.....</h3>
                            <strong class="text-center">{{ Session::get('sms') }}</strong>
                    </div>
                    <div class="card mt-4">
                        <h5 class=" card-header text-center text-muted" style="margin-top: 10px">Please select your payment method</h5>
                        <div class="card-body">
                            <div class="checkout-left">
                                <div class="address_form_agile mt-sm-5 mt-4">

                                    <form action="{{ route('new_order') }}" method="post">
                                        @csrf
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Cash On Delivery</th>
                                                <td><input type="radio" name="payment_type" value="Cash On"> Cash On</td>
                                            </tr>
                                            <tr>
                                                <th>Stripe Card</th>
                                                <td><input type="radio" class="mr-5" name="payment_type" value="Stripe"> Stripe</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td>
                                                    <input type="submit" name="btn" class="btn btn-success" value="Confirm Order">

                                                </td>
                                            </tr>
                                        </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

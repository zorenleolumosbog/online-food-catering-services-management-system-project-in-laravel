@extends('FrontEnd.master')

@section('title')
    Order | Complete
@endsection

@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    {{-- For show flash message --}}

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <h4>{{ Session::get('success') }}</h4>
                        </div>
                    @endif

                    {{-- // For show flash message --}}

                    <div class="card-body">
                        <h2 class="text-capitalize">Thanks for Your order.</h2>
                        <p>We will contact you as soon as possible....</p>
                        <a href="{{ url('/') }}" class="btn btn-info">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

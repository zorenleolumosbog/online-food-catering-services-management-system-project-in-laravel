@extends('BackEnd.master')
@section('title')
    Home page || (Dashboard)
@endsection
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 "><strong>Welcome to the Admin Panel</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-3 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2 bg-info">
                    <div class="card-body  ">
                        @php
                            $OrderCount = App\Order::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Orders !!!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Total Orders {{ $OrderCount }} </h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('show_order') }}" class="small-box-footer" style="color: black">Show Order <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                    <div class="card-body">
                        @php
                            $CustomerCount = App\Customer::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total {{ $CustomerCount }}!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Registered Customer</h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-xl-3 col-md-3 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body  ">
                        @php
                            $OrderCancel = App\Order::where('order_status','cancelled')->get();
                        @endphp
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Cancel Orders !!!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Total Order Cancel {{ $OrderCancel->count() }} </h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('cancelled_order') }}" class="small-box-footer" style="color: black">Show Cancel Order <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


            {{-- <div class="col-xl-3 col-md-3 mb-4 ">
                <div class="card border-left-primary shadow h-100 py-2 bg-success">
                    <div class="card-body  ">
                        @php
                            $OrderCount = App\Order::all()->count();
                        @endphp
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Revenue !!!</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h4>Total Revenue {{ $OrderCount }} </h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <a href="{{ route('show_order') }}" class="small-box-footer" style="color:black">Show Revenue <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>


    </div>








@endsection


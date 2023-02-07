@extends('BackEnd.master')

@section('title')
    Cancelled
@endsection

@section('content')
    {{-- for display message --}}
    @if(Session::get('sms'))
        <div class="alert alert-default-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- end message --}}

    <div class="card my-5">

        <div class="card-header">
            <h5 class="fw-bold text-center">Cancelled Orders</h5><br>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered  table-hover table-striped">
                <thead>

                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Discount</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>

                </thead>
                <tbody>

                @php($i = 1)

                @foreach($cancelOrder as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $order->customer->name }}
                        </td>
                        <td >
                            {{ $order->order_total }}
                        </td>
                        <td class="float-right">
                            @if(!empty($order->coupon_discount))
                                {{ $order->coupon_discount }}%
                            @else
                                0%
                            @endif
                        </td>
                        <td>
                            <span class="btn btn-sm btn-dark mt-1">
                                {{ $order->order_status }}
                            </span>
                        </td>
                        <td>
                            <a class="btn text-danger mt-1" id="delete" href="{{ route('delete_order',$order->order_id) }}">
                                <i class="fas fa-trash" title="Click to destroy"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

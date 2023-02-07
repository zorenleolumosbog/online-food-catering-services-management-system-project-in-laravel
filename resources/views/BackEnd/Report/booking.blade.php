  @extends('BackEnd.master')
@section('title')
    Reports || (Booking Reports)
@endsection
@section('content')



     {{-- <div class="form-group">
        <button type="button" onclick="printDiv()" class="btn btn-success position-relative">Print</button>
    </div> --}}

     <div class="form-group">
          <div class="text-right">
	              <button type="button" onclick="printDiv()" class="btn btn-success mt-3">Print</button>
	      </div>
    </div>

<div id="printArea">

    <div class="card my-5">

        <div class="card-header">
            <h5 class="fw-bold text-center">Booking Report</h5><br>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered  table-hover table-striped">
                <thead>

                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>

                </tr>

                </thead>
                <tbody>

                @php($i = 1)

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $order->name }}
                        </td>
                        <td>
                            {{ $order->order_total }}
                        </td>
                        <td>
                            {{ $order->order_status }}
                        </td>
                        <td>
                            {{ $order->created_at }}
                        </td>
                        <td>
                            {{ $order->payment_type }}
                        </td>
                        <td>
                            {{ $order->payment_status }}
                        </td>


                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

</div>


    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>

@endsection

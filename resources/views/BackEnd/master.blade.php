<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/BackEndSourceFile') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/BackEndSourceFile') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('/BackEndSourceFile') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- notify js cdn--}}
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
    <style>
        .notifyjs-corner{
            z-index: 10000 !important;
        }
    </style>--}}


</head>

<body class="hold-transition sidebar-mini">




<div class="wrapper">

    <!-- Navbar -->
   @include('BackEnd.include.menu')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('BackEnd.include.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
              @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- for notify js script--}}
    {{--@if(session()->has('sms'))
        <script>
            $(function (){
              $.notify("{{ session()->get('sms') }}",{ globalPosition:'top right',className:'sms'});
            });
        </script>
    @endif--}}

    <!-- Control Sidebar -->
    @include('BackEnd.include.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{ asset('/BackEndSourceFile') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/BackEndSourceFile') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/BackEndSourceFile') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('/BackEndSourceFile') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('/BackEndSourceFile') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

<script>
    $(function (){
       $(document).on('click','#delete', function (e){
         e.preventDefault();
         var link = $(this).attr("href");
           Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
               if (result.isConfirmed) {
                   window.location.href = link;
                   Swal.fire(
                       'Deleted!',
                       'Your file has been deleted.',
                       'success'
                   )
               }
           })
       });
    });

</script>



</body>
</html>

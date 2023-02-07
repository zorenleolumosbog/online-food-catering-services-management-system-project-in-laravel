@extends('BackEnd.master')

@section('title')
    Dish Manage
@endsection

@section('content')
    {{-- for display message --}}
        @if(Session::get('sms'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{{ Session::get('sms') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    {{-- end message --}}

    <div class="card my-5">

        <div class="card-header">
            <h5 class="fw-bold text-center">Manage Dish</h5><br>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>

                <tr>
                    <th>SL</th>
                    <th>Dish Name</th>
                    <th>Category Name</th>
                    <th>Dish Details</th>
                    <th>Dish Image</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @php($i = 1)

                @foreach($dishes as $dish)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $dish->dish_name }}
                        </td>
                        <td>
                            {{ $dish->category_name }}
                        </td>
                        <td>
                            {{ $dish->dish_detail }}
                        </td>
                        <td>
                            <img src="{{ asset($dish->dish_image) }}" height="40" width="40" class="">
                        </td>
                        <td>
                            {{ $dish->created_at }}
                        </td>

                        <td>

                            @if($dish->dish_status == 1)
                                <a class="btn btn-outline-success" href="{{ route('dish_inactive',['dish_id'=>$dish->dish_id]) }}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{ route('dish_active',['dish_id'=>$dish->dish_id]) }}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{ $dish->dish_id }}" >
                                <i class="fas fa-edit" title="Click to change it"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{ route('delete_dish',['dish_id'=>$dish->dish_id]) }}">
                                <i class="fas fa-trash" title="Click to destroy"></i>
                            </a>
                        </td>
                    </tr>
                    {{-- ============================================= modal start here ======================================================= --}}

                    <div class="modal fade" id="edit{{ $dish->dish_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


                        <div class="modal-dialog" role="document">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">Update Dish Data</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_dish') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="dish_name" value="{{ $dish->dish_name }}">
                                            <input type="hidden" class="form-control" name="dish_id" value="{{ $dish->dish_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                                <option>----Select Category----</option>
                                                @foreach($categories as $cate)
                                                    <option value="{{ $cate->category_id }}" {{ ($dish->category_id==$cate->category_id)?"selected":"" }}> {{ $cate->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Details</label>
                                            <textarea type="text" name="dish_detail" class="form-control" rows="5">{{ $dish->dish_detail }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Previous Image</label>
                                            <img src="{{ asset($dish->dish_image) }}" style="height: 150px; width: 150px; border-radius: 50%">
                                            <input type="file" class="form-control" name="dish_image" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label>Dish Price</label>
                                            <input type="text" class="form-control"  name="full_price" value="{{ $dish->full_price }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btn" class="btn btn-outline-primary btn-block"  value="Update">
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                    {{-- ============================================= modal end here ========================================================== --}}
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

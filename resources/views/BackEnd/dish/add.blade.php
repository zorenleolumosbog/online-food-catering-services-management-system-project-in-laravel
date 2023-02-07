@extends('BackEnd.master')
@section('title')

    Dish Add
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-2 col-md-8 my-lg-5">

                @if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header text-center">
                        Dish
                    </div>
                    <div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                        <form action="{{ route('save_dish_table') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"  name="dish_name" required="">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option>----Select Category----</option>
                                    @foreach($categories as $cate)
                                        <option value="{{ $cate->category_id }}"> {{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Details</label>
                                <textarea type="text" name="dish_detail" class="form-control" rows="5" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label >Image</label>
                                <input type="file" class="form-control" name="dish_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <input type="radio" name="dish_status" value="1">Active
                                    <input type="radio" name="dish_status" value="0">Inactive
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Dish Price</label>
                                <div class="radio">
                                    <input type="text" class="form-control"  name="full_price" placeholder="Enter price" >
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary">Submit Dish</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

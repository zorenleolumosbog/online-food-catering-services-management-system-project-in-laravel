@extends('BackEnd.master')
@section('title')

    Category Page
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">

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
                        Category
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
                        <form action="{{ route('cate_save') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control"  name="category_name" required="">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <textarea type="text" class="form-control" name="description" rows="5"></textarea>

                            </div>
                            <div class="form-group">
                                <label >Added On</label>
                                <input type="date" class="form-control" name="added_on" required="">
                            </div>

                            <div class="form-group">
                                <label>Category Status</label>
                                <div class="radio">
                                    <input type="radio" name="category_status" value="1">Active
                                    <input type="radio" name="category_status" value="0">Inactive
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Category Add</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
<div class="container">
    <h4>Edit Category</h4>
    <hr>
    <div class="col-md-10">
        <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label @error('name') is-invalid @enderror" for="name">Category
                    Name</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="name" value="{{$category->name}}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
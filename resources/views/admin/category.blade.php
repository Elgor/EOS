@extends('layouts.admin')
@section('content')
<div class="container">
    <h4>Category</h4>
    <hr>

    <table class="table">
        @if($categories->count()>0)
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>

                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class=" btn btn-primary" href="{{ route('category.edit',$category->id) }}" role="button">
                        Edit</a>
                    <a class=" btn btn-danger" href="{{ route('category.delete',$category->id) }}" role="button">
                        Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No Package</h4>
        @endif
    </table>
    <hr>
    <h5>Insert Category</h5>
    <hr>
    <div class="col-md-10">
        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label @error('name') is-invalid @enderror" for="name">category
                    Name</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="name" required autofocus>
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
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
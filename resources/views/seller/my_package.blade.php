@extends('layouts.app')
@section('content')
<div class="container">
    <h4>My Package</h4>
    <hr>
    @if (Auth::user()->package_id)
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Feature</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ( as $cartItem) --}}
            <tr>
                <td>Image</td>
                <td>name</td>
                <td>price</td>
                <td>feature</td>
                <td><a class=" btn btn-danger" href=" route('cart.destroy', $cartItem->id)" role="button">
                        Delete</a>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    @else
    <h2>Empty package</h2>
    @endif
    <h5>Create Package</h5>
    <hr>
    <div class="col-md-10">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label" for="packageName">Package
                    Name</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="packageName">
                </div>
            </div>
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label" for="price">Price
                </label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="price">
                </div>
            </div>
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label" for="description">Description</label>
                <div class="col-md-7">
                    <textarea class="form-control" placeholder="Description" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label" for="price">Feature
                </label>
                <div class="col-md-7">
                    <select class="selectpicker" multiple data-width="fit" data-live-search="true" name="contoh[]">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-left">Package Picture</label>
                <div class="col-md-7">
                    <input type="file" name="picture">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-left">Upload Images</label>
                <div class="col-md-7">
                    <input type="file" name="imageList[]" id="images" multiple="multiple">
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

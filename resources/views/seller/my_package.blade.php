@extends('layouts.app')
@section('content')
<div class="container">
    <h4>My Package</h4>
    <hr>
    @if($products->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Price</th>
                <th>Feature</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>
                    <img src="{{ asset('/storage/'.$product->image) }}" alt="" heigt=100 width=100>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>@foreach($product->features as $feature)
                    <p>{{ $feature }}</p>
                    @endforeach</td>
                <td><a class=" btn btn-danger" href="{{ route('product.delete',$product->id) }}" role="button">
                        Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>NO PACKAGE</h2>
    @endif
    <hr>
    <h5>Create Package</h5>
    <hr>
    <div class="col-md-10">
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
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
                    <select class="selectpicker" multiple data-width="fit" data-live-search="true" name="features[]">
                        <option value="1 Hour Photoshoot">1 Hour Photoshoot</option>
                        <option value="2 Hour Photoshoot">2 Hour Photoshoot</option>
                        <option value="3 Hour Photoshoot">3 Hour Photoshoot</option>
                        <option value="4 Hour Photoshoot">4 Hour Photoshoot</option>
                        <option value="5 Hour Photoshoot">5 Hour Photoshoot</option>
                        <option value="6 Hour Photoshoot">6 Hour Photoshoot</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-left">Package Picture</label>
                <div class="col-md-7">
                    <input type="file" name="image">
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

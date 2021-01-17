@extends('layouts.seller')
@section('content')
<div class="container">
    <h4>My Package</h4>
    <hr>

    <table class="table table-bordered shadow-sm bg-white">
        @if($products->count()>0)
        <thead>
            <tr>
                <th class="text-center align-middle">Picture</th>
                <th class="text-center align-middle">Name</th>
                <th class="text-center align-middle">Price</th>
                <th class="text-center align-middle">Feature</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="text-center align-middle">
                    <img src="{{ asset('/storage/'.$product->image) }}" alt="" height=120 width=120>
                <td>{{ $product->name }}</td>
                <td>Rp {{number_format($product->price,0,',','.')}}</td>
                <td>@foreach($product->features as $feature)
                    <p>{{ $feature }}</p>
                    @endforeach</td>
                <td class="text-center align-middle">
                    <a class=" btn btn-danger" href="{{ route('product.delete',$product->id) }}" role="button">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No Package</h4>
        @endif
    </table>
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
                <label class="col-md-3 col-form-label text-md-left control-label" for="price">Feature</label>
                <div class="col-md-7 ">
                    <select class="selectpicker" multiple data-width="fit" data-live-search="true" name="features[]">
                        <option value="1 Hour Photoshoot">1 Hour Photoshoot</option>
                        <option value="2 Hour Photoshoot">2 Hour Photoshoot</option>
                        <option value="1 Photographer">1 Photographer</option>
                        <option value="2 Photographer">2 Photographer</option>
                        <option value="1 Videographer">1 Videographer</option>
                        <option value="2 Videographer">2 Videographer</option>
                        <option value="Live Streaming">Live streaming</option>
                        <option value="Photobooth Decoration">Photobooth Decoration </option>
                        <option value="Make Up Event">Make Up Event</option>
                        <option value="100 edited files">100 edited files</option>
                        <option value="200 edited files">200 edited files</option>
                        <option value="1 Day Photo Session">1 Day Photo Session</option>
                        <option value="2 Day Photo Session">2 Day Photo Session</option>
                        <option value="Dekorasi meja">Dekorasi meja</option>
                    </select>
                </div>
            </div>
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label">Package Picture</label>
                <div class="col-md-7">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group row required">
                <label class="col-md-3 col-form-label text-md-left control-label">Upload Images</label>
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

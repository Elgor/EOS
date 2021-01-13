@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex flex-row-reverse mr-3">
        <form class="form-inline" action="{{ route('product-search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-md-0" type="submit">Search</button>
        </form>
    </div>
    <div class="d-flex flex-row-reverse m-3 justify-content-between">
        <form class="form-inline" action="{{ route('product-filter') }}" method="GET">
            <div class="form-group mr-sm-4">
                <label class="form-group mr-2" for="price">Price</label>
                <!-- <select style="width:150px" class="form-control" id="price" name="price" placehol>
                    <option value="0">Min</option>
                    <option value="1">1 Jt</option>
                    <option value="2">10 - 50 Jt</option>
                    <option value="3">50-100 Jt</option>
                    <option value="4">> 100 Jt</option>
                </select> -->
                <input class="form-control mr-2" type="search" placeholder="Min" aria-label="Min" name="min">

                <!-- </div>
            <div class="form-group mr-sm-2"> -->
                <label class="form-group mx-2">-</label>
                <!-- <select style="width:150px" class="form-control" id="city" name="city">
                    <option value="0">All</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Tanggerang">Tanggerang</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Depok">Depok</option>
                </select> -->
                <input class="form-control" type="search" placeholder="Max" aria-label="Max" name="max">
                
            </div>
            <button class="btn btn-outline-success mt-2 mt-md-0" type="submit">Filter</button>
        </form>
    </div>
    <h4 class="d-flex">PACKAGES</h4>
    <hr>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-3 d-flex" style="min-height: 400px">
            <div class="card mb-4">
                <a href=" {{ route('product.detail',$product->id) }}"><img class="card-img-top" style="height: 200px;" src="{{ asset('/storage/'.$product->image) }}" alt="Card image cap"></a>
                <div class="card-body pb-0">
                    <div class="card-title">
                        <h4>{{ $product->name }}</h4>
                        <a href="{{route('seller.detail',$product->seller_id) }}">
                            {{ $product->seller->business_name }}
                        </a>
                    </div>
                    <div class="card-text">
                        <p>{{\Illuminate\Support\Str::limit($product->description, 90, $end='...') }}</p>
                    </div>
                </div>
                <h6 class="card-text font-weight-bold text-center">Rp {{ number_format($product->price,0,',','.') }}
                </h6>
                <div class="card-link text-center bg-transparent pb-3">
                    <a class="btn btn-outline-info" href="{{ route('product.detail',$product->id) }}" role="button">Add
                        to Order</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}

    </div>
</div>
@endsection
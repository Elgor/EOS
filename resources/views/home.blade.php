@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Packages</li>
        </ol>
    </nav>
    <h2 class="text-center">Packages</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-3 d-flex p-2">
            <div class="card mb-4">
                <a href=" {{ route('product.detail',$product->id) }}"><img class="card-img-top"
                        src="{{ asset('img/defaultProduct.jpg') }}" alt="Card image cap"></a>
                <div class="card-body pb-0">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <div class="card-text">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <h6 class="card-text font-weight-bold text-center">Rp {{ number_format($product->price,0,',','.') }}
                </h6>
                <div class="card-link text-center bg-transparent pb-3">
                    <a class="btn btn-outline-info" href="{{ route('cart.add',$product->id) }}" role="button">Add
                        to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
@endsection

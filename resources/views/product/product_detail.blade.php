@extends('layouts.app')

@section('title')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
</div>
<!--Section: Block Content-->
<section class="mb-5 p-4 round-border">
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="row">
                <div class="col-12 mb-0">
                    <figure class="text-center">
                        <img class="round-border" src="{{ asset('/storage/'.$product->image) }}"
                            style="max-height: 250px; max-width: 300px;">
                    </figure>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($product->imageList as $image)
                        <div class="col-4">
                            <div class="view overlay rounded z-depth-1 gallery-item round-border mb-2">
                                <a href="{{ asset('/storage/'.$image->path) }}" data-lightbox="photos">
                                    <img src="{{ asset('/storage/'.$image->path) }}" class="img-fluid"
                                        style="min-height: 115px">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="font-weight-bold">{{ $product->name }}</h4>
            <p class="mb-2 text-muted">by <a
                    href="{{ route('seller.detail',$product->seller->id) }}">{{ $product->seller->business_name }}</a>
            </p>
            <div>
                <p class="mb-1 font-weight-bold">Description</p>
                <p>{{ $product->description }}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Features</p>
                <ul class="pl-4">
                    @foreach($product->features as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
            <h5 class="font-weight-bold">Rp {{ number_format($product->price,0,',','.') }}</h5>
            <div class="border mt-3 m-1 p-2 row  round-border border">
                <div class="col-md-12 pt-2 pb-2">
                    <form class="form" method="POST" action="{{route('order.store')}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="seller_id" value="{{$product->seller->id}}">
                        <div class="form-group mb-3">
                            <label class="text-md-right pr-1 font-weight-bold" for="negotiation_price">Negotiation
                                Price</label>
                            <div style="width: 100%">
                                <input name="negotiation_price" type="text" class="form-control" maxlength="15"
                                    placeholder="Rp {{ number_format($product->price,0,',','.') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-md-right pr-1 font-weight-bold" for="event_plan">Event
                                Plan</label>
                            @if(Auth::user() && Auth::user()->eventPlans->count() !==0)
                            <select class="form-control" style="width: 100%" name="event_plan_id">
                                @foreach(Auth::user()->eventPlans as $e)
                                <option>Select Event Plan</option>
                                <option value="{{$e->id}}">{{$e->eventName}}</option>
                                @endforeach
                            </select>
                            @else
                            <a class="ml-3 btn btn-outline-info" href="{{ route('eventplan.index') }}"
                                role="button">Create Event Plan</a>
                            @endIf
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-info">Add to Order</button>
                            <a class="ml-3 btn btn-outline-info" href="{{ route('compare.add',$product->id) }}"
                                role="button">Compare</a>
                            <a class="ml-3 pt-2" href="{{ route('wishlist.store',$product->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

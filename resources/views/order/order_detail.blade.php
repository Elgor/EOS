@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$order->product->name}}</li>
        </ol>
    </nav>
</div>
<!--Section: Block Content-->
<section class="mb-2 p-4 round-border bg-white shadow">
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="row">
                <div class="col-12 mb-0">
                    <figure class="text-center">
                        <img class="round-border" src="{{ asset('/storage/'.$order->product->image) }}"
                            class="img-fluid z-depth-1" style="max-height: 250px; max-width: 300px;">
                    </figure>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($order->product->imageList as $image)
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
            <h4 class="font-weight-bold">{{$order->product->name}}</h4>
            <p class="mb-2 text-muted">by <a
                    href="{{ route('seller.detail',$order->seller->id) }}">{{$order->seller->business_name}}</a></p>
            <div>
                <p class="mb-1 font-weight-bold">Description</p>
                <p>{{$order->product->description}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Features</p>
                <ul class="pl-4">
                    @foreach($order->product->features as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="row m-1">
                <div class="mr-5">
                    <p class="mb-1 font-weight-bold">Price</p>
                    <h5>Rp {{number_format($order->product->price,0,',','.')}}</h5>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Negotiation Price</p>
                    <h5>
                        @if($order->negotiation_price)
                        Rp
                        {{number_format($order->negotiation_price,0,',','.')}}
                        @else
                        No Negotiation
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container col-12 ">
    <div class="row">
        <section class="col-5 round-border p-2  bg-white shadow" style="height: fit-content">
            <h4 class="font-weight-bold">Event Plan</h4>
            <hr>
            <div>
                <p class="mb-1 font-weight-bold">Event Type</p>
                <p>{{$order->eventPlan->eventType}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Date</p>
                <p>{{date('d-m-Y', strtotime($order->eventPlan->date))}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Start Time</p>
                <p>{{date('H:i', strtotime($order->eventPlan->startTime))}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">End Time</p>
                <p>{{date('H:i', strtotime($order->eventPlan->endTime))}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Address</p>
                <p>{{$order->eventPlan->buildingAddress}}</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Description</p>
                <p style=" word-wrap: break-word; ">{{$order->eventPlan->description}}</p>
            </div>
        </section>
        <div class="col p-0 ml-2">
            <section class=" round-border p-2 mb-2 bg-white shadow" style="height: fit-content">
                <h4 class="font-weight-bold">Order Information</h4>
                <hr>
                <div>
                    <p class="mb-1 font-weight-bold">Status</p>
                    <p>{{$order->status}}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Order Date</p>
                    <p>{{date('d-m-Y', strtotime($order->date))}}</p>
                </div>
            </section>
            @if($order->transaction)
            <section class=" round-border p-2 bg-white shadow" style="height: fit-content">
                <h4 class="font-weight-bold">Transaction Detail</h4>
                <hr>
                <div>
                    <p class="mb-1 font-weight-bold">Invoice</p>
                    <p>{{$order->transaction->invoice}}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Transaction Date</p>
                    <p>{{date('d-m-Y, H:i:s', strtotime($order->transaction->updated_at))}}</p>

                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Name on Card</p>
                    <p>{{$order->transaction->name}}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Bank</p>
                    <p>{{$order->transaction->bank}}</p>
                </div>
            </section>
            @endif
        </div>
    </div>


    @endsection

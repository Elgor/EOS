@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $business_name }}</li>
        </ol>
    </nav>
</div>
<div class="col-10 mx-auto">
    <section class="mb-5 p-4 round-border ">
        <div class="row">
            <div class="col-md-6 text-center m-auto">
                <figure>
                    <img style="width: 75%; height: 75%;" class="round-border"
                        src="{{ asset('img/defaultProduct.jpg') }}">
                </figure>
            </div>
            <div class="col-md-6">
                <h4 class="font-weight-bold">{{ $business_name }}</h4>
                <div>
                    <p class="mb-1 font-weight-bold">City</p>
                    <p>{{ $city_id }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Address</p>
                    <p>{{ $address }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Phone Number</p>
                    <p>{{ $phone_number }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Description</p>
                    <p>{{ $description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="mb-1 font-weight-bold">Packages</p>
                <div class="row">
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item round-border">
                            <img src="{{ asset('img/defaultProduct.jpg') }}" class="img-fluid">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item round-border">
                            <img src="{{ asset('img/defaultProduct.jpg') }}" class="img-fluid">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item round-border">
                            <img src="{{ asset('img/defaultProduct.jpg') }}" class="img-fluid">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item round-border">
                            <img src="{{ asset('img/defaultProduct.jpg') }}" class="img-fluid">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-auto pt-3">
            <a class="btn btn-primary" href="{{ route('message.index') }}" role="button"> Message</a>
        </div>
    </section>
</div>

@endsection

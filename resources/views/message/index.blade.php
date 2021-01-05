@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller Name</li>
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
                <h4 class="font-weight-bold">Seller name</h4>
                <div>
                    <p class="mb-1 font-weight-bold">City</p>
                    <p>Jakarta Barat</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Address</p>
                    <p>Jl MH Thamrin Kav 28-30 Plaza Indonesia Lt 3 56</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Phone Number</p>
                    <p>021 3107201</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Description</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis suscipit incidunt voluptate
                        iure
                        earum soluta saepe sint beatae explicabo, perferendis ipsa doloremque ex maiores nisi doloribus
                        dolor error unde cum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="mb-1 font-weight-bold">Message</p>
                <form action="">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="Input Message" name="message"
                                rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row m-auto">
            <a class="btn btn-primary" href="" role="button">Send</a>
        </div>
    </section>
</div>

@endsection

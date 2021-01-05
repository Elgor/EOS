TODO:FIX THIS FUCKING PAGE
{{-- Belum ada connection product dan package --}}
@extends('layouts.app')
@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">

    <div class="card border-dark mb-3 col-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('img/defaultProduct.jpg') }}" class="card-img" alt="Card image cap">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{$name}}</h3>
                    <h5 class="card-title">by <a href="">{{$name}}</a></h5>
                    <h4 class="card-title">Description</h4>
                    <p class="card-text"><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Maxime, libero itaque cumque voluptas at natus illo, culpa voluptatum laborum pariatur
                            dicta sed dolorem mollitia sequi, magnam nostrum nisi asperiores. Suscipit?</small></p>
                    <h4 class="card-title">Features</h4>
                    <p class="card-text"><small class="text-muted">2 hours Photoshoot</small></p>
                    <p class="card-text"><small class="text-muted">Unlimited Shoot</small></p>
                    <p class="card-text"><small class="text-muted">Edit 20 Photos</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-10 mx-auto">
        <div class="col-sm-6">
            <div class="card border-dark">
                <div class="card-body">
                    <h5 class="card-title">Event Plan</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-dark">
                <div class="card-body">
                    <h5 class="card-title">Order Information</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

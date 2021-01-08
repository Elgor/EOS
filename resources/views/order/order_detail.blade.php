@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Package Name</li>
        </ol>
    </nav>
</div>
<!--Section: Block Content-->
<section class="mb-2 p-4 round-border">
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="row">
                <div class="col-12 mb-0">
                    <figure class="text-center">
                        <img class="round-border" src="{{ asset('img/defaultProduct.jpg') }}"
                            class="img-fluid z-depth-1">
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="font-weight-bold">Fantasy T-shirt</h4>
            <p class="mb-2 text-muted">by <a href="">Seller Name</a></p>
            <div>
                <p class="mb-1 font-weight-bold">Description</p>
                <p></p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Features</p>
                <ul class="pl-4">
                    <li>2 Hours Photoshoot</li>
                    <li>Unlimited Shoot</li>
                    <li>Edited 20 Photos</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container col-12">
    <div class="row">
        <section class="col-5 round-border p-2" style="height: fit-content">
            <h4 class="font-weight-bold">Event Plan</h4>
            <hr>
            <div>
                <p class="mb-1 font-weight-bold">Event Type</p>
                <p>asdasdas</p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Date</p>
                <p></p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Start Time</p>
                <p></p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">End Time</p>
                <p></p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Address</p>
                <p></p>
            </div>
            <div>
                <p class="mb-1 font-weight-bold">Description</p>
                <p></p>
            </div>
        </section>
        <div class="col p-0 ml-2">
            <section class=" round-border p-2 mb-2 " style="height: fit-content">
                <h4 class="font-weight-bold">Order Information</h4>
                <hr>
                <div>
                    <p class="mb-1 font-weight-bold">Order ID</p>
                    <p>asdasdasd</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Status</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Order Date</p>
                    <p></p>
                </div>
            </section>
            {{-- Klo bisa dapat informasi transaction, klo tdk di hapus --}}
            <section class=" round-border p-2 " style="height: fit-content">
                <h4 class="font-weight-bold">Transaction Detail</h4>
                <hr>
                <div>
                    <p class="mb-1 font-weight-bold">Invoice</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Transaction Date</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Bank</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Type</p>
                    <p></p>
                </div>
            </section>
        </div>
    </div>


    @endsection

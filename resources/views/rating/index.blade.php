@extends('layouts.app')
@section('title')
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        font-size: 3vw;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>
@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller Name</li>
        </ol>
    </nav>
</div>
<div class="col-10 mx-auto">
    <section class="mb-5 p-4 round-border ">
        <div class="row">
            <div class="col-md-4 text-center m-auto">
                <figure>
                    <img class="round-border" src="{{ asset('img/defaultProduct.jpg') }}">
                </figure>
            </div>
            <div class="col-md-8">
                <h4 class="font-weight-bold">Name</h4>
                <div>
                    <p class="mb-1 font-weight-bold">City</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Address</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Phone Number</p>
                    <p></p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Description</p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <h5 class="font-weight-bold">Rating</h5>
            <form action="">
                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">✯</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">✯</label> <input type="radio"
                        name="rating" value="3" id="3"><label for="3">✯</label> <input type="radio" name="rating"
                        value="2" id="2"><label for="2">✯</label> <input type="radio" name="rating" value="1"
                        id="1"><label for="1">✯</label>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

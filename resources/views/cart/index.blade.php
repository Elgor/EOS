@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>

    <h2>Cart</h2>
    @if ($cartItems->isEmpty()==false)
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Booking Date</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
            <tr>
                <td scope="row">{{ $cartItem->name }}</td>
                <td>Rp {{ number_format($cartItem->price,0,',','.') }}</td>
                <td>{{ $cartItem->attributes->date }}</td>
                <td><a href="{{ route('cart.destroy', $cartItem->id) }}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Price: Rp {{ number_format($totalPrice,0,',','.') }}</h3>

    <a class="btn btn-outline-success my-2 my-sm-0" href="#" role="button">Checkout</a>
    @else
    <h4>No Item</h4>
    @endif
</div>
@endsection

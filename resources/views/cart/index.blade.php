@extends('layouts.app')

@section('content')


<h2>Cart</h2>

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
            <td>{{ $cartItem->price }}</td>
            <td>{{ $cartItem->attributes->date }}</td>

            <td><a href="{{ route('cart.destroy', $cartItem->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>

    <h4 class="d-flex">CART</h4>
    <hr>
    {{-- @if ($cartItems->isEmpty()==false) --}}
    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Packages</th>
                <th>Price</th>
                <th>Nego Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($cartItems as $cartItem) --}}
            <tr>
                <td>Seller Name</td>
                <td><a style="color:#212529" href="route('product.detail',$cartItem->id)"> $cartItem->name</a>
                </td>
                <td>Rp number_format($cartItem->price,0,',','.')</td>
                <td>Rp number_format($cartItem->price,0,',','.')</td>
                <td><a class=" btn btn-danger" href=" route('cart.destroy', $cartItem->id)" role="button">
                        Delete</a>
                    <a class=" btn btn-info" href="" role="button">
                        Show</a>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    <a class="btn btn-success my-2 my-sm-0" href="{{ route('eventplan.index') }}" role="button">Save</a>
    {{-- @else
    <h4>No Item</h4>
    @endif --}}
</div>
@endsection

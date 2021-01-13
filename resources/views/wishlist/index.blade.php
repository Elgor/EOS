@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="d-flex">WISHLIST</h4>
    <hr>
    @if($wishlistItems->count() >0)
    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Packages</th>
                <th>Price</th>
                <th>City</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishlistItems as $item)
            <tr>
                <td>{{ $item->product->seller->business_name }}</td>
                <td><a href="{{ route('product.detail',$item->product->id) }}">{{ $item->product->name }}</a></td>
                <td>{{number_format($item->product->price,0,',','.')}}</td>
                <td>{{$item->product->seller->city->name}}</td>
                <td class="text-center">
                    <a class=" btn btn-danger" href="{{ route('wishlist.delete',$item->id) }}" role="button">
                        Delete</a>
                    <a class=" btn btn-success" href="{{ route('product.detail',$item->product->id) }}" role="button">
                        Add to Order</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    @else
    <h4>No Item</h4>
    @endif
</div>
@endsection
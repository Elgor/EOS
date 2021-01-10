@extends('layouts.app')

@section('content')

<div class="container">
    <h4 class="d-flex">WISHLIST</h4>
    <hr>
    {{-- @if () --}}
    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Packages</th>
                <th>Price</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($collection as $item) --}}
            <tr>
                <td>Seller Name</td>
                <td>Package Name</td>
                <td>Price</td>
                <td class="text-center">Category</td>
                <td class="text-center"><a class=" btn btn-danger" href="" role="button">
                        Delete</a>
                    <a class="btn btn-success" href="" role="button">
                        Add to Cart</a>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    <a class="btn btn-success my-2 my-sm-0" href="" role="button">Add All to Order</a>
    {{-- @else --}}
    {{-- <h4>No Item</h4> --}}
    {{-- @endif --}}
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex">ORDER</h4>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Packages</th>
                <th>Price</th>
                <th>Category</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($orderItems as $orderItem) --}}
            <tr>
                <td>Seller Name</td>
                <td><a style="color:#212529" href="">Name</a></td>
                <td>Rp Price</td>
                <td>Category</td>
                <td>Status</td>
                <td class="text-center">
                    {{-- @if() --}}
                    {{-- {{ route('order.show', 1) }} --}}
                    <a class=" btn btn-warning" href="" role="button">
                        View</a>
                    <a class=" btn btn-danger" href="" role="button">
                        Delete</a>
                    <a class=" btn btn-success" href="" role="button">
                        Pay</a>
                    {{-- @endif --}}
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection

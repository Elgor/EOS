@extends('layouts.seller')

@section('content')
<div class="container">
    <h4 class="d-flex">My ORDER</h4>
    <hr>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{session('message')}}
        </div>
    </div>
    @endif
    <table class="table">
        @if($orderItems->count() >0)
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Price</th>
                <th>Negotiation Price</th>
                <th>Status</th>
                <th class="text-center">Event Plan</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- 0->waiting
            1->Request
            2->Accepted
            3->Down Payment
            4->Full Payment
            5->Complete --}}
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{$orderItem->product->name}}</td>
                <td>{{$orderItem->product->price}}</td>
                <td class="font-weight-bold">{{number_format($orderItem->negotiation_price,0,',','.')??'-'}}</td>
                <td>{{$orderItem->status}}</td>
                <td class="text-center"><a class="btn btn-warning" href="" role="button">
                        View Event Plan</a></td>
                <td class="text-center">
                    <a class="btn btn-danger" href="" role="button">
                        Reject</a>
                    <a class="btn btn-success" href="" role="button">
                        Accept</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No Order</h4>
        @endif
    </table>
</div>
@endsection
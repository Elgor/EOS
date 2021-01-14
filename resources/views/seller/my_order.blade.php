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
                <th>Action</th>
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
                <td>Rp {{number_format($orderItem->product->price,0,',','.')??'-'}}</td>
                <td class="font-weight-bold">Rp {{number_format($orderItem->negotiation_price,0,',','.')??'-'}}</td>
                <td>{{$orderItem->status}}</td>
                <td class="text-center"><a href="{{ route('orders.show',$orderItem->id) }}" class="btn btn-warning"
                        role="button">
                        View Event Plan</a></td>
                <td>
                    <div class="row">
                        <form method="POST" action="{{route('orders.seller.reject', $orderItem->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Reject
                            </button>
                        </form>
                        <form method="POST" action="{{route('orders.seller.accept', $orderItem->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Accept
                            </button>
                        </form>
                    </div>
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
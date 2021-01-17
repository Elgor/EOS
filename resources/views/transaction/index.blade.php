@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex">TRANSACTION</h4>
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
    <table class="table table-bordered shadow-sm bg-white">
        @if($transactions->count() >0)
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Invoice</th>
                <th>Bank</th>
                <th>Type</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td><a href="{{ route('order.show', $transaction->order->id) }}">Link</a></td>
                <td>{{\Carbon\Carbon::parse( $transaction->updated_at)->format('l, j F H:i')}}</td>
                <td>{{ $transaction->invoice }}</td>
                <td>{{ $transaction->bank }}</td>
                <td>{{ $transaction->type }}</td>
                <td>
                    @if($transaction->type == "Down Payment")
                    Rp
                    {{number_format((float)($transaction->order->negotiation_price??$transaction->order->product->price)*0.3,0,',','.')}}
                    @elseif($transaction->type == "Full Payment")​​
                    Rp
                    {{number_format($transaction->order->negotiation_price??$transaction->order->product->price,0,',','.')}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No Transaction</h4>
        @endif
    </table>
</div>
@endsection

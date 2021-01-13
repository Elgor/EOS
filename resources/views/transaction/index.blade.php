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
    <table class="table">
        {{-- @if($orderItems->count() >0) --}}
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Bank</th>
                <th>Type</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($orderItems as $orderItem) --}}
            <tr>
                <td>Invoice</td>
                <td>Invoice</td>
                <td>Invoice</td>
                <td>Invoice</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        {{-- @else
        <h4>No Transaction</h4>
        @endif --}}
    </table>
</div>
@endsection
@extends('layouts.seller')

@section('content')
<div class="container p-0">
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
    <table class="table table-bordered">
        @if($orderItems->count() >0)
        <thead>
            <tr>
                <th class="text-center align-middle">Package Name</th>
                <th class="text-center align-middle">Price</th>
                <th class="text-center align-middle">Negotiation Price</th>
                <th class="text-center align-middle" style="width: 130px">Status</th>
                <th class="text-center align-middle">Confirm Payment</th>
                <th class="text-center align-middle">Event Plan</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{$orderItem->product->name}}</td>
                <td>Rp {{number_format($orderItem->product->price,0,',','.')??'-'}}</td>
                <td>
                    @if($orderItem->negotiation_price)
                    Rp
                    {{number_format($orderItem->negotiation_price,0,',','.')}}
                    @else
                    No Negotiation
                    @endif
                </td>
                <td>{{$orderItem->status}}</td>
                <td class="text-center">
                    @if($orderItem->status =='Down Payment'||$orderItem->status =='Full Payment')
                    @if($orderItem->status == 'Down Payment')
                    <input type="button" value="Down Payment" <?php if ($orderItem->status != 'Down Payment') { ?>
                        disabled <?php   } ?> class="btn btn-success" data-toggle="modal"
                        data-target="#dpModal{{$orderItem->id}}" />
                    @elseif($orderItem->status =='Full Payment')
                    <input type="button" value="Full Payment" <?php if ($orderItem->status != 'Full Payment') { ?>
                        disabled <?php   } ?> class="btn btn-success" data-toggle="modal"
                        data-target="#fullModal{{$orderItem->id}}" />
                    @endif
                    @elseif($orderItem->status =='Completed')
                    All Payment Completed
                    @else
                    No Payment
                    @endif
                </td>
                <td class="text-center"><a href="{{ route('orders.show',$orderItem->id) }}" class="btn btn-warning"
                        role="button">
                        View Event Plan</a></td>
                <td style="padding:19px">
                    <div class="row d-flex justify-content-around">
                        @if($orderItem->status == "Requested")
                        <form method="POST" action="{{route('orders.seller.reject', $orderItem->id)}}">
                            @csrf
                            <button type=" submit" class="btn btn-danger">
                                Reject
                            </button>
                        </form>
                        <form method="POST" action="{{route('orders.seller.accept', $orderItem->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Accept
                            </button>
                        </form>
                        @endif
                        <form method="POST" action="{{route('message.store')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Message
                            </button>
                            <input type="hidden" value="{{Auth::guard('seller')->id()}}" name="seller_id">
                            <input type="hidden" value="{{$orderItem->user->id}}" name="user_id">
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
<div class="modal fade" id="dpModal{{$orderItem->id}}" tabindex="-1" role="dialog"
    aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalCenterTitle">Confirm Down Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('orders.seller.acceptDownPayment', $orderItem->id)}}">
                @csrf
                <div class="modal-body text-center">
                    <p class="mb-1 font-weight-bold">Receipt</p>
                    <div>
                        <img class="round-border"
                            src="{{ asset('/storage/'.$orderItem->transaction->receipt_downPayment) }}" alt=""
                            style="max-height: 600px; max-width: 300px;">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="fullModal{{$orderItem->id}}" tabindex="-1" role="dialog"
    aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalCenterTitle">Confirm Full Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('orders.seller.acceptFullPayment', $orderItem->id)}}">
                @csrf
                <div class="modal-body text-center">
                    <p class="mb-1 font-weight-bold">Receipt</p>
                    <div>
                        <img class="round-border"
                            src="{{ asset('/storage/'.$orderItem->transaction->receipt_fullPayment) }}" alt=""
                            style="max-height: 600px; max-width: 300px;">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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
    <table class="table table-bordered shadow-sm bg-white">
        @if($orderItems->count() >0)
        <thead>
            <tr>
                <th class="text-center align-middle" rowspan="2">Package</th>
                <th class="text-center align-middle" rowspan="2">Customer</th>
                <th class="text-center align-middle" colspan="2">Price</th>
                <th class="text-center align-middle" style="width: 130px" rowspan="2">Status</th>
                <th class="text-center align-middle" colspan="2">Confirm Payment</th>
                <th class="text-center align-middle" rowspan="2">Event Plan</th>
                <th class="text-center align-middle" rowspan="2">Action</th>
            </tr>
            <tr>
                <th class="text-center align-middle">Normal</th>
                <th class="text-center align-middle">Negotiation</th>
                <th class="text-center align-middle">DP</th>
                <th class="text-center align-middle">Full</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{$orderItem->product->name}}</td>
                <td>{{$orderItem->user->name}}</td>
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
                    @if($orderItem->status =='Down Payment' || $orderItem->status =='Accepted Down Payment'||
                    $orderItem->status =='Full Payment'||$orderItem->status =='Completed')
                    <input type="button" value="Confirm" class="btn btn-success" data-toggle="modal"
                        data-target="#dpModal{{$orderItem->id}}" />
                    @else
                    No Payment
                    @endif
                </td>
                <td class="text-center">
                    @if($orderItem->status =='Full Payment' || $orderItem->status =='Completed' )
                    <input type="button" value="Confirm" class="btn btn-success" data-toggle="modal"
                        data-target="#fullModal{{$orderItem->id}}" />
                    @else
                    No Payment
                    @endif
                </td>
                <td class="text-center"><a href="{{ route('orders.show',$orderItem->id) }}" class="btn btn-warning"
                        role="button">
                        View</a></td>
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
                        <div class="modal-body text-center">
                            <p class="mb-1 font-weight-bold">Receipt</p>
                            @if($orderItem->transaction->receipt_downPayment)
                            <div>
                                <img class="round-border"
                                    src="{{ asset('/storage/'.$orderItem->transaction->receipt_downPayment) }}" alt=""
                                    style="max-height: 600px; max-width: 300px;">
                            </div>
                            @else
                            <p>No Payment</p>
                            @endif
                        </div>
                        <div class="modal-footer ">
                            @if($orderItem->status =='Down Payment')
                            {{-- <form method="POST" action="{{route('orders.seller.reject', $orderItem->id)}}">
                            @csrf
                            <button type=" submit" class="btn btn-danger">
                                Reject
                            </button>
                            </form> --}}
                            <form method="POST" action="{{route('orders.seller.acceptDownPayment', $orderItem->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Confirm
                                </button>
                            </form>
                            @endif
                        </div>
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
                        @csrf
                        <div class="modal-body text-center">
                            <p class="mb-1 font-weight-bold">Receipt</p>
                            @if($orderItem->transaction->receipt_fullPayment)
                            <div>
                                <img class="round-border"
                                    src="{{ asset('/storage/'.$orderItem->transaction->receipt_fullPayment) }}" alt=""
                                    style="max-height: 600px; max-width: 300px;">
                            </div>
                            @else
                            <p>No Payment</p>
                            @endif
                        </div>
                        <div class="modal-footer ">
                            @if($orderItem->status =='Full Payment')
                            {{-- <form method="POST" action="{{route('orders.seller.reject', $orderItem->id)}}">
                            @csrf
                            <button type=" submit" class="btn btn-danger">
                                Reject
                            </button>
                            </form> --}}
                            <form method="POST" action="{{route('orders.seller.acceptFullPayment', $orderItem->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Confirm
                                </button>
                            </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
        @else
        <h4>No Order</h4>
        @endif
    </table>
</div>

<script>
    $('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});
</script>
@endsection

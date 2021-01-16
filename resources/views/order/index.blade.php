@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h4 class="d-flex">ORDER</h4>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center align-middle">Seller</th>
                <th class="text-center align-middle">Packages</th>
                <th class="text-center align-middle">Price</th>
                {{-- <th class="text-center align-middle">Negotiation Price</th> --}}
                <th class="text-center align-middle">Status</th>
                <th class="text-center align-middle">Down Payment</th>
                <th class="text-center align-middle">Full Payment</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead>
        @if($orderItems->count() >0)
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td><a style=" color:#212529"
                        href="{{ route('seller.detail',$orderItem->seller->id) }}">{{$orderItem->seller->business_name}}</a>
                </td>
                <td><a style=" color:#212529" href="{{ route('product.detail',$orderItem->product->id) }}">
                        {{$orderItem->product->name}}</a>
                </td>
                <td>Rp {{number_format($orderItem->negotiation_price??$orderItem->product->price,0,',','.')}}</td>
                <td>{{$orderItem->status}}</td>
                <td class="text-center">
                    <input type="button" value="Pay" <?php if ($orderItem->status != 'Accepted') { ?> disabled
                        <?php   } ?> class="btn btn-success" data-toggle="modal"
                        data-target="#dpModal{{$orderItem->id}}" />
                </td>
                <td class="text-center">
                    <input type="button" value="Pay"
                        <?php if ($orderItem->status != 'Accepted' && $orderItem->status != 'Accepted Down Payment') { ?>
                        disabled <?php   } ?> class="btn btn-success" data-toggle="modal"
                        data-target="#fpModal{{$orderItem->id}}" />
                </td>
                <td>
                    <div class="row p-3 d-flwx justify-content-around">
                        <a class="btn btn-warning" href="{{ route('order.show',$orderItem->id) }}" role="button">
                            View</a>
                        @if($orderItem->status == 'Waiting' || $orderItem->status == 'Rejected' )
                        <a class="btn btn-danger" href="{{route('order.delete', $orderItem->id) }}" role="button">
                            Delete</a>
                        @endif
                        @if($orderItem->status == 'Completed')
                        <a class="btn btn-success" href="{{ url('/rating/'.$orderItem->seller_id.'/'.$orderItem->id) }}"
                            role="button">
                            Rate</a>
                        @endif
                        <form method="POST" action="{{route('message.store')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Message
                            </button>
                            <input type="hidden" value="{{$orderItem->seller->id}}" name="seller_id">
                            <input type="hidden" value="{{Auth::id()}}" name="user_id">
                        </form>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="dpModal{{$orderItem->id}}" tabindex="-1" role="dialog"
                aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form class="form" method="POST"
                            action="{{url('/transaction/'. $orderItem->id . '/Down Payment')}}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalCenterTitle">Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <p>No Rekening</p>
                                <h1 class="text-center">{{ $orderItem->seller->no_rekening }}</h1>
                                <h4>
                                    @if(!is_null($orderItem->negotiation_price))
                                    Rp {{number_format((float)($orderItem->negotiation_price*0.3),0,',','.')}}
                                    @else
                                    Rp {{number_format((float)($orderItem->product->price*0.3),0,',','.')}}
                                    @endif
                                    (30%)
                                </h4>
                                <hr>

                                <div class="form-group mb-3">
                                    <label class="text-md-right pr-1" for="">Bank</label>
                                    <select class="form-control" name="bank">
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Mandiri">Mandiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-md-right pr-1" for="">Name on Card</label>
                                    <div>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-md-right pr-1">Upload Receipt</label>
                                    <input type="file" name="image" class="form-control p-1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Pay</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="fpModal{{$orderItem->id}}" tabindex="-1" role="dialog"
                aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalCenterTitle">Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form" method="POST"
                            action="{{url('/transaction/' . $orderItem->id .'/Full Payment')}} "
                            enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <p>Account Number</p>
                                <h1 class="text-center">{{ $orderItem->seller->no_rekening }}</h1>
                                <h4>
                                    @if($orderItem->status == 'Accepted Down Payment')
                                    Rp
                                    {{number_format(((float)($orderItem->negotiation_price??$orderItem->product->price)-($orderItem->negotiation_price??$orderItem->product->price)*0.3),0,',','.')}}
                                    @else
                                    Rp
                                    {{number_format($orderItem->negotiation_price??$orderItem->product->price,0,',','.')}}
                                    @endif
                                </h4>
                                <hr>

                                <div class="form-group mb-3">
                                    <label class="text-md-right pr-1" for="">Bank</label>
                                    <select class="form-control" name="bank">
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Mandiri">Mandiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-md-right pr-1" for="">Name on Card</label>
                                    <div>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-md-right pr-1">Upload Receipt</label>
                                    <input type="file" name="image" class="form-control p-1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
        @else
        <h4>No Order</h4>
        @endif
    </table>
    <form method="POST" action="{{route('order.request', Auth::user()->id) }}">
        @csrf
        <button type="submit" class="btn btn-warning">
            Send All Request Order
        </button>
    </form>
</div>
@endsection

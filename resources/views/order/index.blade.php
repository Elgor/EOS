@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex">ORDER</h4>
    <hr>
    @if(session('message'))
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{session('message')}}
        </div>
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Packages</th>
                <th>Price</th>
                <th>Negotiation Price</th>
                <th>Status</th>
                <th class="text-center">Down Payment</th>
                <th class="text-center">Full Payment</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @if($orderItems->count() >0)
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{$orderItem->seller->business_name}}</td>
                <td><a style="color:#212529" href="">{{$orderItem->product->name}}</a></td>
                <td>Rp {{number_format($orderItem->product->price,0,',','.')}}</td>
                <td>
                    @if(!is_null($orderItem->negotiation_price))
                    Rp {{number_format($orderItem->negotiation_price,0,',','.')}}
                    @endif  
                </td>
                <td>{{$orderItem->status}}</td>
                <td class="text-center">
                    {{-- <input type="button" value="Pay" <?php if ($orderItem->status != 'Accepted') { ?> disabled
                        <?php   } ?> class="btn btn-success" data-toggle="modal" data-target="#dpModal" /> --}}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dpModal">
                        Pay
                    </button>
                </td>
                <td class="text-center">
                    {{-- <input type="button" value="Pay" <?php if ($orderItem->status != 'Down Payment') { ?> disabled
                        <?php   } ?> class="btn btn-success" data-toggle="modal" data-target="#fpModal" /> --}}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fpModal">
                        Pay
                    </button>
                </td>
                <td class="text-center">
                    <a class="btn btn-warning" href="{{ route('order.show',$orderItem->id) }}" role="button">
                        View</a>
                    @if($orderItem->status != 'Accepted')
                    <a class="btn btn-danger" href="{{route('order.delete', $orderItem->id) }}" role="button">
                        Delete</a>
                    @endif
                    {{-- <input type="button" value="Rate" <?php if ($orderItem->status != 'Completed') { ?> disabled
                        <?php   } ?> class="btn btn-success" href="{{ route('rating.index',$orderItem->seller_id) }}"
                    /> --}}
                    <a class="btn btn-success" href="{{ route('rating.index',$orderItem->seller_id) }}" role="button">
                        Rate</a>
                </td>
            </tr>
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

<div class="modal fade" id="dpModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalCenterTitle">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="text-center">NOMOR REKENING</h1>
                <p>RP. Harga DP</p>
                <hr>
                <form class="form" method="POST">
                    <div class="form-group mb-3">
                        <label class="text-md-right pr-1" for="">Bank</label>
                        <select class="form-control">
                            <option>BRI</option>
                            <option>BCA</option>
                            <option>Mandiri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-md-right pr-1" for="">Name on Card</label>
                        <div>
                            <input name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-md-right pr-1">Upload Receipt</label>
                        <input type="file" class="form-control p-1" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Pay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fpModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalCenterTitle">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="text-center">NOMOR REKENING</h1>
                <p>RP. Harga Full</p>
                <hr>
                <form class="form" method="POST">
                    <div class="form-group mb-3">
                        <label class="text-md-right pr-1" for="">Bank</label>
                        <select class="form-control">
                            <option>BRI</option>
                            <option>BCA</option>
                            <option>Mandiri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-md-right pr-1" for="">Name on Card</label>
                        <div>
                            <input name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-md-right pr-1">Upload Receipt</label>
                        <input type="file" class="form-control p-1" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Pay</button>
            </div>
        </div>
    </div>
</div>
@endsection
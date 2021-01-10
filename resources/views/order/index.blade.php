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
                <th>Negotiation Price</th>
                <th>Status</th>
                <th class="text-center">Down Payment</th>
                <th class="text-center">Full Payment</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($orderItems as $orderItem) --}}
            {{-- 0->waiting
            1->Request
            2->Accept
            3->Down Payment
            4->Full Payment
            5->Complete --}}
            <tr>
                <td>Seller Name</td>
                <td><a style="color:#212529" href="">Name</a></td>
                <td>Rp Price</td>
                <td>Category</td>
                <td>Status</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dpModal">
                        Pay
                    </button></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fpModal">
                        Pay
                    </button></td>
                <td class="text-center">
                    {{-- @if() --}}
                    {{-- {{ route('order.show', 1) }} --}}
                    <a class="btn btn-warning" href="{{ route('order.show') }}" role="button">
                        View</a>
                    <a class="btn btn-danger" href="" role="button">
                        Delete</a>
                    <a class="btn btn-success" href="{{ route('rating.index') }}" role="button">
                        Rate</a>
                    {{-- @endif --}}
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>

<div class="modal fade" id="dpModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle"
    aria-hidden="true">
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

<div class="modal fade" id="fpModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle"
    aria-hidden="true">
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

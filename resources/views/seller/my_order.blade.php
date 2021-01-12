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
            2->Accept
            3->Down Payment
            4->Full Payment
            5->Complete --}}
            <tr>
                <td>Name</td>
                <td>Rp Price</td>
                <td>Rp Price</td>
                <td>Status</td>
                <td class="text-center"><a class="btn btn-warning" href="" role="button">
                        View Event Plan</a></td>
                <td class="text-center">
                    <a class="btn btn-danger" href="" role="button">
                        Reject</a>
                    <a class="btn btn-success" href="" role="button">
                        Accept</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
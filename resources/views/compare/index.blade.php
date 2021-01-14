@extends('layouts.app')
@section('title')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection
@section('content')

<div class="container">

    <h4 class="d-flex">COMPARE</h4>
    <hr>
    @if(session('compare'))
    <table class="table table-bordered sm-header">
        <tbody>
            <tr>
                <th style="border:solid Transparent!important; border-width: 1px 0 0px 1px"></th>
                @foreach (session('compare') as $id => $details)
                <td style="border:solid Transparent!important; border-width: 1px 0 0px 1px" class="text-center">
                    <a href="{{ asset('/storage/'.$details['image']) }}" data-lightbox="photos">
                        <img src="{{ asset('/storage/'.$details['image']) }}" style="height:200px; width:200px">
                    </a>
                </td>
                @endforeach

            </tr>
            <tr>
                <th class="th-borderless" scope="row">Package Name</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center"><a href="{{ route('product.detail',$id) }}">{{ $details['name'] }}</a></td>
                @endforeach
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Seller Name</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center"><a
                        href="{{ route('seller.detail', $details['seller_id']) }}">{{ $details['seller_name'] }}
                    </a>
                </td>
                @endforeach
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Price</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center">Rp {{number_format($details['price'] ,0,',','.')}}</td>
                @endforeach
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Feature</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center">
                    @foreach($details['feature'] as $feature)
                    <li style="list-style-type:none;">{{ $feature }}</li>
                    @endforeach
                </td>
                @endforeach
            </tr>
            <tr>
                <th class=" th-borderless" scope="row">City</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center">{{ $details['city'] }}</td>
                @endforeach
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Seller Rating</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center">
                    <div>
                        <p class="d-inline font-weight-bold" style="font-size: 18px;">
                            {{ number_format((float) $details['rating'],1,'.','') }}
                        </p>
                        <p class="d-inline font-weight-bold" style="font-size: 18px;">/ 5.0 <i
                                class="text-warning fa fa-star" style="font-size: 1.5rem;"></i></p>
                    </div>
                </td>
                @endforeach
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Completed Transaction</th>
                {{-- @foreach (session('compare') as $id) --}}
                <td class="text-center"></td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless align-middle" scope="row">Action</th>
                @foreach (session('compare') as $id => $details)
                <td class="text-center">
                    <div>
                        <a class="btn btn-danger" href="{{ route('compare.remove',$details['product_id']) }}"
                            role="button">
                            Delete</a>
                        <a class="btn btn-success" href="{{ route('product.detail',$details['product_id']) }}"
                            role="button">
                            Add to Order</a>
                    </div>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    @else
    <h4>Add product to compare</h4>
    @endif
</div>
@endsection

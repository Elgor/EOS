@extends('layouts.seller')

@section('title')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection

@section('content')
<div class="container">
    <h4 class="d-flex">RATINGS</h4>
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
        @if($ratings->count() >0)
        <thead>
            <tr>
                <th class="text-center align-middle">Date</th>
                <th style="max-width: 50px" class="text-center align-middle">Customer</th>
                <th style="max-width: 50px" class="text-center align-middle">Rating</th>
                <th class="text-center align-middle">Review</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $rating)
            <tr>
                <td class="text-center align-middle" style="max-width: 70px">
                    {{\Carbon\Carbon::parse( $rating->created_at)->format('l, j F H:i')}}
                </td>
                <td>{{$rating->user->name }}</td>
                <td class="text-center align-middle"> <i class="text-warning fa fa-star"
                        style="font-size: 1.5rem;"></i>{{$rating->rating}}</td>
                <td class="align-middle">{{$rating->comment}}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No Rating</h4>
        @endif
    </table>
</div>
@endsection

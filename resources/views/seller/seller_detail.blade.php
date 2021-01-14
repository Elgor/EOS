@extends('layouts.app')
@section('title')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/seller') }}">Seller</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $seller->business_name }}</li>
        </ol>
    </nav>
</div>
<div class="col-10 mx-auto">
    <section class="mb-5 p-4 round-border ">
        <div class="row">
            <div class="col-md-6 text-center m-auto">
                <figure>
                    <img style="width: 75%; height: 75%;" class="round-border"
                        src="{{ asset('/storage/'.$seller->profile_picture)}}">
                </figure>
            </div>
            <div class="col-md-6">
                <div class="row col-12">
                    <h4 class="font-weight-bold">{{ $seller->business_name }}</h4>
                    <div class="ml-auto">
                    <form method="POST" action="{{route('message.store')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Message
                            </button>
                            <input type="hidden" value="{{$seller->id}}" name="seller_id">
                            <input type="hidden" value="{{Auth::id()}}" name="user_id">
                        </form>
                    </div>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">City</p>
                    <p>{{ $seller->city['name'] }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Address</p>
                    <p>{{ $seller->address }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Phone Number</p>
                    <p>{{ $seller->phone_number }}</p>
                </div>
                <div>
                    <p class="mb-1 font-weight-bold">Description</p>
                    <p>{{ $seller->description }}</p>
                </div>
            </div>
        </div>
        <div class="border round-border p-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="true">Reviews</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="package-tab" data-toggle="tab" href="#package" role="tab"
                        aria-controls="package" aria-selected="false">Packages</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row col-12 my-5 mx-auto">
                        <div class="col-4">
                            <div class="my-5 mx-5">
                                <p class="d-inline p-1 font-weight-bold" style="font-size: 36px;">
                                    {{ number_format((float)$seller->final_rating,1,'.','') }}
                                </p>
                                <p class="d-inline p-1 font-weight-bold" style="font-size: 18px;">/ 5.0 <i
                                        class="text-warning fa fa-star" style="font-size: 1.5rem;"></i></p>
                            </div>
                        </div>
                        <div class="col-8">

                            <div class="row">
                                <div class="col-2">
                                    <p class="font-weight-bold">5 <i class="text-warning fa fa-star"
                                            style="font-size: 1rem;"></i></p>
                                </div>
                                <div class="col-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$star5/$starAll*100}}%;"
                                            aria-valuenow="{{$star5/$starAll*100}}" aria-valuemin="0"
                                            aria-valuemax="100">{{$star5}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <p class="font-weight-bold">4 <i class="text-warning fa fa-star"
                                            style="font-size: 1rem;"></i></p>
                                </div>
                                <div class="col-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$star4/$starAll*100}}%;"
                                            aria-valuenow="{{$star4/$starAll*100}}" aria-valuemin="0"
                                            aria-valuemax="100">{{$star4}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <p class="font-weight-bold">3 <i class="text-warning fa fa-star"
                                            style="font-size: 1rem;"></i></p>
                                </div>
                                <div class="col-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$star3/$starAll*100}}%;"
                                            aria-valuenow="{{$star3/$starAll*100}}" aria-valuemin="0"
                                            aria-valuemax="100">{{$star3}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <p class="font-weight-bold">2 <i class="text-warning fa fa-star"
                                            style="font-size: 1rem;"></i></p>
                                </div>
                                <div class="col-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$star2/$starAll*100}}%;"
                                            aria-valuenow="{{$star2/$starAll*100}}" aria-valuemin="0"
                                            aria-valuemax="100">{{$star2}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <p class="font-weight-bold">1 <i class="text-warning fa fa-star"
                                            style="font-size: 1rem;"></i></p>
                                </div>
                                <div class="col-10">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$star1/$starAll*100}}%;"
                                            aria-valuenow="{{$star1/$starAll*100}}" aria-valuemin="0"
                                            aria-valuemax="100">{{$star1}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <h6>{{$reviews}} Reviews</h6>
                            </div>
                        </div>
                    </div>
                    <div class="my-5 mx-auto">
                        @forelse($comments as $comment)
                        <div class="card col-8 mx-auto mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{asset('/storage/'.$comment->user->image)}}"
                                            class="img img-rounded img-fluid" />
                                        <p class="text-secondary text-center" style="font-size: 10px;">Review At :
                                            {{$comment->created_at}}
                                        </p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left"><strong>{{$comment->user->name}}</strong></a>
                                            @for($i=0; $i<$comment->rating; $i++)
                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                @endfor

                                        </p>
                                        <div class="clearfix"></div>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="d-flex justify-content-center">
                            <h2>No Review</h2>
                        </div>

                        @endforelse
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                {!!$comments->render()!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-tab">
                    <div class="row my-5 mx-auto">
                        <div class="col-sm-12">
                            <div class="row">
                                @forelse($seller->product as $package)
                                <div class="col-4 d-flex" style="min-height: 300px">
                                    <div class="card mb-4">
                                        <a href="{{ route('product.detail',$package->id) }}"><img class="card-img-top"
                                                style="height: 200px;" src="{{ asset('/storage/'.$package->image)}}"
                                                alt="Card image cap"></a>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5 class="text-center">{{ $package->name }}</h5>
                                            </div>
                                            <h6 class="card-text font-weight-bold text-center">Rp
                                                {{ number_format($package->price,0,',','.') }}
                                            </h6>
                                        </div>


                                    </div>
                                </div>
                                @empty
                                <div class="d-flex justify-content-center">
                                    <h4>No Package</h4>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@extends('layouts.app')
@section('title')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection

@section('content')

<div class="container">
    <div class="d-flex flex-row-reverse mr-3">
        <form class="form-inline" action="{{ route('seller-search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-md-0" type="submit">Search</button>
        </form>
    </div>
    <div class="d-flex flex-row-reverse m-3 justify-content-between">
        <form class="form-inline" action="{{ route('seller.filter') }}" method="GET">
            <div class="form-group mr-sm-4">
                <label class="form-group mr-2" for="rating">Rating</label>
                <select style="width:150px" class="form-control" id="rating" name="rating">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div class="form-group mr-sm-4">
                <label class="form-group mr-2" for="city">City</label>
                <select style="width:150px" class="form-control" id="city" name="city">
                    <option value="%">Any</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Depok">Depok</option>
                </select>
            </div>
            <div class="form-group mr-sm-2">
                <label class="form-group mr-2" for="city">Category</label>
                <select style="width:150px" class="form-control" id="category" name="category">
                    <option value="%">Any</option>
                    <option value="Event Organizer">Event Organizer</option>
                    <option value="Catering">Catering</option>
                    <option value="MC">MC</option>
                    <option value="Sound System">Sound System</option>
                    <option value="Entertainment">Entertainment</option>
                </select>
            </div>
            <button class="btn btn-outline-success mt-2 mt-md-0" type="submit">Filter</button>
        </form>
    </div>
    <h4 class="d-flex">SELLER</h4>
    <hr>
    <div class="row">
        @if ($sellers->isEmpty()==false)
        @foreach ($sellers as $seller)
        <div class="col-3 d-flex p-2">

            <div class="card mb-4" style="height: 450px">
                <a href="{{route('seller.detail',$seller->id)}}"><img class="card-img-top"
                        style="width: 100%; height:210px" src="{{ asset('/storage/'.$seller->profile_picture) }}"
                        alt="Card image cap"></a>
                <div class="card-body pb-0">
                    <div class="card-title">
                        <h4>{{ $seller->business_name }}</h4>
                        <div class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            {{ $seller->city }}
                        </div>
                    </div>
                    <div class="card-text ">
                        <p>{{ \Illuminate\Support\Str::limit($seller->description, 90, $end='...') }}</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <!-- <span class="float-left pr-2"><i class="text-warning fa fa-star"
                            style="font-size: 20px;"></i></span>{{ $seller->final_rating }} -->
                    <div class="">
                        <p class="d-inline font-weight-bold" style="font-size: 18px;">
                            {{ number_format((float)$seller->final_rating,1,'.','') }}
                        </p>
                        <p class="d-inline font-weight-bold" style="font-size: 18px;">/ 5.0 <i
                                class="text-warning fa fa-star" style="font-size: 1.5rem;"></i></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="p-3">No Seller</h4>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $sellers->links() }}

    </div>
</div>
@endsection

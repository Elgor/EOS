@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex flex-row-reverse mr-3">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-md-0" type="submit">Search</button>
        </form>
    </div>
    <div class="d-flex flex-row-reverse m-3 justify-content-between">
        <form class="form-inline">
            <div class="form-group mr-sm-4">
                <label class="form-group mr-2" for="price">Rating</label>
                <select style="width:150px" class="form-control" id="price" name="price">
                    <option>All</option>
                </select>
            </div>
            <div class="form-group mr-sm-4">
                <label class="form-group mr-2" for="city">City</label>
                <select style="width:150px" class="form-control" id="city" name="city">
                    <option>All</option>
                </select>
            </div>
            <div class="form-group mr-sm-2">
                <label class="form-group mr-2" for="city">Category</label>
                <select style="width:150px" class="form-control" id="city" name="city">
                    <option>All</option>
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
                <a href=""><img class="card-img-top" style="width: 100%; height:210px"
                        src="{{ asset('img/defaultProduct.jpg') }}" alt="Card image cap"></a>
                <div class="card-body pb-0">
                    <div class="card-title">
                        <h4>{{ $seller->name }}</h4>
                        <div class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg> Seller Location
                        </div>
                    </div>
                    <div class="card-text ">
                        <p>{{ \Illuminate\Support\Str::limit($seller->description, 90, $end='...') }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    Seller Rating
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="p-4">No Seller</h4>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $sellers->links() }}

    </div>
</div>
@endsection

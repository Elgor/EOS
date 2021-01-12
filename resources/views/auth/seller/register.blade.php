@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seller Register') }}</div>

                <div class="card-body">
                    <!-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> -->
                    <form method="POST" action='{{ route("register.seller") }}' aria-label="{{ __('Register') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="business_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="business_name" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control" name="category_id"
                                    aria-label="Default select example">
                                    <option>Select category</option>
                                    <option value="1">Event Organizer</option>
                                    <option value="2">Hall</option>
                                    <option value="3">MC</option>
                                    <option value="4">Food</option>
                                    <option value="5">Entertainment</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control" name="city_id"
                                    aria-label="Default select example">
                                    <option>Select city</option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Tanggerang</option>
                                    <option value="3">Bekasi</option>
                                    <option value="4">Bogor</option>
                                    <option value="5">Depok</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" placeholder="Address" name="address" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" placeholder="Description" name="description"
                                    rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" class="form-control" name="phone_number">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6 ml-3">
                                <input type="file" class="custom-file-input" name="profile_picture">
                                <label class="custom-file-label" for="image">Browse</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
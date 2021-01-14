@extends('layouts.app')
@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">

  <div class="card mb-3 col-10 mx-auto border-0">
    <div class="row no-gutters">
      <div class="col-md-4 ">
        <h3 class="ml-3 mt-3">PROFILE</h3>
        <div class="h-45 w-75 ">
          <img src="{{ asset('storage/'.$customer->image) }}" class="card-img border border-dark rounded-circle mt-3" height="100%" width="100%" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input disabled id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $customer->name}}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!-- <div class="form-group row">
              <label for="city" class="col-md-4 col-form-label ">{{ __('City') }}</label>

              <div class="col-md-6">
                <select class="form-select form-control" name="city" aria-label="Default select example">
                  <option selected>Select city</option>
                  <option value="Jakarta">Jakarta</option>
                  <option value="Tanggerang">Tanggerang</option>
                  <option value="Bekasi">Bekasi</option>
                  <option value="Bogor">Bogor</option>
                  <option value="Depok">Depok</option>
                </select>
              </div>
            </div> -->

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-4 col-form-label ">{{ __('Phone Number') }}</label>

              <div class="col-md-6">
                <input disabled id="phone_number" class="form-control" name="phone_number" value="{{$customer->phone_number}}">
              </div>
            </div>

            <div class="form-group row">
              <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
              <label class="col-md-4 col-form-label ">{{ __('Address') }}</label>

              <div class="col-md-6">
                <textarea disabled class="form-control" placeholder="Address" name="address" rows="3">{{$customer->address}}</textarea>
              </div>
            </div>

            <!-- <div class="form-group row">
              <label class="col-md-4 col-form-label ">{{ __('Profile Picture') }}</label>

              <div class="col-md-6 ml-3">
                <input type="file" class="custom-file-input" name="image">
                <label class="custom-file-label" for="image">Browse</label>
              </div>
            </div> -->



            <div class="form-group row mt-5 mb-0">
              <div class="col-md-6 offset-md-4">
                <!-- <button type="submit" class="btn btn-primary w-50">
                  {{ __('Save') }}
                </button> -->
                <a class="btn btn-primary w-50" href="{{ route('customer.edit',Auth::user()->id) }}" role="button">
                  Edit Profile</a>
              </div>

            </div>



          </form>

        </div>
      </div>
    </div>
  </div>



</div>
@endsection
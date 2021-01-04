@extends('layouts.app')
@section('title')
<style>
  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
  }

  .rating>input {
    display: none
  }

  .rating>label {
    position: relative;
    width: 1em;
    font-size: 6vw;
    color: #FFD600;
    cursor: pointer
  }

  .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
  }

  .rating>label:hover:before,
  .rating>label:hover~label:before {
    opacity: 1 !important
  }

  .rating>input:checked~label:before {
    opacity: 1
  }

  .rating:hover>input:checked~label:before {
    opacity: 0.4
  }

  /* body {
    background: #222225;
    color: white
}

h1,
p {
    text-align: center
}

h1 {
    margin-top: 150px
}

p {
    font-size: 1.2rem
} */

  @media only screen and (max-width: 600px) {
    /* h1 {
        font-size: 14px
    }

    p {
        font-size: 12px
    } */
  }
</style>
@endsection
@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">

  <div class="card mb-3 col-10 mx-auto border-0">
    <div class="row no-gutters">
      <div class="col-md-4">
        <div class="mt-4">
          <img src="{{  asset('img/defaultProduct.jpg') }}" class="card-img border border-dark rounded" height="100%" width="100%" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">{{$business_name}}</h3>
          <h4 class="card-title">City</h4>
          <p class="card-text"><small class="text-muted">{{$city}}</small></p>
          <h4 class="card-title">Address</h4>
          <p class="card-text"><small class="text-muted">{{$address}}</small></p>
          <h4 class="card-title">Phone Number</h4>
          <p class="card-text"><small class="text-muted">0812345678</small></p>
          <h4 class="card-title">Description</h4>
          <p class="card-text"><small class="text-muted">{{$description}}</small></p>
         
          <h1 class="text-center mt-3">Star Rating </h1>
          <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
@endsection
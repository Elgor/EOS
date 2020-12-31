@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/cart') }}">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Plan</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4>EVENT PLAN</h4>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label" for="eventType">Event
                                Type</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option>Default select</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label" for="date">Date</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" placeholder="Input date">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label" for="startTime">Start
                                Time</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Input start time">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label" for="endTime">End
                                Time</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Input end time">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label" for="city">City</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option>Default select</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="Building Adress">Building
                                Adress</label>
                            <div class="col-md-7">
                                <textarea class="form-control" placeholder="Address" name="buildingAddress"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label class="col-md-3 col-form-label text-md-right control-label"
                                for="inputAddress">Description</label>
                            <div class="col-md-7">
                                <textarea class="form-control" placeholder="Address" name="description"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    Send
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

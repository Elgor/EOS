@extends('layouts.app')

@section('content')
<div class="container">
    <h4>EVENT PLAN</h4>
    <hr>
    {{-- @if ($cartItems->isEmpty()==false) --}}
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($cartItems as $cartItem) --}}
            <tr>
                <td>Event Plan Name</td>
                <td>type</td>
                <td>Date</td>
                <td>Time</td>
                <td>Time</td>
                <td><a class=" btn btn-danger" href=" route('cart.destroy', $cartItem->id)" role="button">
                        Delete</a>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    <div class="row ">
        <div class="col-md-10">
            <form>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="eventName">Event
                        Name</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="eventName">
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="eventType">Event
                        Type</label>
                    <div class="col-md-4">
                        <select class="form-control" name="eventType">
                            <option selected>Select event type</option>
                            <option value="Business">Business</option>
                            <option value="Pentas Seni">Pentas Seni</option>
                            <option value="Inagurasi">Inagurasi</option>
                            <option value="Birthday Party">Birthday Party</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="date">Date</label>
                    <div class="col-md-4">
                        <input class="form-control" type="date" name='date'>
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="startTime">Start
                        Time</label>
                    <div class="col-md-4">
                        <input class="form-control" type="time" name="startTime">
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="endTime">End
                        Time</label>
                    <div class="col-md-4">
                        <input class="form-control" type="time" name="endTime">
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="city">City</label>
                    <div class="col-md-4">
                        <select class="form-control" name="city">
                            <option selected>Select city</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Tanggerang">Tanggerang</option>
                            <option value="Bekasi">Bekasi</option>
                            <option value="Bogor">Bogor</option>
                            <option value="Depok">Depok</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-left" for="Building Adress">Building
                        Adress</label>
                    <div class="col-md-7">
                        <textarea class="form-control" placeholder="Address" name="buildingAddress" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label"
                        for="inputAddress">Description</label>
                    <div class="col-md-7">
                        <textarea class="form-control" placeholder="Description" name="description" rows="3"></textarea>
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

@endsection

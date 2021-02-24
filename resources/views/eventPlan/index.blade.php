@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<div class="container">
    <h4>EVENT PLAN</h4>
    <hr>
    <table class="table table-bordered shadow-sm bg-white">
        @if($eventPlans->count()>0)
        <thead>
            <tr>
                <th class="text-center align-middle">Name</th>
                <th class="text-center align-middle">Type</th>
                <th class="text-center align-middle">Date</th>
                <th class="text-center align-middle">Start Time</th>
                <th class="text-center align-middle">End Time</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventPlans as $eventPlan)

            <tr>
                <td>{{ $eventPlan->eventName }}</td>
                <td>{{ $eventPlan->eventType }}</td>
                <td>{{ date('d-m-Y', strtotime($eventPlan->date)) }}</td>
                <td>{{ date('H:i',strtotime($eventPlan->startTime)) }}</td>
                <td>{{ date('H:i',strtotime($eventPlan->endTime)) }}</td>
                <td class="text-center align-middle">
                    <!-- <a class=" btn btn-danger"
                        href="{{ route('eventPlan.delete',$eventPlan->id) }}" role="button">
                        Delete</a> -->
                    <form action="{{ route('eventPlan.delete',$eventPlan->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="Delete" class=" btn btn-danger" <?php if ($eventPlan->orders->count() > 0) { ?> disabled <?php   } ?> />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <h4>No EventPlan</h4>
        @endif
    </table>
    <hr>
    <h4>Create Event Plan</h4>
    <div class="row ">
        <div class="col-md-10">
            <form method="POST" action="{{route('eventplan.store')}}">
                @csrf
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="eventName">Event
                        Name</label>
                    <div class="col-md-4">
                        <input class="form-control @error('eventName') is-invalid @enderror" type="text" name="eventName" required>
                        @error('eventName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="eventType">Event
                        Type</label>
                    <div class="col-md-4">
                        <select class="form-control @error('eventType') is-invalid @enderror" name="eventType" required>
                            <option value="">Select event type</option>
                            <option value="Business">Business</option>
                            <option value="Pentas Seni">Pentas Seni</option>
                            <option value="Inagurasi">Inagurasi</option>
                            <option value="Birthday Party">Birthday Party</option>
                        </select>
                        @error('eventType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="date">Date</label>
                    <div class="col-md-4">
                        <input id="datepicker" class="form-control @error('date') is-invalid @enderror" type="text" name='date' placeholder="DD/MM/YYYY" required>
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="startTime">Start
                        Time</label>
                    <div class="col-md-4">
                        <input class="form-control startTime @error('startTime') is-invalid @enderror" type="text" name="startTime" placeholder="hh/mm" id="startTime" required>
                        @error('startTime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class=" form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="endTime">End
                        Time</label>
                    <div class="col-md-4">
                        <input class="form-control endTime @error('endTime') is-invalid @enderror" type="text" name="endTime" placeholder="hh/mm" id="endTime" disabled required />
                        @error('endTime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="city">City</label>
                    <div class="col-md-4">
                        <select class="form-control @error('city') is-invalid @enderror" name="city" required>
                            <option value="">Select city</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Bekasi">Bekasi</option>
                            <option value="Bogor">Bogor</option>
                            <option value="Depok">Depok</option>
                        </select>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-left" for="Building Adress">Building
                        Adress</label>
                    <div class="col-md-7">
                        <textarea class="form-control @error('buildingAddress') is-invalid @enderror" placeholder="Address" name="buildingAddress" rows="3"></textarea>
                        @error('buildingAddress')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row required">
                    <label class="col-md-3 col-form-label text-md-left control-label" for="description">Description</label>
                    <div class="col-md-7">
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" rows="3" required></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var date = new Date();
        date.setDate(date.getDate() - 1);
        var date_input = $('input[name="date"]');
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: new Date()
        };
        date_input.datepicker(options);

        function time() {
            $('input[name=endTime]').val("")
            if ($('input[name=startTime]').val()) {
                var minTime = $('input[name=startTime]').val();
                console.log(minTime);
                document.getElementById('endTime').disabled = false;
                $('.endTime').timepicker({
                    timeFormat: 'HH:mm',
                    scrollbar: true,
                    interval: 60,
                    minTime: minTime + 1
                });
            } else {
                document.getElementById('endTime').disabled = true;
            }
        }
        $('.startTime').timepicker({
            timeFormat: 'HH:mm',
            scrollbar: true,
            interval: 60,
            change: time
        });
    })
</script>
@endsection
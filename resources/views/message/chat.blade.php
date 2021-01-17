@extends(isset(Auth::user()->id) ? 'layouts.app' : 'layouts.seller')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/message') }}">Message</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset(Auth::user()->id) ? $message->seller->business_name: $message->user->name}}</li>
        </ol>
    </nav>
</div>
<div class="container col-8">
    @if($message->messageDetails)
    <div class="" style="height: 70vh;display:flex;flex-direction:column-reverse; overflow:auto">
        {{-- <div> --}}
        @foreach($message->messageDetails->reverse() as $chat)
        <div class="card">
            <div class="card-header pb-0 bg-white">
                {{-- @if(Auth::user())
                    @if($chat->sender == Auth::user()->name) --}}
                <p class="card-title  text-primary font-weight-bold float-right">{{$chat->sender}}</p>
                <p>{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F')}}</p>
                {{-- @else
                    <p class="float-right">{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F')}}</p>
                <p class="card-title  text-primary font-weight-bold">{{$chat->sender}}</p>
                @endif
                @elseif(Auth::guard('seller'))
                @if($chat->sender == Auth::guard('seller')->user()->business_name)
                <p class="card-title  text-primary font-weight-bold float-right">{{$chat->sender}}</p>
                <p>{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F')}}</p>
                @else
                <p class="float-right">{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F')}}</p>
                <p class="card-title  text-primary font-weight-bold">{{$chat->sender}}</p>
                @endif
                @endif --}}
            </div>
            <div class="card-body">
                {{-- @if(Auth::user())
                    @if($chat->sender == Auth::user()->name) --}}
                <p class="mb-2 text-right">{{$chat->text}}</p>
                <p class="text-secondary mb-0 float-right" style="font-size: 10px">
                    {{\Carbon\Carbon::parse($chat->created_at)->format('H:i')}}</p>
                {{-- @else
                    <p class="mb-2">{{$chat->text}}</p>
                <p class="text-secondary mb-0" style="font-size: 10px">
                    {{\Carbon\Carbon::parse($chat->created_at)->format('H:i')}}</p>
                @endif
                @elseif(Auth::guard('seller'))
                @if($chat->sender == Auth::guard('seller')->user()->business_name)
                <p class="mb-2 text-right">{{$chat->text}}</p>
                <p class="text-secondary mb-0 float-right" style="font-size: 10px">
                    {{\Carbon\Carbon::parse($chat->created_at)->format('H:i')}}</p>
                @else
                <p class="mb-2">{{$chat->text}}</p>
                <p class="text-secondary mb-0" style="font-size: 10px">
                    {{\Carbon\Carbon::parse($chat->created_at)->format('H:i')}}</p>
                @endif
                @endif --}}
            </div>
        </div>
        {{-- </div> --}}
        @endforeach
    </div>
    @endif
    <div class="container p-0 pt-3 float-right">
        <form method="POST" action="{{ route('messageDetail.store') }}">
            @csrf
            <div class="input-group mb-3">
                {{-- <input type="text" class="form-control" type="text"> --}}
                <textarea class="form-control" name="text" rows="2"></textarea>
                @if(Auth::user())
                <input value="{{Auth::user()->name}}" name="sender" type="hidden">
                @elseif(Auth::guard('seller'))
                <input value="{{Auth::guard('seller')->user()->business_name}}" name="sender" type="hidden">
                @endif
                <input value="{{$message->id}}" name="message_id" type="hidden">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary text-left" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

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
<div class="container col-10">
    @if($message->messageDetails)
    <div class="chat overflow-auto" style="height: 70vh;">
        @foreach($message->messageDetails as $chat)
        @if($chat->sender==Auth::guard('seller')->user()->business_name)
        <div class="card text-right">
            <div class="card-header">
                <div>
                    <h5 class="card-title">{{$chat->sender}}</h5>
                    <div class="">{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F h:i A')}}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="second-part">{{$chat->text}}</div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">{{$chat->sender}}</h5>
                    <div class="">{{\Carbon\Carbon::parse($chat->created_at)->format('l, j F h:i A')}}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="second-part">{{$chat->text}}</div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
    <div>
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
                    <button class="btn btn-outline-secondary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
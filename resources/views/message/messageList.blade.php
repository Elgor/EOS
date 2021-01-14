@extends(isset(Auth::user()->id) ? 'layouts.app' : 'layouts.seller')
@section('content')
    @foreach($messages as $message)
        @if(Auth::user())
            <a href="{{ route('message.show', $message->id) }}">{{$message->seller->business_name}}</a>
        @elseif(Auth::guard('seller'))
            <a href="{{ route('message.show', $message->id) }}">{{$message->user->name}}</a>
        @endif
        <br>
    @endforeach
@endsection
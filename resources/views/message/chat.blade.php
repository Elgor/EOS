@extends('layouts.app')
@section('content')
    @if($message->messageDetails)
        @foreach($message->messageDetails as $chat)
            <p>Sender: <b>{{$chat->sender}}</b></p>
            <p>Message: {{$chat->text}}</p>
            <br>
        @endforeach
    @endif
    <form method="POST" action="{{ route('message.store') }}">
        @csrf
        <label>Insert Message:</label>
        <input type="text" name="text"></input>
        @if(Auth::user())
            <input value="{{Auth::user()->name}}" name="sender" type="hidden">  
        @elseif(Auth::guard('seller'))
            <input value="{{Auth::guard('seller')->user()->business_name}}" name="sender" type="hidden">    
        @endif
            <input value="{{$message->id}}" name="message_id" type="hidden">
        <button type="submit">submit</button>
    </form>
@endsection
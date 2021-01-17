@extends(isset(Auth::user()->id) ? 'layouts.app' : 'layouts.seller')
@section('content')
<div class="container col-10">
    <h4 class="d-flex">MESSAGE</h4>
    <hr>
    @foreach($messages as $message)
    @if(Auth::user())
    <ul class="list-group">
        <li class="list-group-item"><a
                href="{{ route('message.show', $message->id) }}">{{$message->seller->business_name}}</a></li>
    </ul>
    @elseif(Auth::guard('seller'))
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('message.show', $message->id) }}">{{$message->user->name}}</a>
        </li>
    </ul>
    @endif
    @endforeach
</div>
@endsection

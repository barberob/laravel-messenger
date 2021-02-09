@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($users as $user)
        <div class="card w-25">
            <div class="card-body">
                <div class="card-title">{{$user->name}}</div>
                <a href="{{ route('conversation', ['receiver_id' => $user->id]) }}" class="btn btn-primary">Contacter</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

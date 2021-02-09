@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Retour aux conversations</a>

    <div class="card mt-4">
        <div class="card-header">{{ $receiver->name }}</div>
    </div>
    <div class="w-100 bg-white my-5 p-2">

        @forelse($messages as $message)
            @if($message->sender->id == $sender_id)
                <div class="ml-auto pt-3">
                    <p class="mb-1 font-weight-bold d-block ml-auto w-25">{{ $message->sender->name }}</p>
                    <div class="bg-primary text-white ml-auto rounded-sm py-2 px-4 w-25">
                        <p class="m-0">{{ $message->content}}</p>
                    </div>
                </div>
            @else
                <div class="mr-auto pt-3">
                    <p class="mb-1 font-weight-bold d-block mr-auto w-25">{{ $message->sender->name }}</p>
                    <div class="bg-light mr-auto rounded-sm py-2 px-4 w-25">
                        <p class="m-0">{{ $message->content}}</p>
                    </div>
                </div>
            @endif
        @empty
            <h2>Pas encore de messages dans cette conversation</h2>
        @endforelse

    </div>

    <form action="{{ route('message_post_add', ['receiver_id' => $receiver->id]) }}" method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <textarea class="mb-3" name="content" id="content" cols="10" rows="10"></textarea>
        <input type="submit" value="Envoyer" class="btn btn-primary w-25 m-auto">
    </form>
@endsection

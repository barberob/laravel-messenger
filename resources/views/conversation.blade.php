@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>

    <div class="w-100 bg-white my-5 p-2">blabla</div>

    <form action="{{ route('message_post_add', ['receiver_id' => $receiver_id]) }}" method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <textarea class="mb-3" name="content" id="content" cols="10" rows="10"></textarea>
        <input type="submit" value="Envoyer" class="btn btn-primary w-25 m-auto">
    </form>
@endsection

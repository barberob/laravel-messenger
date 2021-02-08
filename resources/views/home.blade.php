@extends('layouts.app')

@section('content')
<div class="container">
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@dd($users)--}}

    @foreach($users as $user)
        <div class="card w-25">
            <div class="card-body">
                <div class="card-title">{{$user->name}}</div>
                <a href="{{ route('conversation', ['id' => $user->id]) }}" class="btn btn-primary">Contacter</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
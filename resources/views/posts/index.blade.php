@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3 pt-4 pb-2">
            <a href="/profile/{{ $post->user->id }}">
                <img src="/storage/{{ $post->image }}" alt="photos" class="w-100">
            </a>
            <p class="pt-2 pb-4">
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}"></a>
                    <span class="text-dark">
                        {{ $post->user->username }}
                    </span>
                </span> {{ $post->caption }}
            </p>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-cotent-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
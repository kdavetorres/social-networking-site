@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $userid->profile->image }}" alt="photos" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center p-b4">
                    <h1>{{ $userid->username }}</h1>
                </div>
                @can('update', $userid->profile)
                <a href="/p/create" class="btn btn-primary">Add new post</a>
                @endcan
            </div>
            @can('update', $userid->profile)
            <a href="/profile/{{ $userid->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $userid->posts()->count() }}</strong> post</div>
                <div class="pr-5"><strong>24K</strong> followers</div>
                <div class="pr-5"><strong>300</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $userid->profile->title }}</div>
            <div>{{ $userid->profile->description }}</div>
            <div><a href="#">{{ $userid->profile->url }}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach($userid->posts as $post)
        <div class="col-4 pb-3">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="post photos" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
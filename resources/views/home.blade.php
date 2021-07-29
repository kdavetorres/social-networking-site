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
            <img src="/img/photo.png" alt="photos" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex align-items-center p-b4">
                <h1>{{ Auth::user()->username }}</h1>
                <!-- <h1>{{ $userprofile->username }}</h1> -->
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>127K</strong> post</div>
                <div class="pr-5"><strong>24K</strong> followers</div>
                <div class="pr-5"><strong>300</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ Auth::user()->name }}</div>
            <div>FSPONOW</div>
            <div><a href="#">kimdavetorres.com</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"><img src="/img/cat.jpg" alt="post photos" class="w-100"></div>
        <div class="col-4"><img src="/img/face.png" alt="post photos" class="w-100"></div>
        <div class="col-4"><img src="/img/mobile.png" alt="post photos" class="w-100"></div>
    </div>
</div>
@endsection
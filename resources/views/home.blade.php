@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

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
    </div>

    <!-- "Create Post" link at the bottom -->
    <div class="row justify-content-center mt-4">
        <a href="{{ route('posts.create') }}">Create Post</a>
        <a href="{{route('posts.index')}}">See Other Users posts</a>
    </div>
@endsection

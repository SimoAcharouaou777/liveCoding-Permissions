@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    {{ $post->content }}
                </div>
                <div class="card-footer">
                    Created by: {{ $post->user->name }}
                    @if(auth()->check() && $post->user_id == auth()->user()->id || auth()->user()->HasRole('admin'))
                        <div class="mt-2">
                        @can('delete post')
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1 class="text-center">All the posts</h1>
    <a href="/posts/create">
        <button class="btn btn-primary right">Create a post</button>
    </a>
@stop

@section('content')
    <div class="col-sm-12" style="overflow: auto; height: 500px;">
        <div >
            @foreach($posts as $post)
                @include('posts.post')
            @endforeach
        </div>
    </div>
@endsection

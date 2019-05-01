@extends('layouts.default')

@section('content')

<div class="container">
    <h1>All Posts</h1>
    {{--@if(Gate::allows('create-post')) <!--use to authorization อณุญาตให้ใช้ -->--}}
        {{--use users from login      create อะไร?       ถ้าไม่ได้ login users ==null--}}
       {{--check null form dont login--}}
    @if(Auth::user() and Auth::user()->can('create',\App\Post::class))
    <div>
        <a href="{{ action('PostsController@create') }}">
            Create New Post
        </a>

    </div>
    @endif

    @foreach ($posts as $post)
        <div>
        <a href="{{action('PostsController@show',['id'=>$post->id]) }}">
            Title : {{$post->title}}    
            </a>
        </div>    

    @endforeach

</div>

@endsection
@extends('layouts.default')

@section('content')
<div class="container">
    <h1>{{$post->title}}</h1>
    <p> {{$post->detail}}</p>
{{--@if(Gate::allows('update-post',$post))--}}
    @if(Auth::user() and Auth::user()->can('update',$post))
<a href="{{ action('PostsController@edit', ['id' => $post->id])  }}"  class="btn btn-default">EDIT</a>
    @endif
</div>
    <div align="center">
        <p>{{$post->comments()->count()}} comments </p>
    </div>
    <section class="comments">
        <div class="container">
                @foreach($post->comments as $comment) <!-- ดึง comment ได้เลเย-->
                    <div class="row">
                        <div>
                            {{$comment->detail}}
                            <a href="{{action('PostsController@edit_comment',['post_id'=>$post->id, 'comment_id' => $comment->id])}}">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach

        </div>
    </section>
@endsection

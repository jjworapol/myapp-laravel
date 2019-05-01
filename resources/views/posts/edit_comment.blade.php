@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
    <h1>Edit Comment</h1>
    </div>
    <div class="row">
        <form action="{{action('PostsController@update_comment',['post_id'=>$comment->post_id,'comment_id'=>$comment->id])}}" method="post">
            @csrf
            @method('PUT')
            <label for="detail">comment detail</label>
            <textarea name="detail" id="detail" cols="30" rows="10">{{$comment->detail}}</textarea>

            <button type="submit">UPDATE</button>
        </form>
    </div>
</div>
@endsection

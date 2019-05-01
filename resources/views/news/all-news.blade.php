@extends('layouts.default')

@section('content')

<h1>All news</h1>
<p> Highlight</p>

@foreach($newsArray as $news)
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $news['title'] }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        <a href="{{ action('NewsController@show',['id' => $news['id']] )}}" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

@endforeach
@endsection

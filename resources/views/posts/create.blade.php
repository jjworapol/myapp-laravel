@extends('layouts.default')
@section('content')
<div class="container">

    <h1>Create New Post</h1>
    @if($errors->any())
        <div class="alert alert-danger" >
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ action('PostsController@store') }}" method="post">
        @csrf {{-- //สร้างโทเคน ป้องกันการโดน attack  --}}
        <div>
            <label for="title">Title </label>
                                        {{--if dont have title show red box--}}
            <input  class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}"
                    value = "{{old('title')}}" {{--ใช้เพื่อโหลดค่าเก่ากลับมา--}}
                    type="text" id="title" name="title" />
            @if($errors->has('title'))
                <div class="invalid-feedback">{{$errors->first('title')}}</div> {{--alert under box--}}
            @endif

        </div>

        <div>
            <label for="detail">Post Detail</label>
            <textarea class="form-control {{$errors->has('detail') ? 'is-invalid' : ''}}"
                    value = "{{old('detail')}}"
                    name="detail" id="detail" cols="30" rows="10"></textarea>
            @if($errors->has('detail'))
                <div class="invalid-feedback">{{$errors->first('detail')}}</div>
            @endif
        </div>


        <div>
            <button type="submit">Create</button>
            <button type="reset">Reset</button> <!--if want refrsh by button use javascript help-->

        </div>
    </form>

</div>

@endsection

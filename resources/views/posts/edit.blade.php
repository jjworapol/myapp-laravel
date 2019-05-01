@extends('layouts.default')
@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ action('PostsController@update', ['id' => $post->id]) }}" method="post">
            @csrf {{-- //สร้างโทเคน ป้องกันการโดน attack  --}}
            @method('PUT')
            <div>
                <label for="title">Post Title </label>
                <input class ="form-control {{$errors->has('title') ? 'is-invalid' : ''}}"
                       value="{{old('title',$post->title)}}"
                       {{--ตอนแรกจะเรียกค่าจาก $post เพราะยังไม่มี old ถ้ามีการ edit จะดึงค่าจาก old--}}
                       type="text" id="title" name="title" />
                @if($errors->has('title'))
                    <div class="invalid-feedback">{{$errors->first('title')}}</div> {{--alert under box--}}
                @endif
    
            </div>
    
            <div>
                <label for="detail">Post Detail</label>
                <textarea class ="form-control {{$errors->has('detail') ? 'is-invalid' : ''}}"
                          name="detail" id="detail" cols="30" rows="10" >{{old('detail',$post->detail)}}</textarea>
                {{--{{$post->detail}}--}}
                @if($errors->has('detail'))
                    <div class="invalid-feedback">{{$errors->first('detail')}}</div> {{--alert under box--}}
                @endif
            </div>
    
    
            <div>
                <button type="submit">Create</button>
                <button class="reset-post"type="reset">Reset</button>
    
            </div>
        </form>
    

        <div class="row">
            <form method="Post" action="{{ action('PostsController@destroy',['id' =>$post->id]) }}">
            @csrf <!-- token-->
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-post"> <!--สร้าง class เพื่ access ผ่าน jquery -->
                    DELETE this post
                </button>
            </form>
        </div>
</div>


@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-post').click(function (e) {
                e.preventDefault();
                var is_confirm = confirm('Are you sure to delete this post?');

                // console.log(is_confirm);
                if(is_confirm){
                    $(e.target).closest('form').submit(); //ผิดหน้า
                    // e = event ของ ปุ่ม closest
                }
            });
            $('.reset-post').click(function (e){
                location.reload();
            })
        });

    </script>

@endsection
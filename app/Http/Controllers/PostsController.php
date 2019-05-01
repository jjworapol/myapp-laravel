<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
//        $this->middleware('auth'); //only log in can view this controller
        $this->middleware('auth')->except(['index','show']); //expect only this page use auth

    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //create
    {
//        ไม่ให้ไปหน้า create ได้
        $this->authorize('create',Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  //
    {
        // dd( $request->all()); // dd = debug
        
        //mass assignment ได้เหมือนกัน แต่ไม่มีการดักอะไรเลย ไม่เหมาะสม
        // $post = Post::create($request->all());
//        request()->validate([]);

        $this->authorize('create',Post::class); //มีสิทธิ์ create มั้ย
        $attribute = $request->validate([
//            'title' => 'required|min:4'
            'title' => ['required','min:4','max:255'],
            'detail' => ['required','min:10','max:100']

        ]);

        $post = Post::create($attribute);

//        $post = new Post;
//        $post->title = $request->input('title');
//        $post->detail = $request->input('detail');
//        $post->save();

        return redirect()->action('PostsController@show',['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);//find in database
        $this->authorize('update',$post);

        $attributes = $request->validate([
//            'title' => 'required|min:4'
            'title' => ['required','min:4','max:255'],
            'detail' => ['required','min:10','max:100']

        ]);

        $post->Post::update($attributes);

//        $post->title = $request->input('title');
//        $post->detail = $request->input('detail');
//        $post->save();

        return redirect()->action('PostsController@show',['id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post -> delete();
        return redirect()->action('PostsController@index');
    }

    public function edit_comment($post_id,$comment_id){
        $post = Post::findOrFail($post_id);


        $comment = $post->comments()->findOrFail($comment_id);
        $this->authorize('update',$comment);
        return view('posts.edit_comment',['comment' => $comment]);
    }

    public function update_comment(Request $request,$post_id,$comment_id){
        $post = Post::findOrFail($post_id);
        $comment = $post->comments()->findOrFail($comment_id);
        $comment->detail = $request->input('detail');
//        dd($comment);
        $this->authorize('update',$comment);
        $comment->save();
        return redirect()->action('PostsController@show',['id'=>$post_id]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $newsArray = \App\Post::all();
        // $newsArray = [
        //     [
        //         'id' => 1,
        //         'title' => 'Thailand ELection 2019'    
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'บก.ลายจุด มอบเครื่องคิดเลขให้ กกต.'
        //     ]
        // ];
        
        // dd($newsArray); //debug
        return view('news.all-news')
             ->with('newsArray',$newsArray);
    }

    public function show($id){
        // $newsArray = [
        //     [
        //         'id' => 1,
        //         'title' => 'Thailand ELection 2019'    
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'บก.ลายจุด มอบเครื่องคิดเลขให้ กกต.'
        //     ]
        // ];
        $news = \App\Post::find($id);
        // return view('news.show',['news'=> $newsArray[$id-1] ]);
       return view('news.show',['news'=> $news ]);
    }
}

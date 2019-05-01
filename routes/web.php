<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// //old
// Route::get('/about-us', function(){
//     return view('about', [
//         'name' => 'Tum Thanadol',
//         'address' => 'Kasetsart University'
//     ]);
// });
Route::get('/about-me1', 'AboutController@index');  
Route::resource('/posts', 'PostsController');  


// // old
// Route::get('/news' , function () {
//     $newsArray = [
//         [
//             'id' => 1,
//             'title' => 'Thailand ELection 2019'    
//         ],
//         [
//             'id' => 2,
//             'title' => 'บก.ลายจุด มอบเครื่องคิดเลขให้ กกต.'
//         ]
//     ];
    
//     // dd($newsArray); //debug
//     return view('news.all-news')
//          ->with('newsArray',$newsArray);
// });
Route::get('/news' , 'NewsController@index') ;

// //old
// Route::get('/news/{id}' , function($id){

//     $newsArray = [
//         [
//             'id' => 1,
//             'title' => 'Thailand ELection 2019'    
//         ],
//         [
//             'id' => 2,
//             'title' => 'บก.ลายจุด มอบเครื่องคิดเลขให้ กกต.'
//         ]
//     ];
//    return view('news.show',['news'=> $newsArray[$id-1] ]);
// })->where('id', '[0-9]+');
Route::get('/news/{id}' , 'NewsController@show')->where('id', '[0-9]+');

Route::get('/news/{id}/comments/{c_id?}' , function($id , $c_id = null){
    $data = [
        'news' => [
            'id' => $id,
            'title' => 'Thailand Election 2019',
            'comments' =>[
                'id' => $c_id
            ]
        ]
    ];
    if (!is_null($c_id)){
        $data['news']['comments'] = ['id' => $c_id];

    }
    return $data;
})->where('id', '[0-9]+');

Route::get('/posts/{post_id}/comments/{coment_id}/edit','PostsController@edit_comment');

Route::put('/posts/{post_id}/comments/{comment_id}','PostsController@update_comment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users','UsersController@index');

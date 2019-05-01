<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::get('/',function(){
//    return 'Hello API';
    return response()->json([//return->json
        'key' => 'value',
    'message' => 'Hello Api' //send data to use by other server
    ]);
});

Route::apiResource('/users','Api\UsersController');

//Route::apiResource('/','Api\UsersController');


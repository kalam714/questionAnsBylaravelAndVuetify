<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/question','App\Http\Controllers\QuestionController');
Route::apiResource('/category','App\Http\Controllers\CategoryController');
Route::apiResource('/question/{question}/reply','App\Http\Controllers\ReplyController');
Route::post('/like/{reply}','App\Http\Controllers\likeController@likeReply');
Route::delete('/like/{reply}','App\Http\Controllers\likeController@unlikeReply');

Route::post('notification',function(){
 return [
     'read'=>auth()->user()->readNotifications(),
     'unread'=>auth()->user()->unReadNotifications()

 ];
});




Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

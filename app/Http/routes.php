<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();
Route::get('/', 'welcome@index');
Route::get('/home', 'welcome@index');
Route::resource('chats','ChatsController');
Route::get('/{building}', ['as' => 'building', function ($building) {
    return view('building',compact('building'));
}]);



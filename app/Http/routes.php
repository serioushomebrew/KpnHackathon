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


Route::get('/devdebug', 'DebugController@test');

Route::auth();
Route::get('newChat/{chatsId}', 'ChatController@createChat');
Route::get('/search/{search}', 'welcome@skillSearch');
Route::get('/skill/{skillId}', 'welcome@indexUser');
Route::get('/', 'welcome@index');
Route::get('/searchUsersWithSkills/{query}', 'welcome@searchUsersWithSkills');
Route::resource('chats','ChatController');
Route::get('/{building}', ['as' => 'building', 'uses' => 'welcome@building']);






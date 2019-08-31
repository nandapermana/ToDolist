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

Route::get('/',[
	'uses' => 'todoController@homeTodo',
	'as'   => 'home'
]);

Route::post('/post_todo',[
    'uses'  => 'todoController@postTodo',
    'as'    => 'post.item'
]);

Route::get('/delete_todo',[
    'uses'  => 'todoController@deleteSelectedTodo',
    'as'    => 'delete.item'
]);

Route::post('/delete_all',[
		'uses' => 'todoController@deleteAll',
		'as'   => 'delete.all'
]);

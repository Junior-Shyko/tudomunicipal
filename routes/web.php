<?php
//rota de raiz
Route::get('/' , 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('usuario', 'UsersController');
Route::post('getCity/{id}', 'UsersController@getCity');

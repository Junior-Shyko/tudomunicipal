<?php
//rota de raiz
Route::get('/' , 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('usuario', 'UsersController@update');
Route::post('usuario/excluir', 'UsersController@destroy');
Route::resource('usuario', 'UsersController');
Route::post('getCity/{id}', 'UsersController@getCity');

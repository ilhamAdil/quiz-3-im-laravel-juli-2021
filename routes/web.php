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

Route::get('/',function(){
    return view('post.home');
});
Route::get('/proyek/create','ItemController@create');

Route::post('/proyek','ItemController@store');
Route::get('/proyek','ItemController@index');
Route::get('/proyek/{id}','ItemController@show');
Route::get('/proyek/{id}/edit','ItemController@edit');
Route::put('/proyek/{id}','ItemController@update');
Route::delete('/proyek/{id}','ItemController@destroy');
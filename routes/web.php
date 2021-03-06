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
Route::group(['prefix' => 'admin'], function () {
    Route::get('talk/create', 'Admin\TalkController@add')->middleware('auth');
    Route::post('talk/create', 'Admin\TalkController@create')->middleware('auth');
    Route::get('talk/index', 'Admin\TalkController@index')->middleware('auth');
    Route::get('talk/edit', 'Admin\TalkController@edit')->middleware('auth');
    Route::get('talk/delete', 'Admin\TalkController@delete')->middleware('auth');
    Route::post('talk/edit', 'Admin\TalkController@update')->middleware('auth');
});

Route::get('/', 'TalkroomController@index')->name('top');
Route::get('/talkroom/{id}', 'TalkroomController@show');
Route::post('/talkroom/{post}/comments', 'CommentsController@store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

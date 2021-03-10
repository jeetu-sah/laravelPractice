<?php

use Illuminate\Support\Facades\Route;

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

Route::get('exportDatabase','HomeController@exportDatabase');

Route::get('/','HomeController@index');
Route::get('user/delete/{id}','HomeController@destroy')->name('user.delete');
Route::get('user/post/{id}','HomeController@post')->name('user.post');
Route::get('user/comment/{id}','HomeController@userComment')->name('user.comment');
Route::get('user/comment-detail/{id}','HomeController@commentDetail')->name('user.post.comment-detail');

Route::get('user/post/comment/{id}','HomeController@comment')->name('user.post.comment');
Route::post('user/post/comment/{id}','HomeController@commentStore')->name('user.post.comment');

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

Route::get('/','HomeController@index')->name('index');
Route::get('user/delete/{id}','HomeController@destroy')->name('user.delete');
Route::get('user/post/{id}','HomeController@post')->name('user.post');
Route::get('user/comment/{id}','HomeController@userComment')->name('user.comment');
Route::get('user/comment-detail/{id}','HomeController@commentDetail')->name('user.post.comment-detail');
Route::get('user/user-has-post','HomeController@userHasPost')->name('user.user-has-post');
Route::get('user/user-has-post-comment','HomeController@userHasPostComment')->name('user.user-has-post-comment');

Route::get('user/post/comment/{id}','HomeController@comment')->name('user.post.comment');
Route::post('user/post/comment/{id}','HomeController@commentStore')->name('user.post.comment');

//post controller
Route::prefix('user/')->name('user.')->group(function(){
    //User routing 
      Route::get('/user-does-not-have-post-comment','UserController@userDoesNotHavePostComment')
                                 ->name('user-does-not-have-post-comment');

    Route::prefix('post')->name('post.')->group(function(){
        Route::get('/','PostController@index')->name('index');
       Route::post('/store/{userid}','PostController@store')->name('store');
       Route::get('/user-does-not-have-post-comment','PostController@userDoesNotHaveComment')->name('user-does-not-have-post-comment');
    });

    Route::prefix('role')->name('role.')->group(function(){
        Route::resource('/', 'RoleController');
        Route::get('/show-role/{user}','RoleController@userRoles')->name('show-role');
        Route::get('/role-user/{rollid}','RoleController@roleUser')->name('role-user');
        Route::get('/role-list','RoleController@roleList')->name('role-list');
        Route::post('/assign_role/{userid}','RoleController@assignUserRole')->name('assign_role');

    });


});
//post controller
Route::prefix('polymorphic-relationships/')->name('polymorphic.')->group(function(){
    Route::get('/','Relationship\PolymorphicController@index')->name('index');
    Route::get('/image/{id}','Relationship\PolymorphicController@image')->name('image');
    Route::post('/upload-image/{id}','Relationship\PolymorphicController@uploadImage')->name('upload-image');
});

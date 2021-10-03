<?php
use Illuminate\Support\Facades\Route;

Route::post('task/store', 'JsWebsolutions\ToDoPackage\Controllers\TaskController@store')->name('task.store');
Route::get('task/list', 'JsWebsolutions\ToDoPackage\Controllers\TaskController@index');

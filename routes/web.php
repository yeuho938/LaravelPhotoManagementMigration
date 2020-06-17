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

Route::get('/', function () {
    return view('welcome');
});

// PHOTO
Route::get('/photo/index', 'Admin\PhotoController@index');
Route::get('/photo/create', 'Admin\PhotoController@create');
Route::post('/photo/store', 'Admin\PhotoController@store');
Route::delete('/photo/{id}', 'Admin\PhotoController@destroy');
Route::get('/photo/{id}/edit', 'Admin\PhotoController@edit');
Route::patch('/photo/{id}', 'Admin\PhotoController@update');


///TAG
Route::get('/tag/index', 'Admin\TagController@index');
Route::get('/tag/create', 'Admin\TagController@create');
Route::post('/tag/store', 'Admin\TagController@store');
Route::delete('/tag/{id}', 'Admin\TagController@destroy');
Route::get('/tag/{id}/edit', 'Admin\TagController@edit');
Route::patch('/tag/{id}', 'Admin\TagController@update');



/// CATEGORY
Route::get('/category/index', 'Admin\CategoryController@index');
Route::get('/category/create', 'Admin\CategoryController@create');
Route::post('/category/store', 'Admin\CategoryController@store');
Route::delete('/category/{id}', 'Admin\CategoryController@destroy');
Route::get('/category/{id}/edit', 'Admin\CategoryController@edit');
Route::patch('/category/{id}', 'Admin\CategoryController@update');

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

Route::get('/', 'pagecontroller@index');
Route::get('/about', 'pagecontroller@about')->name('aboutpage');
Route::get('/contact', 'pagecontroller@contact');

Route::post('/dosend', 'pagecontroller@dosend');

Route::resource('posts', 'postcontroller');


Route::resource('tags','TagsController')->only(['show']);


Auth::routes();
Route::get('user/verify/{token}', 'Auth\RegisterController@verifyEmail');

Route::get('/home', 'HomeController@index')->name('home');
//comment
Route::post('/comments/{slug}', 'CommentsController@store')->name('comments.store');
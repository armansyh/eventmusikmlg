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

Route::get('/', 'HomePageController@index');

Route::get('/search', 'PencarianController@setPencarian');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/allusers', 'AdminController@allUser');

Route::get('/allposts', 'AdminController@allPosts');


Route::delete('deleteuser/{id}',['as' => 'deleteuser', 'uses' => 'AdminController@deleteUser']);
Route::delete('deletepost/{id}',['as' => 'deletepost', 'uses' => 'AdminController@deletePost']);




//Route::get('/home', 'HomeController@index')->name('home');

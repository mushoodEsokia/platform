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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat.index');
});

Route::get('/blog', 'BlogController@index');
Route::get('/admin/blog/create', 'BlogController@create');
Route::post('/admin/blog/create', 'BlogController@store');
Route::get('/admin/blog', 'BlogController@indexAdmin');

Route::get('/search', 'HomeController@search');

Route::get('/job', 'JobController@index');
Route::get('/admin/job/create', 'JobController@create');
Route::post('/admin/job/create', 'JobController@store');
Route::get('/admin/job', 'JobController@indexAdmin');

Route::get('/email', 'MessageController@index');
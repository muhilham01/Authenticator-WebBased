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

Route::get('/service', function () {
    return view('service');
});

Route::post('/service/post_secret', 'ServiceController@post_secret');

Route::post('/service/get_secret', 'ServiceController@get_secret');

Route::get('/test', function () {
    return view('test');
});

Route::get('/home', 'UserController@home');

Route::get('/user', 'UserController@index');

Route::get('/user/code', 'UserController@code');

Route::post('/service/code', 'ServiceController@code');

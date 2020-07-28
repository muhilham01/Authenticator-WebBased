<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
//use illuminate\Support\Facades\Auth;


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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/service', function () {
    return view('service');
});

Route::post('/service/post_secret', 'ServiceController@post_secret');

Route::post('/service/put_secret', 'ServiceController@put_secret');

Route::post('/service/put_profile', 'ServiceController@put_profile');

Route::get('/service/delete_secret/{id}', 'ServiceController@delete_secret');

Route::get('/service/edit_secret/{id}', 'ServiceController@edit_secret');

Route::post('/service/get_secret', 'ServiceController@get_secret');

Route::get('/test', function () {
    return view('templates/header');
});

Route::get('/user/home', 'UserController@home')->name('service');

Route::get('/user', 'UserController@index');

Route::get('/user/code', 'UserController@code');

Route::post('/service/code', 'ServiceController@code');

<<<<<<< HEAD
Route::get('/mail-config',  function () {
    return config('mail');
});

Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new MailtrapExample());

    return 'A message has been sent to Mailtrap!';
});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
        ->name('admin');
    });
    
Auth::routes(['verify' => true]);

=======
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'UserController@logout');

Route::get('/test', 'ServiceController@qr_code');
>>>>>>> 4486295ee7b67009391d26b38bc516d886e212fc

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

/*
* You can't cache routes if you are using a closure
* https://laracasts.com/discuss/channels/laravel/error-unable-to-prepare-route-apiuser-for-serialization-uses-closure
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/upload-file', 'ImageController@showUploadForm');
Route::post('/upload-file', 'ImageController@upload')->name('file.upload');
Route::get('/files', 'ImageController@index')->name('file.index');

Route::get('error', function() {
    throw new \Exception('This is error, created by me!');
});

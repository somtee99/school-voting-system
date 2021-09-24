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


Route::get('login', '')->name('login');
Route::post('login-action', '');
Route::get('register', '')->name('register');
Route::get('register-action', '');
Route::group(['prefix'=>'admin'], function(){
    Route::get('login', '')->name('login');
    Route::post('login-action', '');
});

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
        Route::get('elections/create', '')->name('create-election');
        Route::post('elections/create-action', '');
        Route::post('login-action', '');
    });
    Route::get('elections', '')->name('elections');
    Route::get('result/{election_uuid}', '');
    Route::post('vote/{election_uuid}', '');
});

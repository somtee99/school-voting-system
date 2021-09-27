<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Admin\AuthController;

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


Route::get('login', [UserController::class, 'showLogin'])->name('login');
Route::post('login-action', [UserController::class, 'login']);
Route::get('register', [UserController::class, 'showRegister'])->name('register');
Route::post('register-action', [UserController::class, 'register']);
Route::group(['prefix'=>'admin'], function(){
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login-action', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
        Route::get('election/create', [ElectionController::class, 'showCreateElection'])->name('create-election');
        Route::post('election/create-action', [ElectionController::class, 'createElection']);
    });
    Route::get('elections', [ElectionController::class, 'showElections'])->name('elections');
    // Route::get('result/{election_uuid}', '');
    Route::get('vote/{election_uuid}/{candidate_uuid}', [VoteController::class, 'vote']);
});

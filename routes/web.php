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

Route::group(['middleware' => 'guest'], function () {

    Route::get('/', 'App\Http\Controllers\UserController@login')->name('login');
    Route::get('/register', 'App\Http\Controllers\UserController@index')->name('register');
    Route::any('/postLogin', 'App\Http\Controllers\UserController@postLogin');
    Route::post('/simpanRegister', 'App\Http\Controllers\UserController@simpanRegister');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,pengguna']], function () {

    Route::get('/home', 'App\Http\Controllers\PerjalananController@index')->name('home');
    Route::get('/form', 'App\Http\Controllers\PerjalananController@form')->name('form');
    Route::post('/simpanPerjalanan', 'App\Http\Controllers\PerjalananController@simpanPerjalanan');
    Route::any('/logout', 'App\Http\Controllers\UserController@logout');
    Route::get('/cari', 'App\Http\Controllers\PerjalananController@cariPerjalanan');
    Route::get('/sortBy', 'App\Http\Controllers\PerjalananController@sortColumn');
    Route::get('/home/{id}/delete', 'App\Http\Controllers\PerjalananController@delete');
    Route::get('/user', 'App\Http\Controllers\UserController@showUser')->name('user');
    Route::get('/sortByUser', 'App\Http\Controllers\UserController@sortColumn');
});

// Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
//     Route::get('/user', 'App\Http\Controllers\UserController@showUser')->name('user');
//     Route::get('/sortByUser', 'App\Http\Controllers\UserController@sortColumn');
// });
// Route::get('/', ['middleware' => 'guest'], function () {
//     return view('auths.login');
// })->name('login');
// Route::get('/register', ['middleware' => 'guest'], function () {
//     return view('auths.register');
// })->name('register');
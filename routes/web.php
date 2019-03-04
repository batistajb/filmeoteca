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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware(['admin']);
    Route::get('/home', 'HomeController@home')->name('home');
    Route::post('/unlike', 'HomeController@unlike')->name('unlike');
    Route::post('/like', 'HomeController@like')->name('like');
    Route::get('/ver/{id}','HomeController@userShow')->name('userShow');
    Route::get('/editar','HomeController@userEdit')->name('userEdit');
    Route::post('/atualiza','HomeController@userUpdate')->name('userUpdate');

    Route::post('/atualiza','Admin\UserController@update')->name('user.update');
    Route::post('/atualizaAddress','Admin\UserController@updateAddress')->name('address.update');
    Route::post('/deleteAddress','Admin\UserController@deleteAddress')->name('address.delete');
    Route::post('/storeAddress','Admin\UserController@storeAddress')->name('address.store');
    Route::get('/atualizaPhone','Admin\UserController@updatePhone')->name('phone.update');
    Route::post('/deletePhone','Admin\UserController@deletePhone')->name('phone.delete');
    Route::post('/storePhone','Admin\UserController@storePhone')->name('phone.store');


    Route::prefix('usuarios')->middleware(['auth','admin'])->group(function ()
    {
        Route::get('/','Admin\UserController@index')->name('users');
        Route::post('/store','Admin\UserController@store')->name('user.store');
        Route::get('/ver/{id}','Admin\UserController@show')->name('user.show');
        Route::get('/create','Admin\UserController@create')->name('user.create');
        Route::get('/editar/{id}','Admin\UserController@edit')->name('user.edit');
        Route::post('/delete','Admin\UserController@delete')->name('user.delete');
    });


    Route::prefix('filmes')->middleware(['auth','admin'])->group(function ()
    {
        Route::get('','Admin\MovieController@index')->name('movies');
        Route::post('/store', 'Admin\MovieController@store')->name('movie.store');
        Route::get('/ver/{id}', 'Admin\MovieController@show')->name('movie.show');
        Route::get('/create', 'Admin\MovieController@create')->name('movie.create');
        Route::get('/editar/{id}', 'Admin\MovieController@edit')->name('movie.edit');
        Route::post('/delete', 'Admin\MovieController@delete')->name('movie.delete');
        Route::post('/atualiza', 'Admin\MovieController@update')->name('movie.update');
    });
});


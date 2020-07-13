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
    return redirect('/users');
});
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/add', 'UsersController@add')->name('users.add');
Route::post('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/{id}', 'UsersController@edit')->where(['id' => '[0-9]+'])->name('users.edit');
Route::post('/users/update/{id}', 'UsersController@update')->where(['id' => '[0-9]+'])->name('users.update');
Route::post('/users/delete/{id}', 'UsersController@delete')->where(['id' => '[0-9]+'])->name('users.delete');

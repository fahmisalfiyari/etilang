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

// CONTOH ROUTE PARAMATERS
Route::get('book/{id}', function ($id) {
    return 'Ini buku ke : ' .  $id;
});

// Route dengan kontroller
// name agar route bisa dinamis
// Route::get('violations', 'ViolationController@index')->name('violations.index');

Route::resource('violations', 'ViolationController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

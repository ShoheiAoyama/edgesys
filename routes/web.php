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
//    return view('welcome');
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'std', 'middleware' => 'auth'], function () {
    Route::get('/', 'StdController@index')->name('std.index');
    Route::get('index', 'StdController@index')->name('std.index');
    Route::get('create', 'StdController@create')->name('std.create');
    Route::post('store', 'StdController@store')->name('std.store');
    Route::get('show/{id}', 'StdController@show')->name('std.show');
    Route::get('edit/{id}', 'StdController@edit')->name('std.edit');
    Route::post('update/{id}', 'StdController@update')->name('std.update');
    Route::post('destroy/{id}', 'StdController@destroy')->name('std.destroy');
    Route::get('report','StdController@report')->name('std.report');
    Route::get('lesson','StdController@lesson')->name('std.lesson');
    Route::get('contact','StdController@contact')->name('std.contact');
});


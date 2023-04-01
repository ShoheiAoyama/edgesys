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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'std', 'middleware' => 'auth'], function () {
    Route::get('/', 'StdController@index')->name('std.index');
    Route::get('index', 'StdController@index')->name('std.index');
    Route::get('create', 'StdController@create')->name('std.create');
    Route::get('create2/{id}', 'StdController@create2')->name('std.create2');
    Route::get('lsncreate', 'StdController@lsncreate2')->name('std.lsncreate');
    Route::post('store', 'StdController@store')->name('std.store');
    Route::post('store2', 'StdController@store2')->name('std.store2');
    Route::get('show/{id}', 'StdController@show')->name('std.show');
    Route::get('edit/{id}', 'StdController@edit')->name('std.edit');
    Route::get('edit2/{id}', 'StdController@edit2')->name('std.edit2');
    Route::post('update/{id}', 'StdController@update')->name('std.update');
    Route::post('update2/{id}', 'StdController@update2')->name('std.update2');
    Route::post('destroy/{id}', 'StdController@destroy')->name('std.destroy');
    Route::post('destroy2/{id}', 'StdController@destroy2')->name('std.destroy2');
    Route::get('report','StdController@report')->name('std.report');
    Route::get('lesson','StdController@lesson')->name('std.lesson');
    Route::get('contact','StdController@contact')->name('std.contact');
});

Route::group(['prefix' => 'cost', 'middleware' => 'auth'], function () {
    Route::get('/', 'CostController@index')->name('cost.index');
    Route::get('index', 'CostController@index')->name('cost.index');
    Route::get('create', 'CostController@create')->name('cost.create');
    Route::post('store', 'CostController@store')->name('cost.store');
    Route::get('show/{id}', 'CostController@show')->name('cost.show');
});


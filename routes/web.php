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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WeatherController@index');
//Route::get('category/{id}', 'CategoryController@show');
//Route::get('category/{id}', 'CategoryController@show');
Route::resource('weather', 'WeatherController');
Route::get('conditions/create', 'WeatherController@index')->name('condition.create');
Route::post('conditions/update', 'ConditionController@update')->name('condition.update');


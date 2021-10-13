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

Route::get('/','App\Http\Controllers\HomeController@index');
Route::post('/','App\Http\Controllers\HomeController@index');



Route::post('/login','App\Http\Controllers\ValidateController@validation');
Route::get('/login','App\Http\Controllers\ValidateController@validation');


Route::post('/dashboard','App\Http\Controllers\DashboardController@loadpage');
Route::get('/dashboard','App\Http\Controllers\DashboardController@loadpage');


Route::get('/posthiring','App\Http\Controllers\PostController@loadpage');

Route::post('/posting','App\Http\Controllers\SavepostController@postdata');
Route::get('/posting','App\Http\Controllers\SavepostController@error');


Route::get('/guide','App\Http\Controllers\GuideController@loadpage');


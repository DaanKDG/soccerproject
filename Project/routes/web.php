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

Route::get('/', 'GuzzleController@getMatches');
Route::post('/prediction', "PredictionController@store");
Route::get('/predictions', 'PredictionController@showPredictions');
Route::get('/live', 'MatchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

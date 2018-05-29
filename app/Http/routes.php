<?php

use App\Ad;
use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::get('/', 'AdController@main');
Route::auth();
Route::post('/edit', 'AdController@create')->middleware('auth');
Route::get('/home', 'HomeController@index');
Route::get('/edit', function()
{
    return view('edit');
})->middleware('auth');
Route::get('/delete/{ad}', 'AdController@delete')->middleware('auth');
Route::get('/{id}', 'AdController@show');
Route::get('user/{id}', 'AdController@userAds');
Route::get('/edit/{ad}', function (Ad $ad)
{
    return view('change', [
        'ad' => $ad
    ]);
});
Route::post('/edit/{ad}', 'AdController@change');

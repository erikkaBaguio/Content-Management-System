<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'WelcomeController@index');
//
// Route::get('home', 'HomeController@index');

Route::resource('categories', 'CategoryController');

// Route::get('categories', 'CategoryController@index');
//
// Route::get('categories/{category}', 'CategoryController@show');
//
// Route::get('/', 'CategoryController@create');
//
// Route::post('categories', 'CategoryController@store');

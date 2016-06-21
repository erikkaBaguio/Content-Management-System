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

/*
+--------+-----------+------------------------------+--------------------+-------------------------------------------------+------------+
| Domain | Method    | URI                          | Name               | Action                                          | Middleware |
+--------+-----------+------------------------------+--------------------+-------------------------------------------------+------------+
|        | GET|HEAD  | categories                   | categories.index   | App\Http\Controllers\CategoryController@index   | web        |
|        | POST      | categories                   | categories.store   | App\Http\Controllers\CategoryController@store   | web        |
|        | GET|HEAD  | categories/create            | categories.create  | App\Http\Controllers\CategoryController@create  | web        |
|        | PUT|PATCH | categories/{categories}      | categories.update  | App\Http\Controllers\CategoryController@update  | web        |
|        | DELETE    | categories/{categories}      | categories.destroy | App\Http\Controllers\CategoryController@destroy | web        |
|        | GET|HEAD  | categories/{categories}      | categories.show    | App\Http\Controllers\CategoryController@show    | web        |
|        | GET|HEAD  | categories/{categories}/edit | categories.edit    | App\Http\Controllers\CategoryController@edit    | web        |
|        | POST      | items                        | items.store        | App\Http\Controllers\ItemController@store       | web        |
|        | GET|HEAD  | items                        | items.index        | App\Http\Controllers\ItemController@index       | web        |
|        | GET|HEAD  | items/create                 | items.create       | App\Http\Controllers\ItemController@create      | web        |
|        | DELETE    | items/{items}                | items.destroy      | App\Http\Controllers\ItemController@destroy     | web        |
|        | PUT|PATCH | items/{items}                | items.update       | App\Http\Controllers\ItemController@update      | web        |
|        | GET|HEAD  | items/{items}                | items.show         | App\Http\Controllers\ItemController@show        | web        |
|        | GET|HEAD  | items/{items}/edit           | items.edit         | App\Http\Controllers\ItemController@edit        | web        |
+--------+-----------+------------------------------+--------------------+-------------------------------------------------+------------+*/


Route::resource('categories', 'CategoryController');

Route::resource('items', 'ItemController');

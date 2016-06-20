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
Sample of redtful cpntroller
GET|HEAD	    books	              books.index	App\Http\Controllers\BookController@index

GET|HEAD	    books/create	      books.create	App\Http\Controllers\BookController@create

POST	        books	              books.store	App\Http\Controllers\BookController@store

GET|HEAD	    books/{books}	      books.show	App\Http\Controllers\BookController@show

GET|HEAD	    books/{books}/edit	  books.edit	App\Http\Controllers\BookController@edit

PUT	            books/{books}	      books.update	App\Http\Controllers\BookController@update

PATCH	        books/{books}	                    App\Http\Controllers\BookController@update

DELETE	        books/{books}	      books.destroy	App\Http\Controllers\BookController@destroy
*/


Route::resource('categories', 'CategoryController');

Route::resource('items', 'ItemController');

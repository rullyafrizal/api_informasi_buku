<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {

    Route::get('/books', 'BookController@index');
    Route::get('/books/{id}', 'BookController@show');
    Route::get('/books/search/{keyword}', 'BookController@search');
    Route::post('/books/filter', 'BookController@filter');

});

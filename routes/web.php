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

Route::get('/', 'PageController@login')->name('loginPage')->middleware('guest');
Route::get('/register', 'PageController@register')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@register')->middleware('guest');
Route::post('/login', 'AuthController@login')->name('login')->middleware('guest');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/books', 'PageController@books')->name('books');
    Route::get('/create-book', 'PageController@createBook')->name('createBook');
    Route::post('/books', 'BookController@store')->name('storeBooks');
    Route::get('/books/{id}', 'PageController@editBook');
    Route::post('/books/{id}', 'BookController@edit');
    Route::post('/delete-book/{id}', 'BookController@destroy');
    Route::get('/detail-book/{id}', 'PageController@showBook');

    Route::get('/authors', 'PageController@authors')->name('authors');
    Route::get('/author', 'PageController@createAuthor')->name('author');
    Route::post('/author', 'AuthorController@store')->name('author');
    Route::get('/edit-author/{id}', 'PageController@editAuthor');
    Route::post('/edit-author/{id}', 'AuthorController@edit');
    Route::post('/author/{id}', 'AuthorController@destroy');
    Route::get('/author/{id}', 'PageController@showAuthor');
});


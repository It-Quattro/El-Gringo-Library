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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


### Routes for Books Controller ###

Route::get('/books', ['as' => 'books', 'uses' => 'BooksController@index'])->middleware('auth');
Route::post('/books', ['as' => 'book', 'uses' => 'BooksController@create' ])->middleware('auth');
Route::delete('/book/{book}', 'BooksController@destroy')->middleware('auth');
Route::put('/book/{book}', 'BooksController@update')->middleware('auth');

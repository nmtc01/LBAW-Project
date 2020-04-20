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
/*
// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');*/


// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Route::get('/', 'HomeController@home');
//Route::get('/', 'HomeController@show')->name('home');
//Route::get('/', 'QuestionController@list');
Route::get('/', 'HomeController@show');

// Questions and anwers
Route::get('question/{id}', 'QuestionController@open');
Route::put('/api/answer', 'AnswerController@create');
Route::put('/api/answer/{id}', 'AnswerController@delete');

// Static pages
Route::get('/about', 'StaticController@about');


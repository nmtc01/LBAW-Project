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
Route::put('/api/question', 'QuestionController@create');
Route::put('/api/answer', 'AnswerController@create');
Route::delete('/api/answer/{id}', 'AnswerController@delete');

// Static pages
Route::get('/about', 'StaticController@about');


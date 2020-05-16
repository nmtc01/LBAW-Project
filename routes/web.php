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

// Questions
Route::get('question/{id}', 'QuestionController@open');
Route::put('/api/question', 'QuestionController@create');
Route::delete('/api/question/{id}', 'QuestionController@delete');
Route::put('/api/question/{id}', 'QuestionController@edit');
Route::put('/api/question/{id}/follow', 'QuestionFollowingController@create');
Route::put('/api/question/{id}/unfollow', 'QuestionFollowingController@delete');
Route::put('/api/question/{id}/update', 'QuestionController@update');

// Answers
Route::put('/api/answer', 'AnswerController@create');
Route::delete('/api/answer/{id}', 'AnswerController@delete');
Route::put('/api/answer/{id}', 'AnswerController@edit');
Route::put('/api/answer/{id}/update', 'AnswerController@update');
Route::put('/api/answer/{id}/best', 'AnswerController@setBestAnswer');

// Comments
Route::put('/api/comment', 'CommentController@create');
Route::delete('/api/comment/{id}', 'CommentController@delete');
Route::put('/api/comment/{id}', 'CommentController@edit');
Route::put('/api/comment/{id}/update', 'CommentController@update');

//Vote
Route::put('/api/question/{id}/vote', 'VoteController@addLikeQ');
Route::put('/api/question/{id}/downvote', 'VoteController@addDislikeQ');
Route::put('/api/answer/{id}/vote', 'VoteController@addLikeA');
Route::put('/api/answer/{id}/downvote', 'VoteController@addDislikeA');


//Labels
Route::put('/api/label', 'LabelController@startLabel');
Route::post('/api/label', 'LabelController@create');

// Static pages
Route::get('/about', 'StaticController@about');
Route::get('/404', 'StaticController@p404');

// Search page
Route::get('/search/{content}', 'SearchController@show');
Route::post('/search', 'SearchController@startSearch');

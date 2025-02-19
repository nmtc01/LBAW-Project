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
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('register', 'Auth\RegisterController@showRegistration')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Home page
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
Route::put('/api/label/{id}', 'LabelController@edit');
Route::put('/api/label/{id}/update', 'LabelController@update');
Route::delete('/api/label/{id}', 'LabelController@delete');

// Static pages
Route::get('/about', 'StaticController@about');
Route::get('/404', 'StaticController@p404');

// Search page
Route::get('/search', 'SearchController@show');

// Moderate
Route::get('/admin', 'ModerationController@show');
Route::post('/admin/{report_id}', 'ReportStatusController@resolve');
Route::put('/api/question/{id}/report', 'ReportController@createQ');
Route::put('/api/answer/{id}/report', 'ReportController@createA');
Route::put('/api/comment/{id}/report', 'ReportController@createC');
Route::put('/user/{id}/promote', 'ModerationController@promote');
Route::put('/user/{id}/demote', 'ModerationController@demote');
Route::put('/user/{id}/ban', 'ModerationController@ban');

//Profile
Route::get('/user/{id}', 'UserController@profile');
Route::put('/api/user/{id}', 'UserController@editProfile');
Route::put('/user/{id}/delete', 'ModerationController@delete');

// Notification
Route::put('/api/notification', 'NotificationController@update');


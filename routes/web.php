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

Route::get('/teacher', 'HomeController@index');
Route::get('/student', 'studentController@student');
Route::get('/questions', 'questionsController@questions');
Route::post('/teacher', 'questionsController@store');

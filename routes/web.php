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
    return view('general.index');
})->name('landing');

// Video
Route::get('course/{course_id}/video/add', 'VideoController@add');
Route::get('course/{course_id}/video/{video_id}', 'VideoController@details');
Route::get('course/{course_id}/video/{id}/edit', 'VideoController@edit');

// Course
Route::get('/course/add', 'CourseController@add');
Route::get('/course/{id}/edit', 'CourseController@edit');

// Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

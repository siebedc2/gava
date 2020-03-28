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

// Landingspagina
Route::get('/', [
    'as'   => 'landing',
    'uses' => 'HomeController@landing'
]);

Route::get('/home', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

// Course
Route::get('/course/add', [
    'as'   => 'addCourse',
    'uses' => 'CourseController@add'
]);

Route::post('/course/add', [
    'as'   => 'addCourse',
    'uses' => 'CourseController@handleAdd'
]);

Route::get('/course/edit/{id}', [
    'as'   => 'editCourse',
    'uses' => 'CourseController@edit'
]);

Route::post('/course/edit/{id}', [
    'as'   => 'editCourse',
    'uses' => 'CourseController@handleEdit'
]);

Route::get('/course/{id}', [
    'as'   => 'detailsCourse',
    'uses' => 'CourseController@details'
]);

// Video
Route::get('/course/{course_id}/video/add', [
    'as'   => 'addVideo',
    'uses' => 'VideoController@add'
]);

Route::post('/course/{course_id}/video/add', [
    'as'   => 'addVideo',
    'uses' => 'VideoController@handleAdd'
]);

Route::get('/course/{course_id}/video/{video_id}', [
    'as'   => 'detailsVideo',
    'uses' => 'VideoController@details'
]);

Route::get('/course/{course_id}/video/edit/{id}', [
    'as'   => 'editVideo',
    'uses' => 'VideoController@edit'
]);

Route::post('/course/{course_id}/video/edit/{id}', [
    'as'   => 'editVideo',
    'uses' => 'VideoController@handleEdit'
]);

Route::get('/subscriptions', [
    'as'   => 'subscriptions',
    'uses' => 'HomeController@subscriptions'
]);

Route::get('/dashboard', [
    'as'   => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);

// Profile
Route::get('/profile', [
    'as'   => 'profile',
    'uses' => 'HomeController@profile'
]);

Route::get('/profile/{id}', [
    'as'   => 'userProfile',
    'uses' => 'HomeController@userProfile'
]);

// Authentication
Auth::routes();
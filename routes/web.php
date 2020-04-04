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
    'uses' => 'CourseController@index'
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

Route::post('/course/delete/{id}', [
    'as'   => 'deleteCourse',
    'uses' => 'CourseController@handleDelete'
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

Route::post('/course/{course_id}/video/delete/{id}', [
    'as'   => 'deleteVideo',
    'uses' => 'VideoController@handleDelete'
]);

Route::get('/subscriptions', [
    'as'   => 'subscriptions',
    'uses' => 'HomeController@subscriptions'
]);

Route::get('/dashboard', [
    'as'   => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);

Route::get('/subscribe/{id}', [
    'as'   => 'subscribe',
    'uses' => 'HomeController@subscribe'
]);

// Profile
Route::prefix('/profile')->middleware('auth')->group(function() {
    Route::get('/', [
        'as'   => 'profile',
        'uses' => 'HomeController@profile'
    ]);
    
    Route::get('/edit', [
        'as'   => 'editProfile',
        'uses' => 'UserController@edit'
    ]);
    
    Route::post('/edit', [
        'as'   => 'editProfile',
        'uses' => 'UserController@handleEdit'
    ]);
    
    Route::get('/edit/change-password', [
        'as'   => 'changePassword',
        'uses' => 'UserController@changePassword'
    ]);
    
    Route::post('/edit/change-password', [
        'as'   => 'changePassword',
        'uses' => 'UserController@handleChangePassword'
    ]);
    
    Route::get('/edit/payment-methods', [
        'as'   => 'paymentMethods',
        'uses' => 'UserController@paymentMethods'
    ]);
    
    Route::post('/edit/payment-methods', [
        'as'   => 'paymentMethods',
        'uses' => 'UserController@handlePaymentMethods'
    ]);

    Route::get('/edit/purchase-history', [
        'as'   => 'purchaseHistory',
        'uses' => 'UserController@purchaseHistory'
    ]);

    Route::get('/edit/purchase-history/{id}', [
        'as'   => 'purchaseHistoryDetail',
        'uses' => 'UserController@purchaseHistoryDetail'
    ]);
    
    Route::get('/{id}', [
        'as'   => 'userProfile',
        'uses' => 'UserController@userProfile'
    ]);
});

// Authentication
Auth::routes();
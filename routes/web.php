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

/*Route::get('images/uploads/{file}', function(){
    return view('errors.404');
});*/

// Landingspagina
Route::domain(config('app.url'))->group(function () {
    Route::get('/', [
        'as'   => 'landing',
        'uses' => 'HomeController@landing'
    ]);
});

$platformdomain = 'platform.' . parse_url(config('app.url'), PHP_URL_HOST);

Route::domain($platformdomain)->group(function () {
    
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

Route::post('/course/getVideo', [
    'as'   => 'getVideo',
    'uses' => 'videoController@getVideo'
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
Route::prefix('/course')->group(function() {
    Route::get('/{course_id?}/video/add', [
        'as'   => 'addVideo',
        'uses' => 'VideoController@add'
    ]);
    
    Route::post('/{course_id?}/video/add', [
        'as'   => 'addVideo',
        'uses' => 'VideoController@handleAdd'
    ]);
    
    Route::get('/video/add', [
        'as'   => 'addVideo',
        'uses' => 'VideoController@add'
    ]);
    
    Route::post('/video/add', [
        'as'   => 'addVideo',
        'uses' => 'VideoController@handleAdd'
    ]);
    
    Route::post('/video/report', [
        'as'   => 'reportideo',
        'uses' => 'VideoController@handleReportVideo'
    ]);
    
    Route::get('/{course_id}/video/{video_id}', [
        'as'   => 'detailsVideo',
        'uses' => 'VideoController@details'
    ])->middleware('checkSubscription');

    Route::get('/{course_id}/video/{video_id}/ratings', [
        'as'   => 'ratingsVideo',
        'uses' => 'VideoController@ratings'
    ]);

    Route::get('/{course_id}/video/{video_id}/ratings/add', [
        'as'   => 'addVideoRating',
        'uses' => 'VideoController@addRating'
    ]);

    Route::post('/{course_id}/video/{video_id}/ratings/add', [
        'as'   => 'addVideoRating',
        'uses' => 'VideoController@handleAddRating'
    ]);

    Route::post('/ratings/reply', [
        'as'   => 'addVideoRating',
        'uses' => 'VideoController@handleReplyRating'
    ]);
    
    Route::get('/{course_id?}/video/edit/{id}', [
        'as'   => 'editVideo',
        'uses' => 'VideoController@edit'
    ]);
    
    Route::post('/{course_id?}/video/edit/{id}', [
        'as'   => 'editVideo',
        'uses' => 'VideoController@handleEdit'
    ]);

    Route::get('/video/edit/{id}', [
        'as'   => 'editVideo',
        'uses' => 'VideoController@edit'
    ]);
    
    Route::post('/video/edit/{id}', [
        'as'   => 'editVideo',
        'uses' => 'VideoController@handleEdit'
    ]);
    
    Route::post('/video/delete', [
        'as'   => 'deleteVideo',
        'uses' => 'VideoController@handleDelete'
    ]);
});

Route::post('/comment/report', [
    'as'   => 'reportComment',
    'uses' => 'VideoController@handleReportComment'
]);

Route::post('/comment/like', [
    'as'   => 'likeComment',
    'uses' => 'VideoController@handleLikeComment'
]);

Route::post('/comment/upvote', [
    'as'   => 'upvoteComment',
    'uses' => 'VideoController@handleUpvoteComment'
]);

Route::post('/comment/post', [
    'as'   => 'postComment',
    'uses' => 'VideoController@handlePostComment'
]);

Route::post('/subcomment/post', [
    'as'   => 'postSubcomment',
    'uses' => 'VideoController@handlePostSubcomment'
]);

Route::post('/videocomment/post', [
    'as'   => 'postSubcomment',
    'uses' => 'VideoController@handlePostVideoComment'
])->middleware('auth');


Route::prefix('/subscriptions')->middleware('auth')->group(function() {
    Route::get('/', [
        'as'   => 'subscriptions',
        'uses' => 'HomeController@subscriptions'
    ]);
    
    Route::post('/getCreator', [
        'as'   => 'subscriptions',
        'uses' => 'HomeController@getCreator'
    ]);
});

Route::prefix('/dashboard')->middleware('auth')->group(function() {
    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'HomeController@dashboard'
    ]);

    Route::post('/getCourse', [
        'as'   => 'dashboard',
        'uses' => 'HomeController@getCourse'
    ]);
});

Route::prefix('/subscribe')->middleware('auth')->group(function() {
    Route::get('/confirmation', [
        'as'   => 'subscribeConfirmation',
        'uses' => 'HomeController@subscriptionConfirmation'
    ]);
    
    Route::get('/{id}', [
        'as'   => 'subscribe',
        'uses' => 'HomeController@subscribe'
    ]);
    
    Route::post('/{id}', [
        'as'   => 'subscribe',
        'uses' => 'HomeController@handleSubscription'
    ]);
    
    Route::post('/cancel/{id}', [
        'as'   => 'subscribe',
        'uses' => 'HomeController@handleCancelSubscription'
    ]);
});

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
        'as'   => 'purchaseHistory',
        'uses' => 'UserController@purchaseHistoryDetail'
    ]);
    
    Route::get('/{id}', [
        'as'   => 'userProfile',
        'uses' => 'UserController@userProfile'
    ]);

    Route::get('/{id}/subscribers', [
        'as'   => 'subscribers',
        'uses' => 'UserController@subscribers'
    ]);

    Route::post('/user/report', [
        'as'   => 'reportUser',
        'uses' => 'UserController@handleReportUser'
    ]);
});

// Authentication
Auth::routes();
});
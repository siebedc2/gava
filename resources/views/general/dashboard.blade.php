<?php 
    $videoService           = new App\Services\Video(); 
    $ratingService          = new App\Services\Rating();
    $subscriptionService    = new App\Services\Subscription();
    $viewService            = new App\Services\View();
?>

@extends('layouts.app')

@section('extra-css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
@endsection

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row my-4 text-center text-md-left">
                <div class="col-md-5 offset-md-4">
                    <span id="my-courses" class="ml-md-5 border rounded-pill btn btn-primary active">my courses</span>
                    <span id="my-statistics" class="ml-1 border rounded-pill btn btn-primary non-active">my statistics</span>
                </div>
                <div class="col-md-3 text-center text-md-right add-course-col">
                    <a id="add-course" class="border-0 rounded-pill btn btn-primary" href="/course/add">create new course</a>
                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container pb-5 mb-5" id="myCoursesContainer">
    @include('components.delete-course-popup')

    <div class="row">
        <div class="col-12">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($courses as $course)
                <div class=" my-3 d-flex align-items-center">
                    <div class="col-5 col-md-2">
                        <div class="d-flex justify-content-center align-items-center w-100 tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                    </div>
                    <div class="col-6 col-md-5">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1">{{ $course->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                                <p class="mb-1 course-video-amount text-black-50">
                                    {{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                                @else
                                <p class="mb-1 course-video-amount text-black-50">
                                    {{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                                @endif
                            </div>
                        </div>
                        <div class="row d-md-none">
                            <div class="col-12">
                                <?php 
                                    $videos = $videoService->getAllCourseVideos($course->id); 
                                    $stars = 0;    
                                ?>
                                @foreach($videos as $video)
                                <?php 
                                    $rating = $ratingService->getAVG($video['id']);
                                    $stars += $rating['starAVG'];
                                ?>
                                @endforeach

                                @if($stars != null)
                                <?php $Coursestars = round(($stars / $videos->count()),0); ?>
                                <div class="d-flex align-items-center mr-5">
                                    <div class="rating mt-md-2">
                                        @for ($i = $Coursestars; $i >= 1; $i--)
                                        <span class="star star-checked"><i class="fa fa-star"></i></span>
                                        @endfor
                                        @for ($i = $Coursestars; $i <= 4; $i++) <span class="star"><i
                                                class="fa fa-star"></i></span>
                                            @endfor
                                    </div>
                                    <p class="text-black-50 mt-md-1 mb-0 ml-2">({{$rating['amountOfRatings']}})</p>
                                </div>
                                @else
                                <div class="d-flex align-items-center mr-5">
                                    <div class="rating mt-md-2">
                                        @for ($i = 5; $i >= 1; $i--)
                                        <span class="star"><i class="fa fa-star"></i></span>
                                        @endfor
                                    </div>
                                    <p class="text-black-50 mt-md-1 mb-0 ml-2">(0)</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-1 col-md-5 d-flex align-self-start align-self-md-center justify-content-end">
                        <p class="courseId" hidden>{{$course->id}}</p>
                        <span class="d-md-none mobile-course-options"><img src="/images/mobile-options.svg" alt="Options icon"></span>

                        <?php 
                            $videos = $videoService->getAllCourseVideos($course->id); 
                            $stars = 0;    
                        ?>
                        @foreach($videos as $video)
                            <?php 
                                $rating = $ratingService->getAVG($video['id']);
                                $stars += $rating['starAVG'];
                            ?>  
                        @endforeach

                        @if($stars != null)
                            <?php $Coursestars = round(($stars / $videos->count()),0); ?>
                            <div class="d-none d-md-flex align-items-center mr-5">
                                <div class="rating mt-2">
                                    @for ($i = $Coursestars; $i >= 1; $i--)
                                        <span class="star star-checked"><i class="fa fa-star"></i></span>
                                    @endfor
                                    @for ($i = $Coursestars; $i <= 4; $i++)
                                        <span class="star"><i class="fa fa-star"></i></span>
                                    @endfor
                                </div>
                                <p class="text-black-50 mt-1 mb-0 ml-2">({{$rating['amountOfRatings']}})</p>
                            </div>
                        @else
                            <div class="d-none d-md-flex align-items-center mr-5">
                                <div class="rating mt-2">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <span class="star"><i class="fa fa-star"></i></span>
                                    @endfor
                                </div>
                                <p class="text-black-50 mt-1 mb-0 ml-2">(0)</p>
                            </div>
                        @endif
                        
                        <a class="d-none d-md-block rounded-pill px-3 mr-5 btn btn-primary" href="/course/edit/{{ $course->id }}"><i class="text-white mr-2 fa fa-pencil" aria-hidden="true"></i>edit</a> 
                        <form class="d-none d-md-block" action="/course/delete/{{ $course->id }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="courseId" name="courseId" value="{{$course->id}}">
                            <button class="delete-btn rounded-pill px-3 btn btn-primary" type="submit"><i class="text-white mr-2 fa fa-trash" aria-hidden="true"></i>delete</button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.course-options-menu')
</div>
      

<div id="myStatisticsContainer" class="container d-none pb-5 mb-5">
    @include('components.statistics-popup')
    <div class="row">
        <div class="col-12 col-md-6">
            <p class="views-month1" hidden>{{ $viewService->getMonthViews(\Carbon\Carbon::now()->month-2, Auth::id()) }}</p>
            <p class="views-month2" hidden>{{ $viewService->getMonthViews(\Carbon\Carbon::now()->month-1, Auth::id()) }}</p>
            <p class="views-month3" hidden>{{ $viewService->getMonthViews(\Carbon\Carbon::now()->month, Auth::id()) }}</p>

            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-normal">Views</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card bg-light statistic-container border-0">
                        <div class="card-body">
                            <canvas class="bg-ligth" id="views" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 statistic-container">
            <p class="revenue-month1" hidden>{{ $subscriptionService->getMonthRevenue(\Carbon\Carbon::now()->month-2, Auth::id()) }}</p>
            <p class="revenue-month2" hidden>{{ $subscriptionService->getMonthRevenue(\Carbon\Carbon::now()->month-1, Auth::id()) }}</p>
            <p class="revenue-month3" hidden>{{ $subscriptionService->getMonthRevenue(\Carbon\Carbon::now()->month, Auth::id()) }}</p>

            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-normal">Revenue <span class="ml-2"><img class="mb-1 revenue-icon" src="/images/revenue-info.svg" alt="Info icon"></span></h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card bg-light statistic-container border-0">
                        <div class="card-body">
                            <canvas class="bg-ligth" id="revenue" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-6 col-md-3 text-center mb-3 mb-md-0">
            <div class="bg-light statistic-container pt-3 pb-1">
                <h2 class="font-weight-normal">Total Subscribers</h2>
                <p class="mb-0 statistics-number"><strong>{{ $subscribersAmount }}</strong></p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center mb-3 mb-md-0">
            <div class="bg-light statistic-container pt-3 pb-1">
                <h2 class="font-weight-normal">Total revenue <span class="ml-2"><img class="mb-1 revenue-icon" src="/images/revenue-info.svg" alt="Info icon"></span></h2>
                <p class="mb-0 statistics-number"><strong>&euro;{{ $subscriptionService->getTotalRevenue(Auth::id()) }}</strong></p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="bg-light statistic-container pt-3 pb-1">
                <h2 class="font-weight-normal">Total Courses</h2>
                <p class="mb-0 statistics-number"><strong>{{ $coursesAmount }}</strong></p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="bg-light statistic-container pt-3 pb-1">
                <h2 class="font-weight-normal">Total Views</h2>
                <p class="mb-0 statistics-number"><strong>{{ $viewService->getTotal(Auth::id()) }}</strong></p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-normal">Subscribers</h2>
                </div>
            </div>

            <div class="row">
                @foreach($subscriptions as $subscription)
                <div class="col-12 col-md-6 my-2">
                    <a class="text-decoration-none" href="/profile/{{ $subscription->user_id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-2">
                                <div style="background-image: url(/images/uploads/{{$subscription->user['profile_picture']}});" class="subscriber-image rounded-circle"></div>
                            </div>
                            <div class="col-10">
                                <p class="mb-0">{{ $subscription->user['name'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection
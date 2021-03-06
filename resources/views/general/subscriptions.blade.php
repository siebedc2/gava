<?php 
    $videoService = new App\Services\Video(); 
    $ratingService = new App\Services\Rating();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row my-4">
                <div class="col-12 d-flex justify-content-center">
                    <span id="courses" class="border rounded-pill btn btn-primary active">courses</span>
                    <span id="creators" class="ml-2 border rounded-pill btn btn-primary non-active">creators</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="coursesContainer" class="container">
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
            <div class="row">
                @if($creators->count() > 0)
                @foreach($courses as $course)
                @if(in_array($course->user_id, $subscribersIds))
                <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white text-decoration-none my-2">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="d-flex justify-content-center align-items-center w-100 tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="row">
                                <div class="col-12">
                                    <p class="mb-1">{{ $course->title }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="course-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                                        <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                                     @else
                                        <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <?php 
                                        $rating = $ratingService->getCourseRating($course);  
                                    ?>
                                    <div class="rating">
                                        @for ($i = $rating['starAVG']; $i >= 1; $i--)
                                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                                        @endfor

                                        @for ($i = $rating['starAVG']; $i <= 4; $i++) 
                                            <span class="star"><i class="fa fa-star"></i></span>
                                        @endfor
                                    </div>

                                    <p class="rating-amount text-black-50 mb-0 ml-2">{{$rating['amountOfRatings']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
                @else
                <div class="col-12">
                    <p class="text-center text-black-50">No subscriptions yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div id="creatorsContainer" class="d-none container">
    @include('components.cancel-subscription-popup')
    <div class="row">
        @if($creators->count() > 0)
        @foreach($creators as $creator)
        <div class="creator col-12 col-md-6 mb-4">
            <div class="row d-flex align-items-center">
                <div class="col-7">
                    <a class="text-decoration-none d-flex align-items-center" href="/profile/{{$creator->creator->id}}">        
                        <div style="background-image: url(/images/uploads/{{$creator->creator->profile_picture}});" class="subscriber-image rounded-circle"></div>
                        <p class="creator-name ml-3 mb-0">{{ $creator->creator->name }}</p>
                    </a>
                </div>
                
                <div class="col-5">
                    <form action="/subscribe/cancel/{{$creator->creator->id}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="creatorId" name="creatorId" value="{{$creator->creator->id}}">
                        <button class="cancel-subscription rounded-pill px-3 btn btn-primary" type="submit">cancel subscription</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12">
            <p class="text-center text-black-50">No subscriptions yet</p>
        </div>
        @endif
    </div>
</div>
@include('components.mobile-menu')
@endsection
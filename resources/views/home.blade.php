<?php 
    $videoService = new App\Services\Video(); 
    $ratingService = new App\Services\Rating();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12">
            <div class="row my-4">
                <div class="col-12">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <input type="text" class="rounded-pill border-0 bg-light form-control" placeholder="Search">
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option>Filter on technologies</option>
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option value="new">New</option>
                                    <option value="old">Old</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" class="rounded-pill border-0 bg-light form-control" placeholder="Minimum rating">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach($courses as $course)
                    @auth
                        @if($course->user_id != Auth::user()->id)
                            <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white text-decoration-none my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="w-100 rounded" src="/images/uploads/{{$course->tumbnail}}" alt="Tumbnail">
                                    </div>
                                    <div class="col-8">
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
                                            <div class="col-12">
                                                <?php 
                                                    $videos = $videoService->getAllCourseVideos($course->id); 
                                                    $rating = 0;    
                                                ?>
                                                @foreach($videos as $video)
                                                    <?php 
                                                        $rating += $ratingService->getAVG($video['id']);
                                                    ?>  
                                                @endforeach

                                                @if($rating != null)
                                                <?php $Coursestars = round(($rating / $videos->count()),0); ?>
                                                <div class="rating">
                                                    @for ($i = $Coursestars; $i >= 1; $i--)
                                                        <span class="star star-checked"><i class="fa fa-star"></i></span>
                                                    @endfor

                                                    @for ($i = $Coursestars; $i <= 4; $i++)
                                                        <span class="star"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                </div>
                                                @else
                                                <div class="rating">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <span class="star"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endauth

                    @guest
                        <a href="/course/{{ $course->id }}" class="col-12 col-md-6 text-decoration-none rounded bg-white my-2">
                            <div class="row">
                                <div class="col-4">
                                    <img class="w-100 rounded" src="/images/uploads/{{$course->tumbnail}}" alt="Tumbnail">
                                </div>
                                <div class="col-8">
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
                                        <div class="col-12">
                                            <?php 
                                                $videos = $videoService->getAllCourseVideos($course->id); 
                                                $rating = 0;    
                                            ?>
                                            @foreach($videos as $video)
                                                <?php 
                                                    $rating += $ratingService->getAVG($video['id']);
                                                ?>  
                                            @endforeach

                                            @if($rating != null)
                                            <?php $Coursestars = round(($rating / $videos->count()),0); ?>
                                            <div class="rating">
                                                @for ($i = $Coursestars; $i >= 1; $i--)
                                                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                                                @endfor

                                                @for ($i = $Coursestars; $i <= 4; $i++)
                                                    <span class="star"><i class="fa fa-star"></i></span>
                                                @endfor
                                            </div>
                                            @else
                                            <div class="rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <span class="star"><i class="fa fa-star"></i></span>
                                                @endfor
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endguest
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
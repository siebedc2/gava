<?php
    $userReportService = new App\Services\UserReport();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container mb-5 mb-md-0">
    <div class="row mt-4 header">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="/course/{{Request::route('course_id')}}/video/{{Request::route('video_id')}}">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Video ratings</h2>
        </div>
        <div class="col-12 col-md-4 text-center text-md-right position-fixed position-md-static">
            <a class="rounded-pill px-5 btn btn-primary" href="{{Request::url()}}/add">add rating</a>
        </div>
    </div>

    @if($ratings->count() == 0)
    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="text-black-50">There are no ratings yet</p>
        </div>
    </div>
    @else
    <div class="row mt-4">
        <div class="col-12 col-md-2">
            <div class="mb-4 pb-4 mb-md-0 pb-md-0 rating-overview">
            <div class="row">
                <div class="col-5 col-md-12 content-stars">
                    <div class="row">
                        <div class="col-12">
                            <p>content</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('stars', 5)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('stars', 4)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('stars', 3)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('stars', 2)->count()}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('stars', 1)->count()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-5 col-md-12 offset-2 offset-md-0 content-stars mt-md-4">
                    <div class="row">
                        <div class="col-12">
                            <p>quality</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('quality', 5)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('quality', 4)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('quality', 3)->count()}}</p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star star-checked ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('quality', 2)->count()}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                            <span class="star ml-1"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="col-3 text-right">
                            <p class="mb-0">{{$ratings->where('quality', 1)->count()}}</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="col-md-7 offset-md-1">
            @foreach($ratings as $rating)
            <div class="rating">
                <div class="row mb-2">
                    <div class="col-12 d-flex align-items-center">
                        <p class="username mb-0">{{$rating->user->name}}</p>
                        <span class="@if($userReportService->hasAlready($rating->user->id, Auth::id()) > 0) reported @endif report-user ml-2 mb-1"><img class="report-icon" src="/images/report.svg" alt="Report icon"></span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <p class="mb-0 text-black">{{$rating->comment}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 d-flex">
                        <p class="category mr-2">content</p>
                        <div class="rating">
                            @for ($i = $rating->stars; $i >= 1; $i--)
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            @endfor
                            @for ($i = $rating->stars; $i <= 4; $i++) 
                            <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex">
                        <p class="category mr-2">quality</p>
                        <div class="rating">
                            @for ($i = $rating->quality; $i >= 1; $i--)
                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                            @endfor
                            @for ($i = $rating->quality; $i <= 4; $i++) 
                                <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="reply pb-4 mb-3 border-bottom">
                @if(Auth::id() == $rating->video->course->user->id)
                <span class="@if(!empty($rating->ratingreply)) d-none @endif reply-rating rounded-pill px-3 btn btn-primary">reply</span>
                @endif

                <form class="d-none reply-form" action="">
                    <div class="form-group">
                        <input type="text" class="rounded-pill border-0 bg-light form-control pr-5" id="reply">
                    </div>

                    <input type="hidden" class="ratingId" name="ratingId" value="{{$rating->id}}">

                    <button type="submit" class="add-reply border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                </form>

                <div class="@if(empty($rating->ratingreply)) d-none @endif creator-reply pl-4">
                    <p class="username mb-1">{{$rating->video->course->user->name}}</p>
                    <p class="text-black reply_text">
                        @if(!empty($rating->ratingreply->reply))
                        {{$rating->ratingreply->reply}}
                        @endif
                    </p>
                </div>

            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@include('components.mobile-menu')
@endsection
<?php 
    $ratingService = new App\Services\Rating();
    $subscriptionService = new App\Services\Subscription();
    $likeService = new App\Services\Like();
    $upvoteService = new App\Services\Upvote();
    $commentService = new App\Services\Comment();
    $videoReportService = new App\Services\VideoReport();
?>

@extends('layouts.app')

@section('meta')
    <title>Gava - {{ $video->title }}</title>
    <meta name="og:title" content="Gava - {{ $video->name }}">
@endsection

@section('playerjs')
<script src="https://cdn.plrjs.com/player/2si44sh83212a/wvw5lu0pdpjf.js"></script>
@endsection

@section('content')
@include('components.menu')
@include('components.cancel-subscription-popup')
@include('components.share-video-popup')
@include('components.report-popup')
<div class="container mb-5 pb-5">
    <div class="row mt-4">
        <div class="col-12">
            <div class="row d-flex align-items-center d-md-none mb-4">
                <div class="col-6">
                    <a href="/course/{{$video->course->id}}">
                        <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                    </a>
                </div>
                <div class="col-6 d-flex justify-content-end">
                @if(Auth::user())
                    @if(Auth::id() != $course->user_id)
                    <span class="@if($videoReportService->hasAlready($video->id, Auth::id()) > 0) reported @endif report-video">
                        <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">
                        <img class="report-icon" src="/images/report.svg" alt="Report">
                    </span>
                    @endif
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="text-decoration-none" href="/profile/{{ $video->course->user->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-4 col-md-2">
                                <div style="background-image: url(/images/uploads/{{$video->course->user->profile_picture}});" class="subscriber-image rounded-circle"></div>
                            </div>
                            <div class="col-8 col-md-10">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="font-weight-normal mb-1">{{ $video->course->user->name }}</h4>
                                    </div>
                                    <div class="col-12">
                                        @if($subscribersAmount == 1)
                                            <p class="mb-0">{{ $subscribersAmount }} subscriber</p>
                                        @else
                                            <p class="mb-0">{{ $subscribersAmount }} subscribers</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @if(Auth::user())
                    @if(Auth::id() != $course->user_id)
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <span class="@if($videoReportService->hasAlready($video->id, Auth::id()) > 0) reported @endif d-none d-md-block report-video mr-5">
                            <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">
                            <img class="report-icon" src="/images/report.svg" alt="Report">
                        </span>
                        @if(in_array($video->course->user->id, $subscribersIds))
                        <form action="/subscribe/cancel/{{$video->course->user->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="creatorId" name="creatorId" value="{{$video->course->user->id}}">
                            <button class="cancel-subscription rounded-pill px-4 btn btn-secondary" type="submit">cancel subscription</button>
                        </form>
                        @else
                        <a href="/subscribe/{{ $video->course->user->id }}" class="rounded-pill px-4 btn btn-secondary">subscribe</a>
                        @endif
                    </div>  
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div id="player"></div>
                    <script>
                        var player = new Playerjs({id:"player", file:"/images/uploads/<?php Print($video->video); ?>"});
                    </script>
                </div>
            </div>
            <div class="video-information border-bottom text-white">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8">
                        <h3>{{ $video->title }}</h3>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-md-center">
                        @if(!empty($video->ratings))
                            <?php $rating = $ratingService->getAVG($video->id); ?>
                            <div class="rating mt-2">
                                @for ($i = $rating['starAVG']; $i >= 1; $i--)
                                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                                @endfor

                                @for ($i = $rating['starAVG']; $i <= 4; $i++)
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="rating-amount text-black-50 mt-2 mb-0 ml-2">{{$rating['amountOfRatings']}}</p>
                        @else
                            <div class="rating mt-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="rating-amount text-black-50 mt-2 mb-0 ml-2">0</p>
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-1"><span class="video-date text-black-50">{{ date_format($video->created_at, "F d Y")  }}</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>{{ $video->description }}</p>
                    </div>
                </div>
            </div>

            
                @include('components.video-comment-popup')
                <div class="row mt-3">
                    <div class="col-12">
                        <form action="">
                            <div class="add-comment-form">
                                <input type="hidden"  value="{{$video->id}}">
                                <div class="form-group">
                                    <input type="text" class="bg-light border-0 rounded-pill form-control pr-5" id="comment" placeholder="write a comment">
                                </div>
                                <button type="submit" class="add-comment border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>
                        
                        <div class="row">
                            <div class="col-6 col-md-4 text-center">
                                @auth
                                <form class="video-comment-form" method="post" enctype="multipart/form-data" action="">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <input type="hidden"  value="{{$video->id}}">
                                        <label for="video-comment" class="rounded-pill w-100 btn btn-primary">video comment</label>
                                        <input name="video-comment" id="video-comment" type="file" accept="video/*" class="d-none form-control">
                                    </div>
                                </form>
                                @endauth
                                @guest
                                <span class="rounded-pill w-100 btn btn-primary">video comment</span>
                                @endguest
                            </div>
                            <div class="col-4 col-md-4 text-center">
                                <a class="rounded-pill w-100 btn btn-tertiary" href="/course/{{$video->course_id}}/video/{{$video->id}}/ratings">ratings</a>
                            </div>
                            <div class="col-2 col-md-4 text-center">
                                <span class="d-md-none rounded-pill w-100 share-button  btn btn-primary"><i class="text-white fa fa-share-alt"></i></span>
                                <span class="d-none d-md-block rounded-pill w-100 share-button btn btn-quaternary">share this video</span>
                            </div>
                        </div>
                    </div>
                </div>
            

            <div class="row text-white mt-5 mb-5">
                <div class="col-12 comments-wrapper">
                    @include('components.comments', ['videoId' => $video->id])
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 offset-md-1">
            <p>Next video's:</p>
            @foreach($courseVideos as $courseVideo)
            @if($courseVideo->id != $video->id)
            <a href="
                @if($video->exclusive == 'y' && $subscriptionService->hasSubscription(Auth::id(), $video->course->user->id) || $video->course->user_id == Auth::id())
                    /course/{{$courseVideo->course_id}}/video/{{$courseVideo->id}}
                @elseif($video->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id)) 
                    /subscribe/{{ $user->id }} 
                @else 
                    /course/{{$courseVideo->course_id}}/video/{{$courseVideo->id}}
                @endif" 
                class="text-decoration-none row rounded bg-white my-3">
                <div class="col-5">
                    <div class="d-flex justify-content-center align-items-center w-100 tumbnail 
                        @if($courseVideo->exclusive == 'y' && $subscriptionService->hasSubscription(Auth::id(), $video->course->user->id))

                        @elseif($courseVideo->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id) && $video->course->user_id != Auth::id())
                            exclusive-tumbnail 
                        @endif" 
                        
                        style="background-image: url(/images/uploads/{{$courseVideo->tumbnail}});">
                        @if($courseVideo->exclusive == 'y' && !$subscriptionService->hasSubscription(Auth::id(), $video->course->user->id) && $subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id) && $video->course->user_id != Auth::id())
                        <span class="rounded-pill btn btn-unlock btn-secondary">unlock video</span>
                        @endif
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            @if($courseVideo->exclusive == 'y') 
                                @if($video->course->user_id == Auth::id())
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/unlocked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $video->title }}</p>
                                    </div>
                                @elseif($subscriptionService->hasSubscription(Auth::id(), $video->course->user->id))
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/unlocked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $courseVideo->title }}</p>
                                    </div>
                                @elseif($subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id))
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/locked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $courseVideo->title }}</p>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/unlocked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $courseVideo->title }}</p>
                                    </div>
                                @endif
                            @else 
                                <p class="mb-1">{{ $courseVideo->title }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1"><span class="course-username">{{ $courseVideo->course->user->name }}</span><span class="video-date-dot text-black-50">{{ date_format($courseVideo->created_at, "F d Y")  }}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                        @if(!empty($courseVideo->ratings))
                            <?php $rating = $ratingService->getAVG($courseVideo->id); ?>
                            <div class="rating">
                                @for ($i = $rating['starAVG']; $i >= 1; $i--)
                                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                                @endfor

                                @for ($i = $rating['starAVG']; $i <= 4; $i++) 
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="rating-amount text-black-50 mb-0 ml-2">{{$rating['amountOfRatings']}}</p>
                        @else
                            <div class="rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="rating-amount text-black-50 mb-0 ml-2">0</p>
                        @endif
                        
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>
@include('components.mobile-menu')
@endsection
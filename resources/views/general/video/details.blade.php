<?php 
    $ratingService = new App\Services\Rating();
    $subscriptionService = new App\Services\Subscription();
    $likeService = new App\Services\Like();
    $upvoteService = new App\Services\Upvote();
?>

@extends('layouts.app')

@section('meta')
    <title>Gava - {{ $video->title }}</title>
    <meta name="og:title" content="Gava - {{ $video->name }}">
@endsection

@section('playerjs')
<script src="https://cdn.plrjs.com/player/2si44sh83212a/2c1cnkurl0zy.js" type="text/javascript"></script>
@endsection

@section('content')
@include('components.menu')
@include('components.cancel-subscription-popup')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <a class="text-decoration-none" href="/profile/{{ $video->course->user->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-2">
                                <div style="background-image: url(/images/uploads/{{$video->course->user->profile_picture}});" class="subscriber-image rounded-circle"></div>
                            </div>
                            <div class="col-10">
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
                        <span class="report-video mr-5">
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
                    <div id="player"></div><script>
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
                            <p class="text-black-50 mt-2 mb-0 ml-2">({{$rating['amountOfRatings']}})</p>
                        @else
                            <div class="rating mt-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="text-black-50 mt-2 mb-0 ml-2">(0)</p>
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

            @auth
                <div class="row mt-3">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group">
                                <label class="d-none" for="comment">Comment</label>
                                <input type="email" class="bg-light border-0 rounded-pill form-control" id="comment" placeholder="write a comment">
                            </div>
                            <!--<button type="submit" class="rounded-pill btn btn-primary mb-2">verzenden</button>-->
                        </form>
                        <div class="row">
                            <div class="col-4 text-center">
                                <a class="rounded-pill w-100 btn btn-primary" href="">video comment</a>
                            </div>
                            <div class="col-4 text-center">
                                <a class="rounded-pill w-100 btn btn-primary" href="/course/{{$video->course_id}}/video/{{$video->id}}/ratings">video ratings</a>
                            </div>
                            <div class="col-4 text-center">
                                <a class="rounded-pill w-100 btn btn-primary" href="/course/{{$video->course_id}}/video/{{$video->id}}/ratings">share this video</a>
                            </div>
                        </div>

                        
                    </div>
                </div>
            @endauth

            <div class="row text-white mt-4 mb-5">
                <div class="col-12">
                    @foreach($comments as $comment)
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0">{{ $comment->user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0">{{ $comment->comment }}</p>
                        </div>
                    </div>
                    
                        @auth
                            <div class="row">
                                <p class="commentId" hidden>{{$comment->id}}</p>
                                <div class="col-8 d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <span class="upvote-comment"><img src="/images/upvote.svg" alt="Upvote icon"></span>
                                        <p class="upvote-amount mb-0 ml-2">{{ $upvoteService->getUpvoteAmount($comment->id) }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="like-comment"><img src="/images/like.svg" alt="Like icon"></span>
                                        <p class="like-amount mb-0 ml-2">{{ $likeService->getLikeAmount($comment->id) }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="like-comment"><img src="/images/text_comment.svg" alt="Text comment icon"></span>
                                        <p class="mb-0 ml-2">reply</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="like-comment"><img src="/images/video_comment.svg" alt="Video comment icon"></span>
                                        <p class="mb-0 ml-2">reply</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="report-comment"><img class="report-icon" src="/images/report.svg" alt="Report icon"></span>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 offset-md-1">
            <p>Next video's:</p>
            @foreach($courseVideos as $courseVideo)
            @if($courseVideo->id != $video->id)
            <a href="/course/{{$courseVideo->course_id}}/video/{{$courseVideo->id}}" class="text-decoration-none row rounded bg-white my-3">
                <div class="col-5">
                    <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail @if($courseVideo->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id)) exclusive-tumbnail @endif" style="background-image: url(/images/uploads/{{$courseVideo->tumbnail}});">
                        @if($courseVideo->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id))
                        <span class="rounded-pill btn btn-unlock btn-secondary">unlock video</span>
                        @endif
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            @if($courseVideo->exclusive == 'y') 
                                @if($subscriptionService->notSubsribedWhenVideoWasCreated($courseVideo->created_at, $video->course->user->id))
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
                        <div class="col-12 d-flex">
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
                            <p class="text-black-50 mb-0 ml-2">({{$rating['amountOfRatings']}})</p>
                        @else
                            <div class="rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>
                            <p class="text-black-50 mb-0 ml-2">(0)</p>
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
@endsection


<?php 
    $ratingService = new App\Services\Rating();
    $subscriptionService = new App\Services\Subscription();
?>

@extends('layouts.app')

@section('meta')
<title>Gava - {{ $course->title }}</title>
<meta name="og:title" content="Gava - {{ $course->name }}">
@endsection

@section('content')
@include('components.menu')
@include('components.cancel-subscription-popup')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="row d-flex align-items-center d-md-none mb-4">
                <div class="col-6">
                    <a href="/home">
                        <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                    </a>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="report-user">
                        <input type="hidden" value="{{$user->id}}" class="userId" name="userId">
                        <span><img class="report-icon" src="/images/report.svg" alt="Report"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="text-decoration-none" href="/profile/{{ $user->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-4 col-md-2">
                                @if(!empty($user))
                                <div style="background-image: url(/images/uploads/{{$user->profile_picture}});"
                                    class="subscriber-image rounded-circle"></div>
                                @else
                                <div style="background-image: url(/images/uploads/{{Auth::user()->profile_picture}});"
                                    class="subscriber-image rounded-circle"></div>
                                @endif
                            </div>
                            <div class="col-8 col-md-10">
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($user))
                                        <h4 class="font-weight-normal mb-1">{{ $user->name }}</h4>
                                        @else
                                        <h4 class="font-weight-normal mb-1">{{ Auth::user()->name }}</h4>
                                        @endif
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
                    <div class="d-none d-md-block report-user">
                        <input type="hidden" value="{{$user->id}}" class="userId" name="userId">
                        <span class="mr-5"><img class="report-icon" src="/images/report.svg" alt="Report"></span>
                    </div>
                    @if(in_array($user->id, $subscribersIds))
                    <form action="/subscribe/cancel/{{$user->id}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="creatorId" name="creatorId" value="{{$user->id}}">
                        <button class="cancel-subscription rounded-pill px-4 btn btn-secondary" type="submit">cancel subscription</button>
                    </form>
                    @else
                    <a href="/subscribe/{{ $user->id }}" class="rounded-pill px-4 btn btn-secondary">subscribe</a>
                    @endif
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12 d-flex">
                    <h2 class="font-weight-normal mb-0">{{ $course->title }}</h2>

                    @if($videos->count() >= 1)
                        @foreach($videos as $video)
                            @if($video->ratings != null)
                                <?php $Coursestars = round($video->ratings->avg('stars'),0); ?>
                            @endif
                        @endforeach

                        @if(!empty($Coursestars))
                        <div class="rating ml-4">
                            @for ($i = $Coursestars; $i >= 1; $i--)
                                <span class="star star-checked"><i class="fa fa-star"></i></span>
                            @endfor

                            @for ($i = $Coursestars; $i <= 4; $i++) 
                                <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                        @else
                        <div class="rating ml-4">
                            @for ($i = 5; $i >= 1; $i--)
                            <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                        @endif
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mb-3"><span class="course-date text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>{{ $course->description }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if(!empty($courseTags))
                    @foreach($courseTags as $courseTag)
                    <span class="tag rounded-pill px-3 ml-2">{{$courseTag->tag->name}}</span>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($videos as $video)
        <a href="
            @if($video->exclusive == 'y' && $subscriptionService->hasSubscription($user->id))
                /course/{{ $course->id }}/video/{{ $video->id }} 
            @elseif($video->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($video->created_at, $user->id)) 
                /subscribe/{{ $user->id }} 
            @else 
                /course/{{ $course->id }}/video/{{ $video->id }} 
            @endif
            " class="text-decoration-none col-12 col-md-6 rounded bg-white my-2">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail 
                        @if($video->exclusive == 'y' && $subscriptionService->hasSubscription($user->id))
                            
                        @elseif($video->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($video->created_at, $user->id)) 
                            exclusive-tumbnail 
                        @endif
                        " style="background-image: url(/images/uploads/{{$video->tumbnail}});">

                        @if($video->exclusive == 'y' && !$subscriptionService->hasSubscription($user->id) && $subscriptionService->notSubsribedWhenVideoWasCreated($video->created_at, $user->id))
                        <span class="rounded-pill btn btn-unlock btn-secondary">unlock video</span>
                        
                        @endif
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            @if($video->exclusive == 'y') 
                                @if($subscriptionService->hasSubscription($user->id))
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/unlocked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $video->title }}</p>
                                    </div>
                                @elseif($subscriptionService->notSubsribedWhenVideoWasCreated($video->created_at, $user->id))
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/locked.svg" alt="locked icon">
                                        <p class="ml-2 mb-0">{{ $video->title }}</p>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center mb-1">
                                        <img class="lock" src="/images/unlocked.svg" alt="unlocked icon">
                                        <p class="ml-2 mb-0">{{ $video->title }}</p>
                                    </div>
                                @endif
                            @else 
                                <p class="mb-1">{{ $video->title }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="video-date-dot text-black-50">{{ date_format($video->created_at, "F d Y")  }}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex">
                            @if(!empty($video->ratings))
                            <?php $rating = $ratingService->getAVG($video->id); ?>

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
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
<?php 
    $videoService   = new App\Services\Video(); 
    $ratingService  = new App\Services\Rating();
    $subscriptionService = new App\Services\Subscription();
    $userReportService = new App\Services\UserReport();
?>

@extends('layouts.app')

@section('meta')
@if(!empty($user))
<title>Gava - {{ $user->name }}</title>
<meta name="og:title" content="Gava - {{ $user->name }}">
@else
<title>Gava - Profile</title>
<meta name="og:title" content="Gava - {{ Auth::user()->name }}">
@endif
@endsection

@section('content')
@include('components.menu')
@include('components.cancel-subscription-popup')
@include('components.report-popup')
<div class="profile-bg">
    <div class="container">
        <div class="row">
            <div class="col-6 mt-4">
                @if(!empty($user))
                <a href="{{ url()->previous() }}">
                    <img class="arrow-icon" src="/images/arrow_back_white.svg" alt="Settings icon">
                </a>
                @endif
            </div>
            <div class="col-6 mt-4 d-flex justify-content-end">
                @if(empty($user))
                <a href="/profile/edit">
                    <img class="setting-icon mr-3" src="/images/settings.png" alt="Settings icon">
                </a>
                @else
                <span class="@if($userReportService->hasAlready($user->id, Auth::id()) > 0) reported @endif report-user">
                    <input type="hidden" value="{{$user->id}}" class="userId" name="userId">
                    <img class="report-icon-profile mr-md-3" src="/images/report_white.png" alt="Report icon">
                </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container profile-content mt-md-0 pb-5 mb-5">
    <div class="row my-4">
        <div class="col-12">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <div class="row d-flex align-items-center">
                        <div class="d-flex justify-content-center col-md-3">
                            @if(!empty($user))
                            <div style="background-image: url(/images/uploads/{{$user->profile_picture}});"
                                class="profile-image rounded-circle"></div>
                            @else
                            <div style="background-image: url(/images/uploads/{{Auth::user()->profile_picture}});"
                                class="profile-image rounded-circle"></div>
                            @endif
                        </div>
                        <div class="col-md-9 text-center text-md-left">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center justify-content-md-start mt-3 mt-md-0">
                                    @if(!empty($user))
                                        <div class="d-flex">
                                            <h2 class="profile_user_name">{{ $user->name }}</h2>
                                            @if($subscriptionService->checkIfSubscribed($user->id))
                                                <img class="premium_profile_icon ml-4 mb-2" src="/images/premium_darkblue.svg" alt="Premium icon">
                                            @endif
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <h2 class="profile_user_name">{{ Auth::user()->name }}</h2>        
                                            @if($subscriptionService->checkIfSubscribed(Auth::id()))
                                                <img class="premium_profile_icon ml-4 mb-2" src="/images/premium_darkblue.svg" alt="Premium icon">
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mt-1 mt-md-0">
                                    @if($subscribersAmount == 1)
                                    <h6 class="d-none d-md-block font-weight-normal">{{ $subscribersAmount }} subscriber</h6>
                                    @if(empty($user))
                                    <a class="link subscribers-link text-decoration-none d-md-none" href="/profile/{{Auth::id()}}/subscribers">{{ $subscribersAmount }} subscriber</a>
                                    @else
                                    <a class="link subscribers-link text-decoration-none d-md-none" href="/profile/{{$user->id}}/subscribers">{{ $subscribersAmount }} subscriber</a>
                                    @endif

                                    @elseif($subscribersAmount == 0)
                                    <h6 class="font-weight-normal">{{ $subscribersAmount }} subscribers yet</h6>
                                    @else
                                    <h6 class="d-none d-md-block font-weight-normal">{{ $subscribersAmount }} subscribers</h6>
                                    @if(empty($user))
                                    <a class="link subscribers-link text-decoration-none d-md-none" href="/profile/{{Auth::id()}}/subscribers">{{ $subscribersAmount }} subscribers</a>
                                    @else
                                    <a class="link subscribers-link text-decoration-none d-md-none" href="/profile/{{$user->id}}/subscribers">{{ $subscribersAmount }} subscribers</a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">
                    @if(!empty($user))
                    @if(in_array($user->id, $subscribersIds))
                    <form action="/subscribe/cancel/{{$user->id}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="creatorId" name="creatorId" value="{{$user->id}}">
                        <button class="cancel-subscription rounded-pill px-5 btn btn-secondary" type="submit">cancel subscription</button>
                    </form>
                    @else
                    <a href="/subscribe/{{ $user->id }}" class="rounded-pill px-5 btn btn-secondary">subscribe</a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-md-3">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-normal">Courses</h2>
                </div>
            </div>
            @if($courses->count() > 0)
            @foreach($courses as $course)
            <a href="/course/{{ $course->id }}" class="text-decoration-none">
                <div class="row my-2 d-flex align-items-center">
                    <div class="col-5 col-md-3">
                        <div class="d-flex justify-content-center align-items-center w-100 tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                    </div>
                    <div class="col-7 col-md-9">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1">{{ $course->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                                <p class="mb-0 course-video-amount text-black-50">
                                    {{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                                @else
                                <p class="mb-0 course-video-amount text-black-50">
                                    {{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
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
            @endforeach
            @else
                <p class="text-black-50">No courses yet</p>
            @endif
        </div>
        <div class="d-none d-md-block col-12 col-md-4 mt-4 mt-md-0">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-normal">Subscribers</h2>
                </div>
            </div>

            @if(!empty($subscriptions)) 

            @foreach($subscriptions as $subscription)
            
            @if($subscription->user_id != Auth::id())
            
            @if($subscription['status'] == "online")

            <a href="/profile/{{ $subscription->user_id }}" class="text-decoration-none">
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-3">
                        <div style="background-image: url(/images/uploads/{{$subscription->user->profile_picture}});"
                            class="subscriber-image rounded-circle"></div>
                    </div>
                    <div class="col-8">
                        <p class="mb-0">{{ $subscription->user['name'] }}</p>
                    </div>
                </div>
            </a>
            @endif

            @else
            @if($subscription['status'] == "online")
            <div>
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-3">
                        <div style="background-image: url(/images/uploads/{{$subscription->user->profile_picture}});"
                            class="subscriber-image rounded-circle"></div>
                    </div>
                    <div class="col-8">
                        <p class="mb-0">{{ $subscription->user['name'] }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach

            @else
            <p class="text-black-50">No subscribers yet</p>
            @endif
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection
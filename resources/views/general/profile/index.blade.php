<?php $videoService = new App\Services\Video(); ?>

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
<div class="container-fluid profile-bg">
    <div class="row">
        <div class="col-11 mt-4 d-flex justify-content-end">
            @if(empty($user))
            <a href="/profile/edit">
                <img src="/images/settings.png" alt="Settings icon">
            </a>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                            @if(!empty($user))
                            <img class="w-100 rounded-circle" src="/images/uploads/{{$user->profile_picture}}" alt="Profile picture">
                            @else
                            <img class="w-100 rounded-circle" src="/images/uploads/{{Auth::user()->profile_picture}}" alt="Profile picture">
                            @endif
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    @if(!empty($user))
                                    <p>{{ $user->name }}</p>
                                    @else
                                    <p>{{ Auth::user()->name }}</p>
                                    @endif
                                </div>
                                <div class="col-12">
                                    @if($subscribersAmount == 1)
                                    <p>{{ $subscribersAmount }} subscriber</p>
                                    @elseif($subscribersAmount == 0)
                                    <p>{{ $subscribersAmount }} subscribers yet</p>
                                    @else
                                    <p>{{ $subscribersAmount }} subscribers</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    @if(!empty($user))
                        <a href="/subscribe/{{ $user->id }}" class="rounded-pill px-5 btn btn-secondary">subscribe</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                    <h3>Courses</h3>
                </div>
            </div>
            @foreach($courses as $course)
            <a href="/course/{{ $course->id }}">
                <div class="row my-2">
                    <div class="col-3">
                        <img class="w-100" src="/images/uploads/{{$course->tumbnail}}" alt="Course tumbnail">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $course->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-12">
                    <h3>Subscribers</h3>
                </div>
            </div>
            
            @if(!empty($subscriptions))
            @foreach($subscriptions as $subscription)
            <a href="/profile/{{ $subscription->user_id }}">
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-3">
                        <img class="w-100 rounded-circle" src="/images/uploads/{{$subscription->user->profile_picture}}" alt="Profile picture">
                    </div>
                    <div class="col-8">
                        <p>{{ $subscription->user['name'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
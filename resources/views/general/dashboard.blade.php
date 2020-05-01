<?php $videoService = new App\Services\Video(); ?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row my-4">
                <div class="col-5 offset-4">
                    <span id="my-courses" class="ml-5 border rounded-pill btn btn-primary active">my courses</span>
                    <span id="my-statistics" class="ml-1 border rounded-pill btn btn-primary non-active">my statistics</span>
                </div>
                <div class="col-3 text-right">
                    <a id="add-course" class="border rounded-pill btn btn-primary" href="/course/add">create new course</a>
                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container" id="myCoursesContainer">
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
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-2">
                        <img class="w-100 rounded" src="/images/uploads/{{ $course->tumbnail }}" alt="Course tumbnail">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1">{{ $course->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <a class="rounded-pill px-3 mr-5 btn btn-primary" href="/course/edit/{{ $course->id }}"><i class="text-white mr-2 fa fa-pencil" aria-hidden="true"></i>edit</a> 
                        <form action="/course/delete/{{ $course->id }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="courseId" name="courseId" value="{{$course->id}}">
                            <button class="delete-btn rounded-pill px-3 btn btn-primary" type="submit"><i class="text-white mr-2 fa fa-trash" aria-hidden="true"></i>delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
      

<div id="myStatisticsContainer" class="container d-none">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <p>Views</p>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-12">

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <p>Revenue</p>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Subscribers</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>{{ $subscribersAmount }}</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Revenue</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $subscribersAmount * 8 }}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Courses</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $coursesAmount }}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Views</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <p>Subscribers</p>
                </div>
            </div>

            <div class="row">
                @foreach($subscriptions as $subscription)
                <div class="col-12 col-md-6">
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
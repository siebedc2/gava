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
                <div class="row my-3">
                    <div class="col-2">
                        <img class="rounded col-12" src="/images/uploads/{{ $course->tumbnail }}" alt="Course tumbnail">
                    </div>
                    <div class="col-6">
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
                    <div class="col-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="rounded-pill px-5 btn btn-primary" href="/course/edit/{{ $course->id }}">edit</a> 
                            </div>
                            <div class="col-md-6">
                                <form action="/course/delete/{{ $course->id }}" method="post">
                                    {{csrf_field()}}
                                    <button class="rounded-pill px-5 btn btn-primary" type="submit">delete</button>
                                </form>
                            </div>
                        </div>
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
                    <a href="/profile/{{ $subscription->user_id }}">
                        <div class="row">
                            <div class="col-4">
                                <img src="" alt="">
                            </div>
                            <div class="col-8">
                                <p>{{ $subscription->user['name'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
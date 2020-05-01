@extends('layouts.app')

@section('meta')
    <title>Gava - {{ $course->title }}</title>
    <meta name="og:title" content="Gava - {{ $course->name }}">
@endsection

@section('content')
@include('components.menu')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <a class="text-decoration-none" href="/profile/{{ $user->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-2">
                                

                                @if(!empty($user))
                                <div style="background-image: url(/images/uploads/{{$user->profile_picture}});" class="subscriber-image rounded-circle"></div>
                                @else
                                <div style="background-image: url(/images/uploads/{{Auth::user()->profile_picture}});" class="subscriber-image rounded-circle"></div>
                                @endif
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($user))
                                        <h4 class="mb-1">{{ $user->name }}</h4>
                                        @else
                                        <h4 class="mb-1">{{ Auth::user()->name }}</h4>
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
                        <span class="mr-5"><img src="/images/report.png" alt="Report"></span>
                        <a href="/subscribe/{{ $user->id }}" class="rounded-pill px-5 btn btn-secondary">subscribe</a>
                    </div>  
                    @endif
                @endif 
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h2>{{ $course->title }}</h2>
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mb-1"><span class="course-date text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>{{ $course->description }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($videos as $video)
            <a href="/course/{{ $course->id }}/video/{{ $video->id }}" class="text-decoration-none col-12 col-md-6 rounded bg-white my-2">
                <div class="row">
                    <div class="col-4">
                        <img class="w-100 rounded" src="/images/uploads/{{$video->tumbnail}}" alt="Tumbnail">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1">{{ $video->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="video-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                            
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>   
</div>
@endsection
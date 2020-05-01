@extends('layouts.app')

@section('meta')
    <title>Gava - {{ $video->title }}</title>
    <meta name="og:title" content="Gava - {{ $video->name }}">
@endsection

@section('content')
@include('components.menu')
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
                                        <h4 class="mb-1">{{ $video->course->user->name }}</h4>
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
                        <a href="/subscribe/{{ $course->user_id }}" class="rounded-pill px-5 btn btn-secondary">subscribe</a>
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
                    <iframe height="300px" width="100%" src="/images/uploads/{{ $video->video }}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="video-information border-bottom text-white">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h3>{{ $video->title }}</h3>
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
                            <div class="col-6 text-center">
                                <a class="rounded-pill w-100 btn btn-primary" href="">post video comment</a>
                            </div>
                            <div class="col-6 text-center">
                                <a class="rounded-pill w-100 btn btn-primary" href="">video ratings</a>
                            </div>
                        </div>

                        
                    </div>
                </div>
            @endauth

            <div class="row text-white">
                <div class="col-12">
                    @foreach($comments as $comment)
                    <div class="row">
                        <div class="col-12">
                            <p>{{ $comment->user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                    
                        @auth
                            <div class="row">
                                <div class="col-3">
                                    <span>Like</span>
                                </div>
                                <div class="col-3">
                                    <span>Upvote</span>
                                </div>
                                <div class="col-3">
                                    <span>Reply</span>
                                </div>
                                <div class="col-3">
                                    <span>Report</span>
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
                    <img src="/images/uploads/{{$courseVideo->tumbnail}}" alt="Tumbnail" class="w-100 rounded">
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1">{{ $courseVideo->title }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="course-username">{{$courseVideo->course->user->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            
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
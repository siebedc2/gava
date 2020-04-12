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
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                            <img class="w-100 rounded-circle" src="/images/uploads/{{$video->course->user->profile_picture}}" alt="">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ $video->course->user->name }}</p>
                                </div>
                                <div class="col-12">
                                    @if($subscribersAmount == 1)
                                        <p>{{ $subscribersAmount }} subscriber</p>
                                    @else
                                        <p>{{ $subscribersAmount }} subscribers</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <a href="">
                                    <img src="/images/report.png" alt="Report">
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="" class="rounded-pill px-5 btn btn-secondary">subscribe</a>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="row">
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
                <div class="row">
                    <div class="col-12">
                        <p>{{ $video->title }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>{{ $video->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Dit zijn tags</p>
                    </div>
                </div>
            </div>

            @auth
                <div class="row mt-3">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group">
                                <label class="d-none" for="comment">Comment</label>
                                <input type="email" class="bg-light border-0 rounded-pill form-control" id="comment" placeholder="add comment">
                            </div>
                            <button type="submit" class="rounded-pill btn btn-primary mb-2">verzenden</button>
                        </form>

                        <a href="">video ratings</a>
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
            @foreach($courseVideos as $courseVideo)
            @if($courseVideo->id != $video->id)
            <a href="/course/{{$courseVideo->course_id}}/video/{{$courseVideo->id}}" class="row rounded bg-white">
                <div class="col-4">
                    <img src="/images/uploads/{{$courseVideo->tumbnail}}" alt="Tumbnail" class="w-100 rounded">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h3>{{$courseVideo->title}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{$courseVideo->course->user->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{$courseVideo->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit zijn tags</p>
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
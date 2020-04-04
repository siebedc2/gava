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
                            <div style="background-color:black; height:100px; width: 100px;" class="rounded-circle"></div>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    
                                </div>
                                <div class="col-12">
                                    
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
                    <iframe width="100%" src="/images/uploads/{{ $video->video }}" frameborder="0"
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
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group">
                                <label class="d-none" for="exampleFormControlInput1">Comment</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="add comment">
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
            <a href="" class="row rounded bg-white">
                <div class="col-4">
                    <div class="row">
                        <div class="rounded col-12 video-image"></div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h3>Dit is een titel</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit is een creator</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit is een beschrijving</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit zijn tags</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
@endsection
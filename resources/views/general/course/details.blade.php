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
                    <a href="/profile/{{ $user->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-3">
                                <div style="background-color:black; height:100px; width: 100px;" class="rounded-circle"></div>
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
                                        @else
                                            <p>{{ $subscribersAmount }} subscribers</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
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
            </div>
        </div>
    </div>

    <div class="row">
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
            <a href="/course/{{ $course->id }}/video/{{ $video->id }}" class="col-12 col-md-6 rounded bg-white my-2">
                <div class="row">
                    <div class="col-4">
                        <div class="rounded col-12 video-image"></div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $video->title }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $course->user->name }}</p>
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
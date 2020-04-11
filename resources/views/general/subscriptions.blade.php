@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row my-4">
                <div class="col-12 d-flex justify-content-center">
                    <span id="courses" class="border rounded-pill btn btn-primary active">courses</span>
                    <span id="creators" class="ml-2 border rounded-pill btn btn-primary non-active">creators</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="coursesContainer" class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($courses as $course)
                @if(in_array($course->user_id, $subscribersIds))
                <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white my-2">
                    <div class="row">
                        <div class="col-4">
                            <img src="/images/uploads/{{$course->tumbnail}}" alt="Tumbnail">
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ $course->title }}</p>
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
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="creatorsContainer" class="d-none container">
    <div class="row">
        @foreach($creators as $creator)
        <div class="col-12 col-md-6">
            <div class="row d-flex align-items-center">
                <div class="col-2">
                    <img class="w-100 rounded-circle" src="images/uploads/{{$creator->creator->profile_picture}}" alt="">
                </div>
                <div class="col-5">
                    <p>{{ $creator->creator->name }}</p>
                </div>
                <div class="col-5">
                    <span class="btn btn-primary rounded-pill">cancel subsription</span>
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12">
            <div class="row my-5">
                <div class="col-12">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <input type="text" class="rounded-pill border-0 bg-light form-control" placeholder="Search">
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option>Filter on technologies</option>
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option value="new">New</option>
                                    <option value="old">Old</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" class="rounded-pill border-0 bg-light form-control" placeholder="Minimum rating">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach($courses as $course)
                    @auth
                        @if($course->user_id != Auth::user()->id)
                            <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="rounded col-12 video-image"></div>
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
                    @endauth

                    @guest
                        <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white my-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="rounded col-12 video-image"></div>
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
                    @endguest
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
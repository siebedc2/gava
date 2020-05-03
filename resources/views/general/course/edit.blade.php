@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="row mt-4">
                    <div class="col-4">
                        <a href="/dashboard">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h2>Edit course</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">save</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="title" class="d-none">Email address</label>
                            <input name="title" type="text" class="border-0 bg-light rounded-pill form-control"
                                id="title" value="{{ $course->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="d-none">Example textarea</label>
                            <textarea name="description" class="border-0 bg-light form-control" id="description"
                                rows="3">{{ $course->description }}</textarea>
                        </div>
                        <div class="form-group mt-5">
                            <label for="tumbnail">change custom thumbnail</label>
                            <input name="tumbnail" type="file" class="border-0 bg-light rounded-pill form-control" id="tumbnail">
                        </div>
                        <div class="tumbnail-preview">
                            <img src="{{asset('images/uploads/' . $course->tumbnail)}}" alt="Tumbnail preview">
                        </div>
                    </div>
                    <div class="col-12 col-md-5 offset-md-1">
                        <a href="/course/{{ $courseId }}/video/add">Video toevoegen</a>
                        @foreach($videos as $video)
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $video->title }}</p>
                                <a class="rounded-pill px-5 btn btn-primary"
                                    href="/course/{{ $video->course_id }}/video/edit/{{ $video->id }}">Video
                                    editen</a>
                                <form action="/course/{{ $course->id }}/video/delete/{{ $video->id }}" method="post">
                                    {{csrf_field()}}
                                    <button class="rounded-pill px-5 btn btn-primary" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if ($errors->any())
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
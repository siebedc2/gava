@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <p>Edit course</p>
        </div>
        <div class="col-4">

        </div>
    </div>

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
        <div class="col-12 col-md-5">
            <form enctype="multipart/form-data" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Email address</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $course->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Example textarea</label>
                    <textarea name="description"  class="form-control" id="description" rows="3">{{ $course->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-12 col-md-5 offset-md-1">
            <a href="/course/{{ $courseId }}/video/add">Video toevoegen</a>
            @foreach($videos as $video)
            <div class="row">
                <p>{{ $video->title }}</p>
                <a href="/course/{{ $video->course_id }}/video/edit/{{ $video->id }}">Video editen</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
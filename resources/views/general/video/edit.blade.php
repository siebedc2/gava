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
                        <a href="{{ URL::previous() }}">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h2>Edit video</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">save</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="d-none" for="title">Email address</label>
                            <input name="title" type="text" class="bg-light border-0 rounded-pill form-control" id="title" value="{{ $video->title }}">
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="description">Example textarea</label>
                            <textarea name="description"  class="bg-light border-0 form-control" id="description" rows="3">{{ $video->description }}</textarea>
                        </div>
                        <div class="form-group form-check">
                            <input name="exclusive" type="checkbox" class="form-check-input" id="exclusive" value="{{ $video->exclusive }}">
                            <label for="exclusive" class="form-check-label">make this video exclusive to my subscribers</label>
                        </div>
                        <div class="form-group">
                            <label for="tumbnail">upload costum tumbnail</label>
                            <input name="tumbnail" type="file" class="form-control-file" id="tumbnail" value="/images/uploads/{{ $video->video }}">
                        </div>
                        <div class="tumbnail-preview">
                            <img src="{{asset('images/uploads/' . $video->tumbnail)}}" alt="Tumbnail preview">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="form-group">
                            <label for="video">Select file</label>
                            <input name="video" type="file" class="form-control-file" id="video">
                        </div>
                        <div class="video-preview">
                            <iframe height="280px" width="100%" src="/images/uploads/{{ $video->video }}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
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
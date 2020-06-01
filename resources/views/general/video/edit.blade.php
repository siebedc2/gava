@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="row mt-4">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ URL::previous() }}">
                            <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <h2 class="font-weight-normal mb-0">Edit video</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">save</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="d-none" for="title">Email address</label>
                            <input name="title" type="text" class="bg-light border-0 rounded-pill form-control" id="title" value="{{ $video['title'] }}">
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="description">Example textarea</label>
                            <textarea name="description"  class="bg-light border-0 form-control" id="description" rows="3">{{ $video['description'] }}</textarea>
                        </div>
                        <div class="form-group form-check pl-0">
                            <input name="exclusive" type="checkbox" class="form-check-input" id="exclusive" value="y" @if($video['exclusive'] == "y") checked @endif>
                            <label for="exclusive" class="form-check-label">make this video exclusive to my subscribers</label>
                        </div>
                        <div class="form-group mt-4 text-center text-md-left">
                            <label class="d-md-none rounded-pill btn btn-primary" for="tumbnail">change custom thumbnail</label>
                            <label class="d-none d-md-block" for="tumbnail">Change custom thumbnail</label>
                            <p class="d-md-none my-2 edit-tumbnail">{{ $video['tumbnail'] }}</p> 
                            <label class="d-block w-50" for="tumbnail">   
                                <div class="d-none d-md-flex justify-content-center align-items-center w-100 rounded tumbnail edit-tumbnail" style="background-image: url(/images/uploads/{{$video['tumbnail']}});">
                                    <i class="text-white fa fa-pencil" aria-hidden="true"></i>
                                </div>
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file position-static" id="tumbnail">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1 text-center text-md-left">
                        <div class="form-group">
                            <label class="d-md-none rounded-pill btn btn-primary" for="video">select file</label>
                            <label class="d-none d-md-block" for="video">Select file</label>
                            <p class="d-md-none my-2">{{ $video['video'] }}</p> 
                            <label for="video" class="video-preview d-none d-md-block"> 
                                <video class="w-100" loop autoplay muted>
                                    <source id="video-source" src="/images/uploads/{{ $video['video'] }}" type="video/mp4">    
                                </video>
                                <div class="layer d-flex justify-content-center align-items-center">
                                    <i class="text-white fa fa-pencil" aria-hidden="true"></i>
                                </div>
                            </label>
                            <input name="video" type="file" class="form-control-file position-static" id="video" value="{{ $video['video'] }}">
                        </div>
                        @if ($errors->any())
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert text-center">
                                        @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
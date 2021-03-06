@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="row mt-4">
                    <div class="col-3 col-md-4 d-flex align-items-center">
                        <a href="{{ URL::previous() }}">
                            <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
                        <h2 class="font-weight-normal mb-0">Add video</h2>
                    </div>
                    <div class="col-3 col-md-4 text-right">
                        <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">upload</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="d-none" for="title">Email address</label>
                            <input name="title" type="text" class="bg-light border-0 rounded-pill form-control" id="title" placeholder="Video title">
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="description">Example textarea</label>
                            <textarea name="description"  class="bg-light border-0 form-control" id="description" rows="3" placeholder="What is this video about?"></textarea>
                        </div>
                        <div class="form-group form-check pl-0">
                            <input name="exclusive" type="checkbox" class="form-check-input" id="exclusive" value="y">
                            <label for="exclusive" class="form-check-label">make this video exclusive to my subscribers</label>
                        </div>
                        <div class="form-group mt-4 text-center text-md-left">
                            <label class="d-md-none rounded-pill btn btn-primary" for="tumbnail">upload custom thumbnail</label>
                            <label class="d-none d-md-block" for="tumbnail">Upload custom thumbnail</label>
                            <p class="d-md-none my-2 edit-tumbnail"></p> 
                            <label class="d-none w-50 add-btn d-md-flex justify-content-center align-items-center edit-tumbnail" for="tumbnail">
                                <img class="add-icon" src="/images/add.svg" alt="Add icon">
                                <i class="d-none text-white fa fa-pencil" aria-hidden="true"></i>
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file position-static" id="tumbnail">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="form-group text-center text-md-left">
                            <label class="d-md-none rounded-pill btn btn-primary" for="video">select file</label>
                            <label class="d-none d-md-block" for="video">Select file</label>
                            <p class="d-md-none my-2 edit-video"></p>
                            <label class="d-none w-100 add-btn d-md-flex justify-content-center align-items-center edit-video" for="video">
                                <img src="/images/add.svg" alt="Add icon">
                            </label>
                            <label for="video" class="video-preview d-none d-md-none"> 
                                <video class="w-100" loop autoplay muted>
                                    <source id="video-source" src="" type="video/mp4">    
                                </video>
                                <div class="layer d-flex justify-content-center align-items-center">
                                    <i class="text-white fa fa-pencil" aria-hidden="true"></i>
                                </div>
                            </label>
                            <input name="video" type="file" class="form-control-file position-static" id="video">
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
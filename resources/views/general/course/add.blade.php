@extends('layouts.app')

@section('extra-css')
<!--<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">-->
@endsection

@section('content')
@include('components.menu')
@include('components.delete-video-popup')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="row mt-4">
                    <div class="col-3 col-md-4 d-flex align-items-center">
                        <a href="/dashboard">
                            <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
                        <h2 class="font-weight-normal mb-0">Add course</h2>
                    </div>
                    <div class="col-3 col-md-4 text-right">
                        <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">publish</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="title" class="d-none">Email address</label>
                            <input name="title" type="text" class="border-0 bg-light rounded-pill form-control" id="title" placeholder="Course title" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="d-none">Example textarea</label>
                            <textarea name="description" class="border-0 bg-light form-control" id="description" rows="3" placeholder="What is this course about?" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="d-none">Example select</label>
                            <select name="tags[]" data-placeholder="What technologies is this about?" class="border-0 bg-light rounded-pill form-control" id="tags" multiple="multiple" required>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5 text-center text-md-left">
                            <label class="d-md-none rounded-pill btn btn-primary" for="tumbnail">upload custom thumbnail</label>
                            <label class="d-none d-md-block" for="tumbnail">Upload custom thumbnail</label>
                            <p class="d-md-none my-2 edit-tumbnail"></p> 
                            <label class="d-none w-50 add-btn d-md-flex justify-content-center align-items-center edit-tumbnail" for="tumbnail">
                                <img class="add-icon" src="/images/add.svg" alt="Add icon">
                                <i class="d-none text-white fa fa-pencil" aria-hidden="true"></i>
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file position-static" id="tumbnail" required>
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

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="d-md-none">
                            <div class="row">
                                <div class="col-12 add-video-col text-center">
                                    <a href="/course/video/add" class="rounded-pill px-md-5 btn btn-primary">add new video to course</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-md-block">
                            <div class="row d-none d-md-flex">
                                <div class="col-12">
                                    <p>Upload video</p>
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
                            <div class="row d-none d-md-flex">
                                <a class="col-12 text-decoration-none" href="/course/video/add">
                                    <div class="add-btn d-flex align-items-center justify-content-center">
                                        <img src="/images/add.svg" alt="Add icon">
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if(!empty($videos ?? ''))
                        @foreach($videos as $video)
                        <div class="row mt-3 d-flex align-items-center videos-preview">
                            <div class="col-5">
                                <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail" style="background-image: url(/images/uploads/{{$video['tumbnail']}});"></div>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-1">{{ $video['title'] }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <span class="star"><i class="fa fa-star"></i></span>
                                            @endfor
                                        </div>
                                        <p class="rating-amount ml-2 text-black-50">0</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 d-flex align-self-start align-self-md-center justify-content-end d-md-none">
                                <input type="hidden" value="{{ \Route::current()->parameter('id') }}">
                                <input type="hidden" value="{{ $video['id'] }}">
                                <span class="d-md-none mobile-video-options"><img src="/images/mobile-options.svg" alt="Options icon"></span>
                            </div>

                            <div class="d-none d-md-block col-1 mb-4">
                                <a href="/course/video/edit/{{ $video['id'] }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>

                            <div class="d-none d-md-block col-1 mb-4">
                                <input type="hidden" value="{{ \Route::current()->parameter('id') }}">
                                <input type="hidden" value="{{ $video['id'] }}">
                                <span class="delete-video"><i class="fa fa-trash" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('components.video-options-menu')
</div>
@include('components.mobile-menu')
@endsection

@section('extra-js')
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
@endsection
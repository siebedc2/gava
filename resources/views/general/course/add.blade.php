@extends('layouts.app')

@section('extra-css')
<!--<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">-->
@endsection

@section('content')
@include('components.menu')
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
                            <label class="d-none w-50 add-btn d-md-flex justify-content-center align-items-center" for="tumbnail">
                                <img src="/images/add.svg" alt="Add icon">
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file position-static" id="tumbnail" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="d-md-none">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="/course/video/add" class="rounded-pill px-md-5 btn btn-primary">add new video to course</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-md-block">
                            <div class="row">
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
                            <div class="row">
                                <a class="col-12 text-decoration-none" href="/course/video/add">
                                    <div class="add-btn d-flex align-items-center justify-content-center">
                                        <img src="/images/add.svg" alt="Add icon">
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if(!empty($videos ?? ''))
                            @foreach($videos as $video)
                            <div class="row mt-3 d-flex align-items-center">
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
                                    <div class="col-12">
                                        <div class="rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <span class="star"><i class="fa fa-star"></i></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
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

@section('extra-js')
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
@endsection
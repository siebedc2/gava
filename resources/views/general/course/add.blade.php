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
                        <h2>Add course</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">publish</button>
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
                            <select name="tags" class="border-0 bg-light rounded-pill form-control" id="tags" required>
                                <option disabled selected>What technologies is this about?</option>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label for="tumbnail">Upload custom thumbnail</label>
                            <label class="d-block w-50 add-btn d-flex justify-content-center align-items-center" for="tumbnail">
                                <img src="/images/add.svg" alt="Add icon">
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file" id="tumbnail">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
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
                                    <!--<p class="mb-0">+</p>-->
                                    <img src="/images/add.svg" alt="Add icon">
                                </div>
                            </a>
                        </div>
                        <div class="row">
                            @if(!empty($videos ?? ''))
                                @foreach($videos as $video)
                                    <div class="col-12">
                                        <p>{{ $video['title'] }}</p>
                                    </div>
                                @endforeach
                            @endif
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
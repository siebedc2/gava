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
                            <input name="title" type="text" class="border-0 bg-light rounded-pill form-control" id="title" placeholder="Course title">
                        </div>
                        <div class="form-group">
                            <label for="description" class="d-none">Example textarea</label>
                            <textarea name="description" class="border-0 bg-light form-control" id="description" rows="3" placeholder="What is this course about?"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="d-none">Example select</label>
                            <select name="tags" class="border-0 bg-light rounded-pill form-control" id="exampleFormControlSelect1">
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tumbnail" class="d-none">Email address</label>
                            <input name="tumbnail" type="file" class="form-control" id="title" placeholder="Course title">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="row">
                            <div class="col-12">
                                <p>Upload video</p>
                            </div>
                        </div>    
                        <div class="row ">
                            <a class="" href="">
                                <div class="col-12 add-btn">
                                    <p>+</p>
                                </div>
                            </a>
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
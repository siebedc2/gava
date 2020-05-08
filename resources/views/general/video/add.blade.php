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
                        <h2 class="font-weight-normal">Add video</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">upload</button>
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
                        <div class="form-group form-check">
                            <input name="exclusive" type="checkbox" class="form-check-input" id="exclusive" value="y">
                            <label for="exclusive" class="form-check-label">make this video exclusive to my subscribers</label>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tumbnail">Upload custom thumbnail</label>
                            <label class="d-block w-50 add-btn d-flex justify-content-center align-items-center" for="tumbnail">
                                <img src="/images/add.svg" alt="Add icon">
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file" id="tumbnail">
                        </div>
                    </div>

                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="form-group">                            
                            <label for="video">Select file</label>
                            <label class="d-block w-100 add-btn d-flex justify-content-center align-items-center" for="video">
                                <img src="/images/add.svg" alt="Add icon">
                            </label>
                            <input name="video" type="file" class="form-control-file" id="video">
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
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
                        <h2 class="font-weight-normal">Edit course</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-4 btn btn-primary">save</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="title" class="d-none">Email address</label>
                            <input name="title" type="text" class="border-0 bg-light rounded-pill form-control" id="title" value="{{ $course->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="d-none">Example textarea</label>
                            <textarea name="description" class="border-0 bg-light form-control" id="description" rows="3" required>{{ $course->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="d-none">Example select</label>
                            <select name="tags[]" data-placeholder="What technologies is this about?" class="border-0 bg-light rounded-pill form-control" id="tags" multiple="multiple" required>
                                @foreach($tags as $tag)
                                    @if(in_array($tag->id, $courseTagIds))
                                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @else
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label for="tumbnail">Change custom thumbnail</label>
                            <label class="d-block w-50" for="tumbnail">
                                <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail edit-tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});">
                                    <i class="text-white fa fa-pencil" aria-hidden="true"></i>
                                </div>
                            </label>
                            <input name="tumbnail" type="file" class="form-control-file" id="tumbnail">
                        </div>
                    </div>
                    <div class="col-12 col-md-5 offset-md-1">
                        <div class="row">
                            <div class="col-12">
                                <p>Manage video's</p>
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
                        @foreach($videos as $video)
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-5">
                                <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail" style="background-image: url(/images/uploads/{{$video->tumbnail}});"></div>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-1">{{ $video->title }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($video->ratings))
                                        <?php $stars = $ratingService->getAVG($video->id); ?>
                                        <div class="rating">
                                            @for ($i = $stars; $i >= 1; $i--)
                                            <span class="star star-checked"><i class="fa fa-star"></i></span>
                                            @endfor

                                            @for ($i = $stars; $i <= 4; $i++) <span class="star"><i
                                                    class="fa fa-star"></i></span>
                                                @endfor
                                        </div>
                                        @else
                                        <div class="rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                            <span class="star"><i class="fa fa-star"></i></span>
                                            @endfor
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-1 mb-4">
                                <a href="/course/{{ $video->course_id }}/video/edit/{{ $video->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>

                            <div class="col-1 mb-4">
                                <input type="hidden" value="{{ $video->id }}">
                                <span class="delete-video"><i class="fa fa-trash" aria-hidden="true"></i></span>
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

@section('extra-js')
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
@endsection
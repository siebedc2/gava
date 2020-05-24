<?php 
    $videoService = new App\Services\Video(); 
    $ratingService = new App\Services\Rating();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12">
            <div class="row my-4 filter">
                <div class="col-12 d-md-none">
                    <span class="ml-2 filter-menu"><img class="filter-icon" src="/images/filter-icon.svg" alt="Filter icon"></span>
                </div>
                
                <div class="col-12 d-none d-md-block filter-container">
                    <form>
                        <div class="row mt-4 d-md-none">               
                            <div class="col-4 d-flex align-items-center">
                                <span class="close-filter">
                                    <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                                </span>                            
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-center">
                                <h2 class="font-weight-normal mb-0">Filters</h2>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">apply</button>
                            </div>
                        </div>  
                        <div class="form-row mt-2 mt-md-0">
                            <div class="col-12 col-md-3 my-2 my-md-0 search-filter">
                                <input type="text" class="rounded-pill border-0 bg-light form-control" placeholder="Search">
                                <span><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option>Filter on technologies</option>
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                    <option value="new">New</option>
                                    <option value="old">Old</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <div class="form-control bg-light rounded-pill d-flex justify-content-between align-items-center rating-filter border-0">
                                    <p class="mb-0">Minimum rating</p>
                                    <div class="d-flex">
                                        <div class="form-check pl-0">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content1star" value="1">
                                            <label class="form-check-label" for="content1star"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content2stars" value="2">
                                            <label class="form-check-label" for="content2stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content3stars" value="3">
                                            <label class="form-check-label" for="content3stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content4stars" value="4">
                                            <label class="form-check-label" for="content4stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>  
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content5stars" value="5">
                                            <label class="form-check-label" for="content5stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach($courses as $course)
                    @auth
                        @if($course->user_id != Auth::user()->id)
                            <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white text-decoration-none my-2">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-1">{{ $course->title }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="course-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                                                    <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                                                @else
                                                    <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <?php 
                                                    $videos             = $videoService->getAllCourseVideos($course->id); 
                                                    $rating             = 0;   
                                                    $amountOfRatings    = 0; 
                                                ?>
                                                @foreach($videos as $video)
                                                    <?php 
                                                        $ratingData = $ratingService->getAVG($video['id']);
                                                        if(!empty($ratingData['starAVG'])) {
                                                            $ratingData = $ratingService->getAVG($video['id']);
                                                            $rating += $ratingData['starAVG'];
                                                            $amountOfRatings += 1;
                                                        }
                                                    ?>  
                                                @endforeach
                                                
                                                @if($rating != null)
                                                <?php $Coursestars = round(($rating / $amountOfRatings),0); ?>
                                                <div class="rating">
                                                    @for ($i = $Coursestars; $i >= 1; $i--)
                                                        <span class="star star-checked"><i class="fa fa-star"></i></span>
                                                    @endfor

                                                    @for ($i = $Coursestars; $i <= 4; $i++)
                                                        <span class="star"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                </div>
                                                @else
                                                <div class="rating">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <span class="star"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                </div>
                                                @endif

                                                <p class="text-black-50 mb-0 ml-2">({{$amountOfRatings}})</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endauth

                    @guest
                        <a href="/course/{{ $course->id }}" class="col-12 col-md-6 text-decoration-none rounded bg-white my-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex justify-content-center align-items-center w-100 rounded tumbnail" style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mb-1">{{ $course->title }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="course-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                                                <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                                            @else
                                                <p class="mb-0 course-video-amount text-black-50">{{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex">
                                            <?php 
                                                $videos             = $videoService->getAllCourseVideos($course->id); 
                                                $rating             = 0;   
                                                $amountOfRatings    = 0; 
                                            ?>
                                            @foreach($videos as $video)
                                                <?php 
                                                    $ratingData = $ratingService->getAVG($video['id']);
                                                    if(!empty($ratingData['starAVG'])) {
                                                        $ratingData = $ratingService->getAVG($video['id']);
                                                        $rating += $ratingData['starAVG'];
                                                        $amountOfRatings += 1;
                                                    }
                                                ?>  
                                            @endforeach

                                            @if($rating != null)
                                            <?php $Coursestars = round(($rating / $amountOfRatings),0); ?>
                                            <div class="rating">
                                                @for ($i = $Coursestars; $i >= 1; $i--)
                                                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                                                @endfor

                                                @for ($i = $Coursestars; $i <= 4; $i++)
                                                    <span class="star"><i class="fa fa-star"></i></span>
                                                @endfor
                                            </div>
                                            @else
                                            <div class="rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <span class="star"><i class="fa fa-star"></i></span>
                                                @endfor
                                            </div>
                                            @endif
                                            <p class="text-black-50 mb-0 ml-2">({{$amountOfRatings}})</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endguest
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection
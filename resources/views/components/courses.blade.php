<?php 
    $videoService = new App\Services\Video(); 
    $ratingService = new App\Services\Rating();
    $courseService = new App\Services\Course();
    $courseTagService = new App\Services\CourseTag();

    if($search ? $search : '' != '' || $sort ? $sort : '' != '') {
        if($search != '') {
            $courses = $courseService->searchCourses($search);
        }

        else {
            $courses = $courseService->getAll();
        }

        if($sort != '') {
            if($sort == 'desc') {
                $courses = $courses->sortByDesc('created_at');
            }
    
            elseif($sort == 'asc') {
                $courses = $courses->sortBy('created_at');
            }
        }
    }

    else {
        $courses = $courseService->getAll();
    }  
    
    

    /*if(empty($tags) || in_array($tags, $array)) {

    }*/
?>

<div class="courses">
    <div class="row">
        @if(!empty($courses))
        @foreach($courses as $course)

        <?php
            $courseTagIds       = $courseTagService->getCourseTagIds($course->id);
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
        @else
            <?php $Coursestars = 0; ?>
        @endif


        @if(empty($courseTagId) || in_array($courseTagId, $courseTagIds))
        @if($Coursestars >= $filterRating)
        @auth
        @if($course->user_id != Auth::user()->id)
        <a href="/course/{{ $course->id }}" class="col-12 col-md-6 rounded bg-white text-decoration-none my-2">
            <div class="row">
                <div class="col-5 col-md-4">
                    <div class="d-flex justify-content-center align-items-center w-100 tumbnail"
                        style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1">{{ $course->title }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span class="course-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                            <p class="mb-0 course-video-amount text-black-50">
                                {{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                            @else
                            <p class="mb-0 course-video-amount text-black-50">
                                {{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="rating">
                                @for ($i = $Coursestars; $i >= 1; $i--)
                                <span class="star star-checked"><i class="fa fa-star"></i></span>
                                @endfor

                                @for ($i = $Coursestars; $i <= 4; $i++) 
                                <span class="star"><i class="fa fa-star"></i></span>
                                @endfor
                            </div>

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
                    <div class="d-flex justify-content-center align-items-center w-100 tumbnail"
                        style="background-image: url(/images/uploads/{{$course->tumbnail}});"></div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1">{{ $course->title }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1"><span class="course-username">{{ $course->user->name }}</span><span
                                    class="course-date-dot text-black-50">{{ date_format($course->created_at, "F d Y")  }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if(count($videoService->getAllCourseVideos($course->id)) == 1)
                            <p class="mb-0 course-video-amount text-black-50">
                                {{ count($videoService->getAllCourseVideos($course->id)) }} video</p>
                            @else
                            <p class="mb-0 course-video-amount text-black-50">
                                {{ count($videoService->getAllCourseVideos($course->id)) }} video's</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="rating">
                                @for ($i = $Coursestars; $i >= 1; $i--)
                                <span class="star star-checked"><i class="fa fa-star"></i></span>
                                @endfor

                                @for ($i = $Coursestars; $i <= 4; $i++) <span class="star"><i
                                        class="fa fa-star"></i></span>
                                    @endfor
                            </div>
                           
                            <p class="text-black-50 mb-0 ml-2">({{$amountOfRatings}})</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endguest
        @endif
        @endif
        @endforeach
        @endif
    </div>
</div>
<?php

namespace App\Services;

use App\Models\Rating as RatingModel;
use \App\Services\Video as VideoService;
use Validator;
use Auth;

class Rating {
    public function validator(array $data) {
        return Validator::make($data, [
            'content' => 'required',
            'quality' => 'required',
        ]);
    }

    public function getAllVideoRatings($videoId) {
        return RatingModel::where('video_id', $videoId)->orderBy('id', 'DESC')->get();
    }

    public function getAVG($videoId) {
        $contentAVG = round(RatingModel::where('video_id', $videoId)->avg('stars'),0);
        $qualityAVG = round(RatingModel::where('video_id', $videoId)->avg('quality'),0);

        $data['starAVG']            = ($contentAVG + $qualityAVG) / 2;
        $data['amountOfRatings']    = RatingModel::where('video_id', $videoId)->count();
        return $data;
    }
    
    public function getCourseRating($course) {
        $videoService               = new VideoService();
        $videos                     = $videoService->getAllCourseVideos($course->id);
        $data['amountOfRatings']    = 0;
        $starsTotal                 = 0;
        $videoWithRatingAmount      = 0;

        foreach($videos as $video) {
            $rating = $this->getAVG($video['id']);
            $starsTotal += $rating['starAVG'];
            $data['amountOfRatings'] += $rating['amountOfRatings'];

            if($rating['starAVG'] != 0) {
                $videoWithRatingAmount += 1;
            }
        }

        if($starsTotal != 0) {
            $data['starAVG'] = $starsTotal / $videoWithRatingAmount;
        }

        else {
            $data['starAVG'] = 0;
        }

        return $data;
    }
    
    public function create($request, $videoId) {
        $rating             = new RatingModel();
        $rating->stars      = $request['content'];
        $rating->quality    = $request['quality'];
        $rating->comment    = $request['comment'];
        $rating->user_id    = Auth::id();
        $rating->video_id   = $videoId;
        $rating->save();
    }
}
<?php

namespace App\Services;

use App\Models\Rating as RatingModel;
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
        $data['starAVG']            = round(RatingModel::where('video_id', $videoId)->avg('stars'),0);
        $data['amountOfRatings']    = RatingModel::where('video_id', $videoId)->count();
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
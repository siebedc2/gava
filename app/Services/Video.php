<?php

namespace App\Services;

use App\Models\Video as VideoModel;
use Validator;

class Video {
    public function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'video' => 'required'
        ]);
    }

    public function create($request, $courseId) {
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        $videoInput = $request['video'];
        $videoName = $videoInput->getClientOriginalName();
        $videoInput->move('images/uploads', $videoName);

        $video = new VideoModel();
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->video = $videoName;
        $video->course_id = $courseId;
        $video->exclusive = $request['exclusive'];
        $video->save();
    }
}
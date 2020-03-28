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

    public function getById($videoId) {
        return VideoModel::find($videoId);
    }

    public function getAllCourseVideos($courseId) {
        return VideoModel::where('course_id', $courseId)->get();
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

    public function edit($request, $courseId, $videoId) {
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        VideoModel::where('id', $videoId)
                    ->update(
                        [
                        'title' => $request['title'], 
                        'description' => $request['description'],
                        'video' => $request['video'],
                        'exclusive' => $request['exclusive']
                        ]);
    }

}
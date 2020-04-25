<?php

namespace App\Services;

use App\Models\Video as VideoModel;
use Validator;

class Video {
    public function validator(array $data) {
        return Validator::make($data, [
            'title'         => 'required',
            'description'   => 'required',
            'video'         => 'nullable|mimes:mp4'
        ]);
    }

    public function getById($videoId) {
        return VideoModel::find($videoId);
    }

    public function getAllCourseVideos($courseId) {
        return VideoModel::where([
            ['course_id', $courseId],
            ['status', 'online']
        ])->get();
    }

    public function getSessionVideos() {
        return session('videos');
    }

    public function create($courseId) {
        $videos = session('videos');

        if(!empty($videos)) {
            foreach($videos as $video) {

                if(empty($video['exclusive'])) {
                    $video['exclusive'] = 'n';
                }

                $newVideo = new VideoModel();
                $newVideo->title        = $video['title'];
                $newVideo->description  = $video['description'];
                $newVideo->video        = $video['video'];
                $newVideo->course_id    = $courseId;
                $newVideo->tumbnail     = $video['tumbnail'];
                $newVideo->exclusive    = $video['exclusive'];
                $newVideo->save();
            }
        }
        session()->forget('videos');
    }

    public function singleCreate($request, $courseId) {
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        $tumbnail = $request['tumbnail'];
        $tumbnailName = $tumbnail->getClientOriginalName();
        $tumbnail->move('images/uploads', $tumbnailName);

        $video = new VideoModel();
        $video->title        = $request['title'];
        $video->description  = $request['description'];
        $video->video        = $request['video'];
        $video->course_id    = $courseId;
        $video->tumbnail     = $tumbnailName;
        $video->exclusive    = $request['exclusive'];
        $video->save();
    }

    public function addToSession($request) {
        $videoInput = $request['video'];
        $videoName = $videoInput->getClientOriginalName();
        $videoInput->move('images/uploads', $videoName);
        $request['video'] = $videoName;

        $tumbnailInput = $request['tumbnail'];
        $tumbnailName = $tumbnailInput->getClientOriginalName();
        $tumbnailInput->move('images/uploads', $tumbnailName);
        $request['tumbnail'] = $tumbnailName;

        $videos = session('videos');
        $videos[$request['title']] = $request;
        session(['videos' => $videos]);
    }

    public function edit($request, $courseId, $videoId) {
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        if(empty($request['video'])) {
            $video = $this->getById($videoId);
            $request['video'] = $video['video'];
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

    public function delete($videoId) {
        VideoModel::where('id', $videoId)
                    ->update(
                        [
                            'status' => 'offline'
                        ]
                    );
    }

}
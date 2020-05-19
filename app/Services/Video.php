<?php

namespace App\Services;

use App\Models\Video as VideoModel;
use Validator;

class Video {
    public function validator(array $data) {
        return Validator::make($data, [
            'title'         => 'required',
            'description'   => 'required',
            'tumbnail'      => 'nullable|max:2000',
            'video'         => 'nullable|mimes:mp4|max:150000000'
        ]);
    }

    public function getById($videoId) {
        return VideoModel::find($videoId);
    }

    public function getSessionVideoById($videoId) {
        return session('videos.' .  $videoId);
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
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        $videoInput = $request['video'];
        $videoName = $videoInput->getClientOriginalName();
        $videoInput->move('images/uploads', $videoName);
        $request['video'] = $videoName;

        $tumbnailInput = $request['tumbnail'];
        $tumbnailName = $tumbnailInput->getClientOriginalName();
        $tumbnailInput->move('images/uploads', $tumbnailName);
        $request['tumbnail'] = $tumbnailName;

        $videos = session('videos');

        if(!empty(session('videos'))) {
            $id = count(session('videos')) + 1;
        }

        else {
            $id = 1;
        }

        $request['id'] = $id;

        $videos[$id] = $request;
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

        else {
            $videoInput = $request['video'];
            $videoName = $videoInput->getClientOriginalName();
            $videoInput->move('images/uploads', $videoName);
            $request['video'] = $videoName;
        }

        if(empty($request['tumbnail'])) {
            $video = $this->getById($videoId);
            $request['tumbnail'] = $video['tumbnail'];
        }

        else {
            $tumbnailInput = $request['tumbnail'];
            $tumbnailName = $tumbnailInput->getClientOriginalName();
            $tumbnailInput->move('images/uploads', $tumbnailName);
            $request['tumbnail'] = $tumbnailName;
        }

        VideoModel::where('id', $videoId)
                    ->update(
                        [
                        'title'         => $request['title'], 
                        'description'   => $request['description'],
                        'video'         => $request['video'],
                        'tumbnail'      => $request['tumbnail'],
                        'exclusive'     => $request['exclusive']
                        ]);
    }

    public function editSessionVideo($request, $videoId) {
        if(empty($request['exclusive'])) {
            $request['exclusive'] = 'n';
        }

        $videos                     = session('videos');
        $storedVideo                = $videos[$videoId];
        $storedVideo['title']       = $request['title'];
        $storedVideo['description'] = $request['description'];
        $storedVideo['exclusive']   = $request['exclusive'];

        if(!empty($request['tumbnail'])) {
            $tumbnailInput = $request['tumbnail'];
            $tumbnailName = $tumbnailInput->getClientOriginalName();
            $tumbnailInput->move('images/uploads', $tumbnailName);
            $request['tumbnail'] = $tumbnailName;
            $storedVideo['tumbnail']    = $request['tumbnail'];
        }

        if(!empty($request['video'])) {
            $videoInput = $request['video'];
            $videoName = $videoInput->getClientOriginalName();
            $videoInput->move('images/uploads', $videoName);
            $request['video'] = $videoName;
            $storedVideo['video']    = $request['video'];
        }

        $videos[$videoId] = $storedVideo;
        session(['videos' => $videos]);

    }

    public function delete($videoId) {
        VideoModel::where('id', $videoId)
                    ->update(
                        [
                            'status' => 'offline'
                        ]
                    );
    }

    public function deleteInSession($videoId) {
        session()->pull('videos.' .  $videoId);
    }
}
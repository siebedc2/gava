<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Video as VideoService;
use App\Services\Comment as CommentService;
use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;

class VideoController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function details(CourseService $course, VideoService $video, CommentService $comment, SubscriptionService $subscription, $courseId, $videoId) {
        $data['course'] = $course->getById($courseId);
        $data['video'] = $video->getById($videoId);
        $data['courseVideos'] = $video->getAllCourseVideos($courseId);
        $data['comments'] = $comment->getAll($videoId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($data['course']['user_id']);
        return view('general/video/details', $data);
    }

    public function add() {
        return view('general/video/add');
    }

    public function handleAdd(VideoService $video, $courseId = null) {
        if ($video->validator($this->_request->all())->fails()) {
            $errors = $video->validator($this->_request->all())->errors();
            return redirect('/course/video/add')->withInput($this->_request->input())->with('errors', $errors);
        } 
        
        else {
            if(empty($courseId)) {
                $video->addToSession($this->_request->all());
                return redirect('/course/add')->with('status', 'Added video!');
            }

            else {
                $video->singleCreate($this->_request->all(), $courseId);
                return redirect('/course/edit/' . $courseId)->with('status', 'Added video!');
            } 
        }   
    }

    public function edit(VideoService $video, $courseId, $videoId) {
        $data['video'] = $video->getById($videoId);
        return view('general/video/edit', $data);
    }

    public function handleEdit(VideoService $video, $courseId, $videoId) {
        if ($video->validator($this->_request->all())->fails()) {
            $errors = $video->validator($this->_request->all())->errors();
            return redirect('/course/' . $courseId . '/video/edit/' . $videoId)->with('errors', $errors);
        } 
        
        else {
            $video->edit($this->_request->all(), $courseId, $videoId);
            return redirect('/course/edit/' . $courseId)->with('status', 'Video aangepast!');
        }
    }

    public function handleDelete(VideoService $video, $courseId, $videoId) {
        $video->delete($videoId);
        return redirect('/course/edit/' . $courseId)->with('status', 'Video is verwijderd!');
    }
}

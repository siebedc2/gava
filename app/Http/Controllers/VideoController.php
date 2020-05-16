<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Video as VideoService;
use App\Services\Comment as CommentService;
use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;
use App\Services\VideoReport as VideoReportService;
use App\Services\CommentReport as CommentReportService;
use App\Services\Like as LikeService;
use App\Services\Upvote as UpvoteService;
use App\Services\Rating as RatingService;
use Auth;

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
        $data['subscribersIds'] = $subscription->getSubscriberId(Auth::id());
        return view('general/video/details', $data);
    }

    public function ratings(RatingService $rating) {
        $data['ratings'] = $rating->getAll();
        return view('general.video.rating.index', $data);
    }

    public function addRating() {
        return view('general.video.rating.add');
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

    public function edit(VideoService $video, $courseId, $videoId = null ) {       
        if($videoId == null) {
            $videoId = $courseId;
            $data['video'] = $video->getSessionVideoById($videoId);
        }

        else {
            $data['video'] = $video->getById($videoId)->toArray();
        }

        return view('general/video/edit', $data);
    }

    public function handleEdit(VideoService $video, $courseId, $videoId = null) {
        if ($video->validator($this->_request->all())->fails()) {
            $errors = $video->validator($this->_request->all())->errors();
            return redirect('/course/' . $courseId . '/video/edit/' . $videoId)->with('errors', $errors);
        } 
        
        else {
            if($videoId == null) {
                $videoId = $courseId;
                $video->editSessionVideo($this->_request->all(), $videoId);
                return redirect('/course/add')->with('status', 'Video edited!');  
            }
    
            else {
                $video->edit($this->_request->all(), $courseId, $videoId);
                return redirect('/course/edit/' . $courseId)->with('status', 'Video edited!');    
            }            
        }
    }

    public function handleDelete(VideoService $video) {
        if($this->_request->input('courseId') != null) {
            $video->delete($this->_request->input('videoId'));
            $msg = "success";
        }

        else {
            $video->deleteInSession($this->_request->input('videoId'));
            $msg = "success";
        }        

        return response()->json([
            'message'   => $msg
        ]);
    }

    public function handleReportVideo(VideoReportService $videoReport) {
        if($videoReport->create($this->_request->input('videoId'))) {
            $msg = "success";
        }

        else {
            $msg = "error";
        }

        return response()->json([
            'message'   => $msg
        ]);
    }

    public function handleReportComment(CommentReportService $commentReport) {
        if($commentReport->create($this->_request->input('commentId'))) {
            $msg = "success";
        }

        else {
            $msg = "error";
        }

        return response()->json([
            'message'   => $msg
        ]);
    }

    public function handleLikeComment(LikeService $like) {
        if($like->create($this->_request->input('commentId'))) {
            $msg = "success";
        }

        else {
            $msg = "error";
        }

        return response()->json([
            'message'   => $msg
        ]);
    }

    public function handleUpvoteComment(UpvoteService $upvote) {
        if($upvote->create($this->_request->input('commentId'))) {
            $msg = "success";
        }

        else {
            $msg = "error";
        }

        return response()->json([
            'message'   => $msg
        ]);
    }
}

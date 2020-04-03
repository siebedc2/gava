<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\User as UserService;
use App\Services\Course as CourseService;
use App\Services\Video as VideoService;
use App\Services\Subscription as SubscriptionService;
use App\Services\CourseTag as CourseTagService;
use App\Services\Tag as TagService;

class CourseController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function index(CourseService $course, TagService $tag) {
        $data['courses'] = $course->getAll();
        $data['tags'] = $tag->getAll();
        return view('home', $data);
    }

    public function details(CourseService $course, VideoService $video, SubscriptionService $subscription, UserService $user, CourseTagService $courseTag, $courseId) {
        $data['course'] = $course->getById($courseId);
        $data['user'] = $user->getById($data['course']['user_id']);
        $data['videos'] = $video->getAllCourseVideos($courseId);
        //$data['courseTags'] = $courseTag->getCourseTags($courseId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($data['course']['user_id']);
        return view('general/course/details', $data);
    }

    public function add() {
        return view('general.course.add');
    }

    public function handleAdd(CourseService $course) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/add')->with('errors', $errors);
        } 
        
        else {
            $course->create($this->_request->input());
            return redirect('/course/add')->with('status', 'Product toegevoegd!');
        }
    }

    public function edit(CourseService $course, VideoService $video, $courseId) {
        $data['courseId'] = $courseId;
        $data['course'] = $course->getById($courseId);
        $data['videos'] = $video->getAllCourseVideos($courseId);
        return view('general/course/edit', $data);
    }

    public function handleEdit(CourseService $course, $courseId) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/edit')->with('errors', $errors);
        } 
        
        else {
            $course->edit($this->_request->input(), $courseId);
            return redirect('/course/edit/' . $courseId)->with('status', 'Course gewijzigd!');
        }
    }

    public function handleDelete(CourseService $course, $courseId) {
        $course->delete($courseId);
        return redirect('/dashboard')->with('status', 'Course verwijderd!');
    }
}

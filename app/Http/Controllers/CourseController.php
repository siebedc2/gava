<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\User as UserService;
use App\Services\Course as CourseService;
use App\Services\Video as VideoService;
use App\Services\Subscription as SubscriptionService;
use App\Services\CourseTag as CourseTagService;
use App\Services\Tag as TagService;
use App\Services\Rating as RatingService;
use Auth;

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
        $data['courseTags'] = $courseTag->getAllCourseTags($courseId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($data['course']['user_id']);
        $data['subscribersIds'] = $subscription->getSubscriberId(Auth::id());
        return view('general/course/details', $data);
    }

    public function add(TagService $tag, VideoService $video) {
        $data['tags'] = $tag->getAll();
        $data['videos'] = $video->getSessionVideos();
        return view('general.course.add', $data);
    }

    public function handleAdd(CourseService $course, VideoService $video, CourseTagService $courseTag) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/add')->with('errors', $errors);
        } 
        
        else {
            $savedCourse = $course->create($this->_request->all());
            $video->create($savedCourse->id);
            $courseTag->create($savedCourse->id, $this->_request->input('tags'));
            session()->forget(['videos']);
            return redirect('/dashboard')->with('status', 'Added course!');
        }
    }

    public function edit(CourseService $course, VideoService $video, TagService $tag, CourseTagService $courseTag, $courseId) {
        $data['courseId'] = $courseId;
        $data['course'] = $course->getById($courseId);
        $data['videos'] = $video->getAllCourseVideos($courseId);
        $data['tags'] = $tag->getAll();
        $data['courseTagIds'] = $courseTag->getCourseTagIds($courseId);
        return view('general/course/edit', $data);
    }

    public function handleEdit(CourseService $course, CourseTagService $courseTag, $courseId) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/edit')->with('errors', $errors);
        } 
        
        else {
            $courseTag->deleteCourseTags($courseId);
            $courseTag->create($courseId, $this->_request->input('tags'));
            $course->edit($this->_request->all(), $courseId);
            return redirect('/dashboard')->with('status', 'Edited course!');
        }
    }

    public function handleDelete(CourseService $course, $courseId) {
        $course->delete($courseId);
        return redirect('/dashboard')->with('status', 'Deleted course!');
    }
}

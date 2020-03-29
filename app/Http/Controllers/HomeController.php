<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;
use App\Services\Tag as TagService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function landing() {
        return view('general.index');
    }

    public function index(CourseService $course, TagService $tag) {
        $data['courses'] = $course->getAll();
        $data['tags'] = $tag->getAll();
        return view('home', $data);
    }

    public function subscriptions(SubscriptionService $subscription, CourseService $course) {
        $userId = Auth::user()->id;
        $data['subscribersIds'] = $subscription->getSubscriberId($userId);
        $data['courses'] = $course->getAll();
        $data['creators'] = $subscription->getSubscriptions($userId);
        return view('general.subscriptions', $data);
    }

    public function dashboard(CourseService $course) {
        $userId = Auth::user()->id;
        $data['courses'] = $course->getAllUserCourses($userId);
        return view('general.dashboard', $data);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;

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

    public function profile(CourseService $course, SubscriptionService $subscription) {
        $userId = Auth::user()->id;
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.profile.index', $data);
    }
}
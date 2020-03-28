<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\User as UserService;
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

    public function index() {
        return view('home');
    }

    public function subscriptions() {
        return view('general.subscriptions');
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

    public function userProfile(CourseService $course, UserService $user, SubscriptionService $subscription, $userId) {
        $data['user'] = $user->getById($userId);
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.profile.index', $data);
    }
}

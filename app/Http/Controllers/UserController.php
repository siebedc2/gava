<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\User as UserService;
use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;

class UserController extends Controller
{
    function __construct(Request $request) {
        $this->_request = $request;
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

    public function edit() {
        return view('general.profile.edit');
    }
}

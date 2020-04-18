<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\Course as CourseService;
use App\Services\User as UserService;
use App\Services\Subscription as SubscriptionService;

class HomeController extends Controller
{
    protected $_request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function __construct(Request $request) {
        //$this->middleware('auth');
        $this->_request = $request;
    }

    public function landing() {
        return view('general.landing.index');
    }

    public function premium() {
        return view('general.landing.premium');
    }

    public function subscriptions(SubscriptionService $subscription, CourseService $course) {
        $userId = Auth::user()->id;
        $data['subscribersIds'] = $subscription->getSubscriberId($userId);
        $data['courses'] = $course->getAll();
        $data['creators'] = $subscription->getSubscriptions($userId);
        return view('general.subscriptions', $data);
    }

    public function dashboard(CourseService $course, SubscriptionService $subscription) {
        $userId = Auth::user()->id;
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['coursesAmount'] = count($course->getAllUserCourses($userId));
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.dashboard', $data);
    }

    public function profile(CourseService $course, SubscriptionService $subscription) {
        $userId = Auth::user()->id;
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.profile.index', $data);
    }

    public function subscribe(UserService $user, $userId) {
        $data['user'] = $user->getById($userId);
        return view('general.subscribe', $data);
    }

    public function handleSubscription(SubscriptionService $subscription, $creatorId) {
        $subscription->create($this->_request->input(), $creatorId);
        return redirect('/dashboard')->with('status', 'Subscribed!');
    }
}
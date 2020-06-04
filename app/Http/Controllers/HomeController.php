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

    /*public function premium() {
        return view('general.landing.premium');
    }*/

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

    public function getCourse(CourseService $course) {
        $course = $course->getById($this->_request->input('courseId'));
        
        return response()->json([
            'message'   => 'success',
            'course'    => $course
        ]);
    }

    public function profile(CourseService $course, SubscriptionService $subscription) {
        $userId = Auth::user()->id;
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.profile.index', $data);
    }

    public function getCreator(UserService $user) {
        $creator = $user->getCreator($this->_request->input('creatorId'));
        
        return response()->json([
            'message'   => 'success',
            'creator'    => $creator
        ]);
    }

    public function subscribe(UserService $user, $userId) {
        $data['user'] = $user->getById($userId);
        return view('general.subscribe', $data);
    }

    public function handleSubscription(SubscriptionService $subscription, $creatorId) {        
        if($subscription->hadSubscriptionThisMonth(Auth::id(), $creatorId)) {
            $subscription->update(Auth::id(), $creatorId);
        }

        else {
            $subscription->create($this->_request->input(), $creatorId);
        }
            
        return redirect('/subscribe/confirmation');
    }

    public function subscriptionConfirmation() {
        return view('general.subscribe.confirmation');
    }

    public function handleCancelSubscription(SubscriptionService $subscription, $creatorId) {
        $subscription->cancel($creatorId);
        return redirect('/subscriptions')->with('status', 'Cancelled subscription!');
    }
}
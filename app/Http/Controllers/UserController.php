<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Services\User as UserService;
use App\Services\UserReport as UserReportService;
use App\Services\Course as CourseService;
use App\Services\Subscription as SubscriptionService;

class UserController extends Controller
{
    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function userProfile(CourseService $course, UserService $user, SubscriptionService $subscription, $userId) {
        $data['user'] = $user->getById($userId);
        $data['courses'] = $course->getAllUserCourses($userId);
        $data['subscribersAmount'] = $subscription->getAmountOfSubscribers($userId);
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        $data['subscribersIds'] = $subscription->getSubscriberId(Auth::id());
        return view('general.profile.index', $data);
    }

    public function subscribers(SubscriptionService $subscription, $userId) {
        $data['subscriptions'] = $subscription->getAllUserSubscribers($userId);
        return view('general.profile.subscribers', $data);
    }

    public function edit() {
        return view('general.profile.edit');
    }

    public function handleEdit(UserService $user) {
        $user->edit($this->_request->all(), Auth::user()->id);
        return redirect('/profile/edit')->with('status', 'Password changed!');
    }

    public function changePassword() {
        return view('general.profile.changePassword');
    }

    public function handleChangePassword(UserService $user) {
        if(password_verify($this->_request->input('currentPassword'), Auth::user()->password)) {
            if($this->_request->input('newPassword') == $this->_request->input('repeatNewPassword')) {
                $user->changePassword($this->_request->input(), Auth::user()->id);
                return redirect('/profile/edit/change-password')->with('status', 'Password changed!');
            }

            else {
                $errors = [ 
                            "message"   => "Oops! Your new passwords do not match.",
                            "type"      => "2"
                ];
                return redirect('/profile/edit/change-password')->withInput($this->_request->input())->with('errors', $errors);
            }
        }  
        
        else {
            $errors = [ 
                "message"   => "Oops! Your password do not match.",
                "type"      => "1"
            ];
            return redirect('/profile/edit/change-password')->withInput($this->_request->input())->with('errors', $errors);
        }
    }

    public function paymentMethods() {
        return view('general.profile.paymentMethods');
    }

    public function handlePaymentMethods() {

    }

    public function purchaseHistory(SubscriptionService $subscription) {
        $userId = Auth::user()->id;
        $data['subscriptions'] = $subscription->getAllCreators($userId);
        return view('general.profile.purchase.index', $data);
    }

    public function purchaseHistoryDetail(SubscriptionService $subscription, $creatorId) {
        $userId = Auth::user()->id;
        $data['firstSubscription'] = $subscription->getSubscriptionById($creatorId, $userId);
        $data['subscriptions'] = $subscription->getAllSubscriptionsByCreatorId($creatorId, $userId);
        $data['subscribersIds'] = $subscription->getSubscriberId(Auth::id());
        
        return view('general.profile.purchase.details', $data);
    }

    public function handleReportUser(UserReportService $userReport) {
        if($userReport->create($this->_request->input('userId'))) {
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

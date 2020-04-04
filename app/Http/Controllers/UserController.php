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

    public function handleEdit(UserService $user) {
        $user->edit($this->_request->input(), Auth::user()->id);
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
                $errors = "Oops! Your passwords do not match.";
                return redirect('/profile/edit/change-password')->with('errors', $errors);
            }
        }  
        
        else {
            $errors = "Oops! Your passwords do not match.";
            return redirect('/profile/edit/change-password')->with('errors', $errors);
        }
    }

    public function paymentMethods() {
        return view('general.profile.paymentMethods');
    }

    public function handlePaymentMethods() {

    }

    public function purchaseHistory() {
        return view('general.profile.purchase.index');
    }

    public function purchaseHistoryDetail() {
        return view('general.profile.purchase.details');
    }
}

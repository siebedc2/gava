<?php

namespace App\Services;

use App\Models\Subscription as SubscriptionModel;
use Validator;
use Auth;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

class Subscription {
    public function validator(array $data) {
        return Validator::make($data, [
            'creator_id' => 'required'
        ]);
    }

    public function getSubscriptions($userId) {
        return SubscriptionModel::where([
            [ 'user_id', $userId ],
            [ 'status', 'online']
        ] )->get();
    }

    public function getAllUserSubscribers($creatorId) {
        return SubscriptionModel::where([
            ['creator_id', $creatorId]
        ])->get();
    }

    public function getAllCreators($userId) {
        return SubscriptionModel::where([
            ['user_id', $userId]
        ])->get();
    }

    public function getAmountOfSubscribers($userId) {
        return SubscriptionModel::where([
            ['creator_id', $userId], 
            ['status', 'online']
        ])->get()->count();
    }

    public function getSubscriberId($userId) {
        return SubscriptionModel::where([
            ['user_id', $userId],
            ['status', 'online']
            ])->pluck('creator_id')->toArray();
    }

    public function getMonthRevenue($month, $creatorId) {
        $subscriptionAmount = SubscriptionModel::where('creator_id', $creatorId)->whereMonth('created_at', Carbon::create()->month($month))->get()->count();
        $revenueMonth = $subscriptionAmount * 4.8;
        return $revenueMonth;
    }

    public function getTotalRevenue($creatorId) {
        $subscriptions = SubscriptionModel::where('creator_id', $creatorId)->get();
        $amounthOfMonts = 0;

        foreach($subscriptions as $subscription) {
            $startDate = $subscription->created_at;
            $endDate = $subscription->updated_at;
            $diff  = $startDate->diff($endDate);
            
            $amounthOfMonts += intval($diff->format('%m'));
        }

        $totalRevenue = $amounthOfMonts * 4.8;
        return $totalRevenue;
    }

    public function checkIfSubscribed($userId) {
        $subscriptions = SubscriptionModel::where([
            ['user_id', $userId], 
            ['status', 'online']
        ])->get();

        if($subscriptions->count() > 0) {
            return true;
        }

        else {
            return false;
        }
    }

    public function notSubsribedWhenVideoWasCreated($videoCreatedAt, $creatorId) {
        if(!Auth::user()) {
            return true;
        }

        $dates = SubscriptionModel::where([
            ['creator_id', $creatorId],
            ['user_id', Auth::id()]
        ])->get();

        foreach($dates as $date) {            
            $startDate = $date['created_at'];
            $endDate =  $date['created_at']->addMonths($startDate->diffInMonths($date['updated_at']) + 1);

            if($videoCreatedAt->between($startDate, $endDate) || date_diff($startDate, $endDate) == "+0 days") {
                return false;
            }
        }

        // If false is not returned, return true
        return true;
    }

    public function hasSubscription($userId, $creatorId) {
        $subscription = SubscriptionModel::where([
            ['creator_id', $creatorId],
            ['user_id', $userId], 
            ['status', 'online']
        ])->get();

        if($subscription->count() > 0) {
            return true;
        }

        else {
            return false;
        }
    }

    public function getSubscriptionById($creatorId, $userId) {
        return SubscriptionModel::where([
            ['creator_id', $creatorId],
            ['user_id', $userId]
        ])->firstOrFail();
    }

    public function getAllSubscriptionsByCreatorId($creatorId, $userId) {
        return SubscriptionModel::where([
            ['creator_id', $creatorId],
            ['user_id', $userId]
        ])->get();
    }

    public function getsubscribedMonths($subscription) {
        $start    = $subscription->created_at;
        $end      = $subscription->updated_at;
        $i        = 0;

        foreach (CarbonPeriod::create($start, '1 month', $end) as $month) {
            $months[$i] = $month->format('Y-m-d');
            $i++;
        }

        return $months;
    }

    public function create($data, $creatorId) {
        $subscription = new SubscriptionModel();
        $subscription->creator_id = $creatorId;
        $subscription->user_id = Auth::id();
        $subscription->save();
    }

    public function cancel($creatorId) {
        SubscriptionModel::where([
            [ 'user_id', Auth::id() ],
            [ 'creator_id', $creatorId]
        ])
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->update(
            [
                'status' => 'offline'
            ]
        );
    }

}
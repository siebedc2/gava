<?php

namespace App\Services;

use App\Models\Subscription as SubscriptionModel;
use Validator;
use Auth;

class Subscription {
    public function validator(array $data) {
        return Validator::make($data, [
            'creator_id' => 'required'
        ]);
    }

    public function getSubscriptions($userId) {
        return SubscriptionModel::where('user_id',$userId)->get();
    }

    public function getAllUserSubscribers($userId) {
        return SubscriptionModel::where('creator_id', $userId)->get();
    }

    public function getAmountOfSubscribers($userId) {
        return SubscriptionModel::where('creator_id', $userId)->get()->count();
    }

    public function getSubscriberId($userId) {
        return SubscriptionModel::where('user_id', $userId)->pluck('creator_id')->toArray();
    }

    public function getSubscriptionById($creatorId) {
        return SubscriptionModel::where('creator_id', $creatorId)->firstOrFail();
    }

    public function create($data, $creatorId) {
        $subscription = new SubscriptionModel();
        $subscription->creator_id = $creatorId;
        $subscription->user_id = Auth::id();
        $subscription->save();
    }

}
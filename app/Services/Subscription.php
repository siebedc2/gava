<?php

namespace App\Services;

use App\Models\Subscription as SubscriptionModel;
use Validator;

class Subscription {
    public function validator(array $data) {
        return Validator::make($data, [
            'creator_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
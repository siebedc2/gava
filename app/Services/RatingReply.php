<?php

namespace App\Services;

use App\Models\RatingReply as RatingReplyModel;
use Validator;

class RatingReply {
    public function validator(array $data) {
        return Validator::make($data, [
            'content' => 'required',
            'quality' => 'required',
        ]);
    }

    public function create($request) {
        $reply = new RatingReplyModel();
        $reply->reply = $request['reply'];
        $reply->rating_id = $request['ratingId'];
        $reply->save();

        return $reply;
    }

}
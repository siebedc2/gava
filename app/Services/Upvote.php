<?php

namespace App\Services;

use App\Models\Upvote as UpvoteModel;
use Validator;
use Auth;

class Upvote {
    public function validator(array $data) {
        return Validator::make($data, [
            'upvote' => 'required',
            'comment_id' => 'required',
            'user_id' => 'required'
        ]);
    }

    public function getUpvoteAmount($commentId) {
        return UpvoteModel::where('comment_id', $commentId)->get()->count();
    }

    public function create($commentId) {
        $commentUpvote                = new UpvoteModel();
        $commentUpvote->upvote        = "1";
        $commentUpvote->comment_id    = $commentId;
        $commentUpvote->user_id       = Auth::id();
        $commentUpvote->save();
        return $commentUpvote;
    }
}
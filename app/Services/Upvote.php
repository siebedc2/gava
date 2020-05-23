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

    public function getUpvoteByUserId($commentId, $userId) {
        return UpvoteModel::where([
            ['comment_id', $commentId],
            ['user_id', $userId]
        ])->get()->count();
    }

    public function delete($commentId, $userId) {
        $deletedItem = UpvoteModel::where([
            ['comment_id', $commentId],
            ['user_id', $userId]
        ])->delete();

        return $deletedItem;
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
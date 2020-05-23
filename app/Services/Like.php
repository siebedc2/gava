<?php

namespace App\Services;

use App\Models\Like as LikeModel;
use Validator;
use Auth;

class Like {
    public function validator(array $data) {
        return Validator::make($data, [
            'like' => 'required',
            'comment_id' => 'required',
            'user_id' => 'required'
        ]);
    }

    public function getLikeAmount($commentId) {
        return LikeModel::where('comment_id', $commentId)->get()->count();
    }

    public function getLikeByUserId($commentId, $userId) {
        return LikeModel::where([
            ['comment_id', $commentId],
            ['user_id', $userId]
        ])->get()->count();
    }

    public function delete($commentId, $userId) {
        $deletedItem = LikeModel::where([
            ['comment_id', $commentId],
            ['user_id', $userId]
        ])->delete();

        return $deletedItem;
    }

    public function create($commentId) {
        $commentLike                = new LikeModel();
        $commentLike->like          = "1";
        $commentLike->comment_id    = $commentId;
        $commentLike->user_id       = Auth::id();
        $commentLike->save();
        return $commentLike;
    }
}
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

    public function create($commentId) {
        $commentLike                = new LikeModel();
        $commentLike->like          = "1";
        $commentLike->comment_id    = $commentId;
        $commentLike->user_id       = Auth::id();
        $commentLike->save();
        return $commentLike;
    }
}
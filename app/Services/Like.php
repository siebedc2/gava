<?php

namespace App\Services;

use App\Models\Like as LikeModel;
use Validator;

class Like {
    public function validator(array $data) {
        return Validator::make($data, [
            'like' => 'required',
            'comment_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
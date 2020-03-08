<?php

namespace App\Services;

use App\Models\Comment as CommentModel;
use Validator;

class Comment {
    public function validator(array $data) {
        return Validator::make($data, [
            'comment' => 'required',
            'user_id' => 'required'
        ]);
    }
}
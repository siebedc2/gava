<?php

namespace App\Services;

use App\Models\Video as VideoModel;
use Validator;

class Video {
    public function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'video' => 'required',
            'course_id' => 'required',
            'exclusive' => 'required'
        ]);
    }
}
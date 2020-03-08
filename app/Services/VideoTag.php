<?php

namespace App\Services;

use App\Models\VideoTag as VideoTagModel;
use Validator;

class VideoTag {
    public function validator(array $data) {
        return Validator::make($data, [
            'tag_id' => 'required',
            'video_id' => 'required'
        ]);
    }
}
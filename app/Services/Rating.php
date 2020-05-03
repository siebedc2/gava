<?php

namespace App\Services;

use App\Models\Rating as RatingModel;
use Validator;

class Rating {
    public function validator(array $data) {
        return Validator::make($data, [
            'stars' => 'required',
            'user_id' => 'required',
            'video_id' => 'required'
        ]);
    }

    public function getAll() {
        return RatingModel::all();
    }
}
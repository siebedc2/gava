<?php

namespace App\Services;

use App\Models\Course as CourseModel;
use Validator;

class Course {
    public function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);
    }
}
<?php

namespace App\Services;

use App\Models\CourseTag as CourseTagModel;
use Validator;

class CourseTag {
    public function validator(array $data) {
        return Validator::make($data, [
            'tag_id' => 'required',
            'course_id' => 'required'
        ]);
    }

    public function getAllCourseTags($courseId) {
        return CourseTagModel::where('course_id', $courseId)->get();
    }
}
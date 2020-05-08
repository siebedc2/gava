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

    public function create($courseId, $tags) {
        foreach($tags as $tag) {
            $courseTag = new CourseTagModel();
            $courseTag->tag_id = $tag;
            $courseTag->course_id = $courseId;
            $courseTag->save();
        }
    }
}
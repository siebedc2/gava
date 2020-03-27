<?php

namespace App\Services;

use App\Models\Course as CourseModel;
use Validator;
use Auth;

class Course {
    public function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);
    }

    public function create($request) {
        //dd(Auth::user()->id);
        $course = new CourseModel();
        $course->title = $request['title'];
        $course->description = $request['description'];
        $course->user_id = Auth::user()->id;
        $course->save();
    }

}
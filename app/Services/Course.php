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

    public function getById($courseId) {
        return CourseModel::find($courseId);
    }

    public function create($request) {
        $course = new CourseModel();
        $course->title = $request['title'];
        $course->description = $request['description'];
        $course->user_id = Auth::user()->id;
        $course->save();
    }

    public function edit($request, $courseId) {
        CourseModel::where('id', $courseId)
                    ->update(
                        [
                        'title' => $request['title'], 
                        'description' => $request['description'] 
                        ]);
    }

}
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

    public function getAll() {
        return CourseModel::all();
    }

    public function getById($courseId) {
        return CourseModel::find($courseId);
    }

    public function getAllUserCourses($userId) {
        return CourseModel::where([
            [ 'user_id', $userId ],
            [ 'status', 'online']
        ])->get();
    }

    public function create($request) {
        $tumbnail = $request['tumbnail'];
        $tumbnailName = $tumbnail->getClientOriginalName();
        $tumbnail->move('images/uploads', $tumbnailName);

        $course = new CourseModel();
        $course->title = $request['title'];
        $course->description = $request['description'];
        $course->user_id = Auth::user()->id;
        $course->tumbnail = $tumbnailName;
        $course->save();
        return $course;
    }

    public function edit($request, $courseId) {
        $tumbnail = $request['tumbnail'];
        $tumbnailName = $tumbnail->getClientOriginalName();
        $tumbnail->move('images/uploads', $tumbnailName);
        
        CourseModel::where('id', $courseId)
                    ->update(
                        [
                        'title' => $request['title'], 
                        'description' => $request['description'],
                        'tumbnail' => $tumbnailName
                        ]);
    }

    public function delete($courseId) {
        CourseModel::where('id', $courseId)
                    ->update(
                        [
                            'status' => 'offline'
                        ]
                    );

    }

}
<?php

namespace App\Services;

use App\Models\Course as CourseModel;
use Validator;
use Auth;

class Course {
    public function validator(array $data) {
        return Validator::make($data, [
            'title'         => 'required',
            'description'   => 'required',
            'tumbnail'      => 'nullable|mimes:jpeg,png,jpg|max:2000'
        ]);
    }

    public function getAll() {
        return CourseModel::where('status', 'online')->get();
    }

    public function searchCourses($search) {
        return CourseModel::where('title', 'like', '%' .  $search . '%')->get();
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
        $course = CourseModel::find($courseId);
        $course->title          = $request['title'];
        $course->description    = $request['description'];

        if(!empty($request['tumbnail'])) {
            $tumbnail       = $request['tumbnail'];
            $tumbnailName   = $tumbnail->getClientOriginalName();
            $tumbnail->move('images/uploads', $tumbnailName);
            $course->tumbnail       = $tumbnailName;
        }

        $course->save();
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
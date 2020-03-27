<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Course as CourseService;

class CourseController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function add() {
        return view('general/course/add');
    }

    public function handleAdd(CourseService $course) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/add')->with('errors', $errors);
        } 
        
        else {
            $course->create($this->_request->input());
            return redirect('/course/add')->with('status', 'Product toegevoegd!');
        }
    }

    public function edit(CourseService $course, $courseId) {
        $data['course'] = $course->getById($courseId);
        return view('general/course/edit', $data);
    }

    public function handleEdit(CourseService $course, $courseId) {
        if ($course->validator($this->_request->input())->fails()) {
            $errors = $course->validator($this->_request->input())->errors();
            return redirect('/course/edit')->with('errors', $errors);
        } 
        
        else {
            $course->edit($this->_request->input(), $courseId);
            return redirect('/course/edit/' . $courseId)->with('status', 'Course gewijzigd!');
        }
    }
}

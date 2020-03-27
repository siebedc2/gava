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
            //return redirect('/dashboard/products')->with('errors', $errors);
            return $errors;
        } 
        
        else {
            $course->create($this->_request->input());
            //return redirect('/dashboard/products')->with('status', 'Product toegevoegd!');
        }
    }

    public function edit() {
        return view('general/course/edit');
    }
}

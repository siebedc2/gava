<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function add() {
        return view('general/course/add');
    }

    public function edit() {
        return view('general/course/edit');
    }
}

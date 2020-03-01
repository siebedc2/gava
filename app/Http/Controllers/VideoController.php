<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function details() {
        return view('general/video/details');
    }

    public function add() {
        return view('general/video/add');
    }

    public function edit() {
        return view('general/video/edit');
    }
}

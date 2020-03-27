<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Video as VideoService;

class VideoController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function details() {
        return view('general/video/details');
    }

    public function add() {
        return view('general/video/add');
    }

    public function handleAdd(VideoService $video, $courseId) {
        //dd($this->_request->all());

        if ($video->validator($this->_request->all())->fails()) {
            $errors = $video->validator($this->_request->all())->errors();
            return redirect('/course/' . $courseId . '/video/add')->with('errors', $errors);
        } 
        
        else {
            $video->create($this->_request->all(), $courseId);
            return redirect('/course/' . $courseId . '/video/add')->with('status', 'Video toegevoegd!');
        }

        
    }

    public function edit() {
        return view('general/video/edit');
    }
}

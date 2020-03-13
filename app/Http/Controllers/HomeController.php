<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function landing() 
    {
        return view('general.index');
    }

    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('general.profile.index');
    }
}

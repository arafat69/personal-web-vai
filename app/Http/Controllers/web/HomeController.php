<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Home;
use App\Models\Teaching;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();
        return view('home', compact('home'));
    }

    public function about()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function teaching()
    {
        $teaching = Teaching::first();
        return view('teaching', compact('teaching'));
    }

    public function curriculum()
    {
        $curriculum = Curriculum::first();
        return view('cv', compact('curriculum'));
    }

    public function course()
    {
        $course = Course::first();
        return view('course', compact('course'));
    }
}

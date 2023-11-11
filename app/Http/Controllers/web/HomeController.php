<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function teaching()
    {
        return view('teaching');
    }

    public function curriculum()
    {
        return view('cv');
    }

    public function course()
    {
        return view('course');
    }
}

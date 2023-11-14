<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();

        return view('home.index', compact('home'));
    }

    public function edit()
    {
        $home = Home::first();

        return view('home.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate(['title' => 'required', 'description' => 'required|string']);

        Home::updateOrCreate(
            ['id' => $home->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('home.index')->withSuccess('Updated Successfully');
    }
}

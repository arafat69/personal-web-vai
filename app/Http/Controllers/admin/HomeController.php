<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonRequest;
use App\Models\Home;

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

    public function update(CommonRequest $request, Home $home)
    {
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

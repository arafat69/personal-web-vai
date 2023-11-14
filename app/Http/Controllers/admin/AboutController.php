<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        return view('about.index', compact('about'));
    }

    public function edit()
    {
        $about = About::first();

        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate(['title' => 'required', 'description' => 'required|string']);

        About::updateOrCreate(
            ['id' => $about->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('about.index')->withSuccess('Updated Successfully');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::first();

        return view('education.index', compact('education'));
    }

    public function edit()
    {
        $education = Education::first();

        return view('education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate(['title' => 'required', 'description' => 'required|string']);

        Education::updateOrCreate(
            ['id' => $education->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('education.index')->withSuccess('Updated Successfully');
    }
}

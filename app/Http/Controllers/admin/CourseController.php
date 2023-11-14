<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::first();

        return view('course.index', compact('course'));
    }

    public function edit()
    {
        $course = Course::first();

        return view('course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate(['title' => 'required', 'description' => 'required|string']);

        Course::updateOrCreate(
            ['id' => $course->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('course.index')->withSuccess('Updated Successfully');
    }
}

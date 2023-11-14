<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonRequest;
use App\Models\Education;

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

    public function update(CommonRequest $request, Education $education)
    {
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

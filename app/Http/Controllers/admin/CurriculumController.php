<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonRequest;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculum = Curriculum::first();

        return view('curriculum.index', compact('curriculum'));
    }

    public function edit()
    {
        $curriculum = Curriculum::first();

        return view('curriculum.edit', compact('curriculum'));
    }

    public function update(CommonRequest $request, Curriculum $curriculum)
    {
        Curriculum::updateOrCreate(
            ['id' => $curriculum->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('curriculum.index')->withSuccess('Updated Successfully');
    }
}

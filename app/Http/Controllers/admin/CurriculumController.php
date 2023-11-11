<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;

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

    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate(['title' => 'required', 'description' => 'required|string']);

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

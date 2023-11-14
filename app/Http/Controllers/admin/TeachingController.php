<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonRequest;
use App\Models\Teaching;

class TeachingController extends Controller
{
    public function index()
    {
        $teaching = Teaching::first();

        return view('teaching.index', compact('teaching'));
    }

    public function edit()
    {
        $teaching = Teaching::first();

        return view('teaching.edit', compact('teaching'));
    }

    public function update(CommonRequest $request, Teaching $teaching)
    {
        Teaching::updateOrCreate(
            ['id' => $teaching->id ?? 0],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('teaching.index')->withSuccess('Updated Successfully');
    }
}

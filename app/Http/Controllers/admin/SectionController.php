<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $path = 'thumbnail/';
    public function index()
    {
        $thumbnail = Section::first();
        $sections = Section::skip(1)->take(14)->get();
        return view('section.index', compact('sections', 'thumbnail'));
    }

    public function create()
    {
        return view('section.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'nullable|string', 'description' => 'required']);
        Section::create($data);
        return to_route('section.index')->withSuccess('Create Successfully');
    }


    public function edit(Section $section)
    {
        return view('section.edit', compact('section'));
    }


    public function update(Request $request, Section $section)
    {
        $data = $request->validate(['title' => 'nullable|string', 'description' => 'required']);
        $section->update($data);
        return to_route('section.index')->withSuccess('Updated Successfully');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return to_route('section.index')->withSuccess('Deleted Successfully');
    }

    public function profile(Section $section)
    {
        return view('section.profile', compact('section'));
    }

    public function profileUpdate(Request $request, Section $section)
    {
        $thumbnail = $this->createOrUpdateMedia($section, $request);
        Section::updateOrCreate(
            ['id' => $section->id ?? 0],
            ['media_id' => $thumbnail?->id]
        );
        return to_route('section.index')->withSuccess('Updated Successfully');
    }

    private function createOrUpdateMedia($section, $request)
    {
        $media = $section?->media;
        if ($request->hasFile('photo') && $media == null) {
            $media = MediaRepository::storeByRequest(
                $request->photo,
                $this->path,
                'thumbnail',
                'image'
            );
        }

        if ($request->hasFile('photo') && $media) {
            $media = MediaRepository::updateByRequest(
                $request->photo,
                $this->path,
                'image',
                $media
            );
        }
        return $media;
    }
}

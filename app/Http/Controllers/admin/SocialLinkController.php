<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkRequest;
use App\Models\Social;
use App\Repositories\MediaRepository;

class SocialLinkController extends Controller
{
    private $path = 'social/';

    public function index()
    {
        $socials = Social::all();

        return view('social.index', compact('socials'));
    }

    public function create()
    {
        return view('social.create');
    }

    public function edit(Social $social)
    {
        return view('social.edit', compact('social'));
    }

    public function store(SocialLinkRequest $request)
    {
        $thumbnail = $this->createMedia($request);

        Social::create([
            'name' => $request->name,
            'url' => $request->url,
            'media_id' => $thumbnail->id,
        ]);

        return to_route('social.index')->withSuccess('Created Successfully');
    }

    public function update(SocialLinkRequest $request, Social $social)
    {
        $thumbnail = $this->updateMedia($social, $request);

        $social->update([
            'name' => $request->name,
            'url' => $request->url,
            'media_id' => $thumbnail->id,
        ]);

        return to_route('social.index')->withSuccess('Updated Successfully');
    }

    public function destroy(social $social)
    {
        $social->delete();

        return to_route('social.index')->withSuccess('Deleted Successfully');
    }

    private function createMedia($request)
    {
        $media = null;
        if ($request->hasFile('icon')) {
            $media = MediaRepository::storeByRequest(
                $request->icon,
                $this->path,
                'sociallinkk',
                'image'
            );
        }

        return $media;
    }

    private function updateMedia($social, $request)
    {
        $media = $social->media;
        if ($request->hasFile('icon') && $media) {
            $media = MediaRepository::updateByRequest(
                $request->icon,
                $this->path,
                'image',
                $media
            );
        }

        return $media;
    }
}

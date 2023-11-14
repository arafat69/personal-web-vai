<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderRequest;
use App\Models\Header;
use App\Repositories\MediaRepository;

class HeaderController extends Controller
{
    private $path = 'header/';

    public function index()
    {
        $header = Header::first();

        return view('header.index', compact('header'));
    }

    public function edit()
    {
        $header = Header::first();

        return view('header.edit', compact('header'));
    }

    public function update(HeaderRequest $request, Header $header)
    {
        $thumbnail = $this->createOrUpdateMedia($header, $request);

        Header::updateOrCreate(
            ['id' => $header->id ?? 0],
            [
                'media_id' => $thumbnail->id,
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return to_route('header.index')->withSuccess('Updated Successfully');
    }

    private function createOrUpdateMedia($header, $request)
    {
        $media = $header->media;

        if ($request->hasFile('photo') && $media == null) {
            $media = MediaRepository::storeByRequest(
                $request->photo,
                $this->path,
                'header',
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

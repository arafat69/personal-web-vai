<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $path = 'setting/';
    public function index()
    {
        $setting = Setting::first();
        return view('setting.index', compact('setting'));
    }

    public function edit()
    {
        $setting = Setting::first();
        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {

        $logo = $this->logoUpdateOrCreate($setting, $request);
        $favicon = $this->faviconUpdateOrCreate($setting, $request);
        Setting::updateOrCreate(
            ['id' => $setting->id ?? 0],
            [
                'name' => $request->name,
                'title' => $request->title,
                'logo_id' => $logo?->id ?? null,
                'favicon_id' => $favicon?->id ?? null,
            ]
        );

        return to_route('setting.index')->withSuccess('Updated Successfully');
    }

    private function logoUpdateOrCreate($setting, $request)
    {
        $media = $setting?->logo;
        if ($request->hasFile('logo') && $media == null) {
            $media = MediaRepository::storeByRequest(
                $request->logo,
                $this->path,
                'setting',
                'image'
            );
        }

        if ($request->hasFile('logo') && $media) {
            $media = MediaRepository::updateByRequest(
                $request->logo,
                $this->path,
                'image',
                $media
            );
        }
        return $media;
    }

    private function faviconUpdateOrCreate($setting, $request)
    {
        $media = $setting?->favicon;
        if ($request->hasFile('favicon') && $media == null) {
            $media = MediaRepository::storeByRequest(
                $request->favicon,
                $this->path,
                'setting',
                'image'
            );
        }

        if ($request->hasFile('favicon') && $media) {
            $media = MediaRepository::updateByRequest(
                $request->favicon,
                $this->path,
                'image',
                $media
            );
        }
        return $media;
    }
}

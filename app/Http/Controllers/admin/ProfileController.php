<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Repositories\MediaRepository;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $path = 'user/';

    public function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function show()
    {
        return view('profile.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => ['You have entered wrong password']])->withInput();
        }
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return to_route('profile.index')->withSuccess('password change successfully');
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        $thumbnail = $this->createOrUpdateMedia($user, $request);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'media_id' => $thumbnail ? $thumbnail->id : null,
        ]);

        return back()->withSuccess('Updated Successfully');
    }

    private function createOrUpdateMedia($user, $request)
    {
        $media = $user?->media;
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

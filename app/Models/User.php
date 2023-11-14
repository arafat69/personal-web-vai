<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //==========================================> Relations
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    //=========================================> Attributes
    public function thumbnail(): Attribute
    {
        $media = $this->media;
        $image = asset('images/dummy-profile.png');

        if ($media && Storage::exists($media->src)) {
            $image = Storage::url($media->src);
        }

        return new Attribute(
            get: fn () => $image
        );
    }
}

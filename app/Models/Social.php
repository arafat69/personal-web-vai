<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Social extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //==========================================> Relations
    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    //==========================================> Attribute
    public function thumbnail(): Attribute
    {
        $image = asset('assets/images/facebook.webp');
        if ($this->media && Storage::exists($this->media->src)) {
            $image = Storage::url($this->media->src);
        }
        return new Attribute(
            get: fn () => $image
        );
    }
}

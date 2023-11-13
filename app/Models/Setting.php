<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //==========================================> Relations
    public function logo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_id');
    }

    public function favicon(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'favicon_id');
    }

    //==========================================> Attribute
    public function logoPath(): Attribute
    {
        $image = null;
        if ($this->logo && Storage::exists($this->logo->src)) {
            $image = Storage::url($this->logo->src);
        }
        return new Attribute(
            get: fn () => $image
        );
    }

    public function faviconPath(): Attribute
    {
        $image = asset('assets/images/rejaul.jpeg');
        if ($this->favicon && Storage::exists($this->favicon->src)) {
            $image = Storage::url($this->favicon->src);
        }
        return new Attribute(
            get: fn () => $image
        );
    }
}

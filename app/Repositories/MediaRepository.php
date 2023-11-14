<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository extends Repository
{
    public static function model()
    {
        return Media::class;
    }

    public static function storeByRequest(UploadedFile $file, string $path, string $description = null, string $type = null): Media
    {
        $path = Storage::put('/'.trim($path, '/'), $file, 'public');
        $extension = $file->extension();
        if (! $type) {
            $type = in_array($extension, ['jpg', 'png', 'jpeg', 'gif']) ? 'image' : $extension;
        }

        return self::create([
            'type' => $type,
            'name' => $file->getClientOriginalName(),
            'src' => $path,
            'extension' => $extension,
            'path' => $path,
            'description' => $description,
        ]);
    }

    public static function updateByRequest(UploadedFile $file, string $path, string $type = null, Media $media): Media
    {
        $path = Storage::put('/'.trim($path, '/'), $file, 'public');
        $extension = $file->extension();
        if (! $type) {
            $type = in_array($extension, ['jpg', 'png', 'jpeg', 'gif']) ? 'image' : $extension;
        }

        if (Storage::exists($media->src)) {
            Storage::delete($media->src);
        }

        $media->update([
            'type' => $type,
            'name' => $file->getClientOriginalName(),
            'src' => $path,
            'extension' => $extension,
            'path' => $path,
        ]);

        return $media;
    }
}

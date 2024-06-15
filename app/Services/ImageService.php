<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ImageService
{
    public function storeImageReturnPath(UploadedFile $image): string
    {
        $imageName = Str::random(24).time().'.webp';
        $relativePath = 'images/'.auth()->id().'/listings/'.$imageName;

        $directory = 'images/'.auth()->id().'/listings';
        Storage::disk('public')->makeDirectory($directory);

        $absolutePath = Storage::disk('public')->path($relativePath);
        ImageManager::gd()->read($image)->save($absolutePath);

        return $relativePath;
    }
}

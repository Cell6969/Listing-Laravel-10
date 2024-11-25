<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{
    function uploadImage(
        Request $request,
        string  $inputName,
        string  $oldPath = null,
        string  $newPath = '/uploads'
    ): ?string
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($newPath), $imageName);


            // Delete old file
            $excludedFolder = '/default';
            if ($oldPath && File::exists(public_path($oldPath)) && !strpos($oldPath, $excludedFolder)) {
                File::delete(public_path($oldPath));
            }

            return $newPath . '/' . $imageName;
        }

        return null;
    }

    function deleteImage($path): void
    {
        $excludedFolder = '/default';
        if ($path && File::exists(public_path($path)) && !strpos($path, $excludedFolder)) {
            File::delete(public_path($path));
        }
    }
}

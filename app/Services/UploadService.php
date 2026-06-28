<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function uploadFile(UploadedFile $file, string $folder, ?string $customName = null): string
    {
        $fileName = $customName ?? Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($folder, $fileName, 'public');

        if ($path === false) {
            throw new \RuntimeException('File upload failed');
        }

        return $path;
    }
}
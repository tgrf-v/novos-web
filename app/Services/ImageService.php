<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function compressAndStore(UploadedFile $file, string $directory, string $disk = 'public', int $quality = 60): string
    {
        $extension = strtolower($file->getClientOriginalExtension() ?? '');

        if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            return $file->store($directory, $disk);
        }

        if (!extension_loaded('gd')) {
            return $file->store($directory, $disk);
        }

        $realPath = $file->getRealPath();
        if (!$realPath) {
            return $file->store($directory, $disk);
        }

        $isPng = $extension === 'png';
        $image = $isPng ? @imagecreatefrompng($realPath) : @imagecreatefromjpeg($realPath);

        if (!$image) {
            return $file->store($directory, $disk);
        }

        $filename = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) ?: 'file');
        $storedName = $filename . '_' . time() . '_' . uniqid() . '.jpg';
        $tempPath = sys_get_temp_dir() . '/' . $storedName;

        if ($isPng) {
            $tempPng = sys_get_temp_dir() . '/' . $storedName . '.png';
            imagepng($image, $tempPng);
            // Convert temp PNG to JPEG with white background to preserve transparency
            $jpgImage = imagecreatefrompng($tempPng);
            if ($jpgImage) {
                $width = imagesx($jpgImage);
                $height = imagesy($jpgImage);
                $whiteBg = imagecreatetruecolor($width, $height);
                $white = imagecolorallocate($whiteBg, 255, 255, 255);
                imagefill($whiteBg, 0, 0, $white);
                imagecopy($whiteBg, $jpgImage, 0, 0, 0, 0, $width, $height);
                imagejpeg($whiteBg, $tempPath, $quality);
                imagedestroy($jpgImage);
                imagedestroy($whiteBg);
            } else {
                imagejpeg($image, $tempPath, $quality);
            }
            @unlink($tempPng);
        } else {
            imagejpeg($image, $tempPath, $quality);
        }

        imagedestroy($image);

        if (!file_exists($tempPath)) {
            return $file->store($directory, $disk);
        }

        $handle = fopen($tempPath, 'r');
        if ($handle === false) {
            return $file->store($directory, $disk);
        }
        $fileContent = fread($handle, filesize($tempPath));
        fclose($handle);

        $storedPath = $directory . '/' . $storedName;
        Storage::disk($disk)->put($storedPath, $fileContent);

        @unlink($tempPath);

        return $storedPath;
    }
}

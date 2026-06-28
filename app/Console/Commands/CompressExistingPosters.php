<?php

namespace App\Console\Commands;

use App\Models\MentalHealthPoster;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

#[Signature('app:compress-existing-posters')]
#[Description('Kompres ulang semua poster existing ke JPEG quality 70')]
class CompressExistingPosters extends Command
{
    public function handle()
    {
        $posters = MentalHealthPoster::all();

        if ($posters->isEmpty()) {
            $this->info('Tidak ada poster untuk dikompres.');
            return;
        }

        $bar = $this->output->createProgressBar($posters->count());
        $bar->start();

        foreach ($posters as $poster) {
            $path = $poster->image_path;

            if (!Storage::disk('public')->exists($path)) {
                $this->newLine();
                $this->warn("File tidak ditemukan: {$path}");
                $bar->advance();
                continue;
            }

            $fullPath = Storage::disk('public')->path($path);
            $originalSize = filesize($fullPath);
            $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));

            if (in_array($ext, ['jpg', 'jpeg']) && $originalSize < 204800) {
                $bar->advance();
                continue;
            }

            $image = $ext === 'png'
                ? @imagecreatefrompng($fullPath)
                : @imagecreatefromjpeg($fullPath);

            if (!$image) {
                $this->newLine();
                $this->warn("Gagal membaca: {$path}");
                $bar->advance();
                continue;
            }

            $storedName = 'poster_' . time() . '_' . uniqid() . '.jpg';
            $tempPath = sys_get_temp_dir() . '/' . $storedName;

            imagejpeg($image, $tempPath, 70);
            imagedestroy($image);

            $storedPath = 'posters/' . $storedName;
            Storage::disk('public')->put($storedPath, file_get_contents($tempPath));
            @unlink($tempPath);

            Storage::disk('public')->delete($path);
            $poster->update(['image_path' => $storedPath]);

            $newSize = Storage::disk('public')->size($storedPath);
            $saved = $originalSize - $newSize;
            $this->newLine();
            $this->info("{$path}: " . number_format($originalSize / 1024, 1) . "KB → " . number_format($newSize / 1024, 1) . "KB (hemat " . number_format($saved / 1024, 1) . "KB)");

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Selesai! Semua poster telah dikompres.');
    }
}

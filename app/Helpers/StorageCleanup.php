<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageCleanup
{
    /**
     * Hapus file dari public disk jika ada.
     *
     * @param string|null $path Path relatif file (contoh: 'teams/foto.jpg')
     * @return bool
     */
    public static function deleteFile(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }

    /**
     * Hapus banyak file sekaligus dari public disk.
     *
     * @param array $paths Array path relatif file
     * @return void
     */
    public static function deleteFiles(array $paths): void
    {
        foreach ($paths as $path) {
            self::deleteFile($path);
        }
    }
}

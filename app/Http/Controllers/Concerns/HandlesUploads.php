<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    /**
     * Store an uploaded image on the public disk and return its relative path.
     */
    protected function storeImage(?UploadedFile $file, string $folder): ?string
    {
        if (! $file) {
            return null;
        }

        return $file->store($folder, 'public');
    }

    /**
     * Delete an image from the public disk if it exists.
     */
    protected function deleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Resolve the final image path from an optional upload, an existing value,
     * and a "remove" flag. Returns the new path (or null when removed).
     *
     * @param  array<string, mixed>  $data
     */
    protected function resolveImagePath(array $data, string $fileKey, string $pathKey, ?string $currentPath): ?string
    {
        $file = $data[$fileKey] ?? null;

        if ($file instanceof UploadedFile) {
            $this->deleteImage($currentPath);

            return $this->storeImage($file, $this->uploadFolder($pathKey));
        }

        if (! empty($data['remove_image'])) {
            $this->deleteImage($currentPath);

            return null;
        }

        // Fall back to a manually submitted path, then the existing value.
        $submitted = $data[$pathKey] ?? null;

        if (is_string($submitted) && trim($submitted) !== '') {
            return $submitted;
        }

        return $currentPath;
    }

    /**
     * Determine the storage folder for a given path column.
     */
    protected function uploadFolder(string $pathKey): string
    {
        return match ($pathKey) {
            'cover_path' => 'services',
            'media_path' => 'portfolios',
            'photo_path' => 'testimonials',
            default => 'uploads',
        };
    }

    /**
     * Remove upload-only keys from validated data before persisting.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function stripUploadKeys(array $data, string ...$keys): array
    {
        foreach ($keys as $key) {
            unset($data[$key]);
        }

        unset($data['remove_image']);

        return $data;
    }
}

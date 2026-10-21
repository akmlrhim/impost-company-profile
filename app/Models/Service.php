<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'service_name',
        'slug',
        'description',
        'category',
        'cover_path',
        'sort',
    ];

    protected static function booted(): void
    {
        static::updating(function (Service $service): void {
            if ($service->isDirty('cover_path') && ($old = $service->getOriginal('cover_path'))) {
                Storage::disk('public')->delete($old);
            }
        });

        static::deleted(function (Service $service): void {
            if ($service->cover_path) {
                Storage::disk('public')->delete($service->cover_path);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

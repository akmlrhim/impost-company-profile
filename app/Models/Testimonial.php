<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory;

    /** Tipe media testimonial yang didukung. */
    public const TYPES = ['text', 'photo', 'video'];

    /** @var list<string> */
    protected $fillable = ['name', 'company_name', 'type', 'content', 'media_path'];

    protected static function booted(): void
    {
        static::updating(function (Testimonial $testimonial): void {
            if ($testimonial->isDirty('media_path') && ($old = $testimonial->getOriginal('media_path'))) {
                Storage::disk('public')->delete($old);
            }
        });

        static::deleted(function (Testimonial $testimonial): void {
            if ($testimonial->media_path) {
                Storage::disk('public')->delete($testimonial->media_path);
            }
        });
    }

    /**
     * Simpan MIME type media bersama path-nya agar render foto/video
     * di frontend tidak perlu menebak dari ekstensi file.
     */
    public function setMediaPathAttribute(?string $value): void
    {
        $this->attributes['media_path'] = $value;
        $this->attributes['media_type'] = $value !== null
            ? Storage::disk('public')->mimeType($value)
            : null;
    }
}

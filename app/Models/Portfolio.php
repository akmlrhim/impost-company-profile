<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    protected $fillable = [
        'slug',
        'title',
        'media_path',
        'media_type',
        'category_id',
    ];

    protected static function booted(): void
    {
        static::updating(function (Portfolio $portfolio): void {
            if ($portfolio->isDirty('media_path') && ($old = $portfolio->getOriginal('media_path'))) {
                Storage::disk('public')->delete($old);
            }
        });

        static::deleted(function (Portfolio $portfolio): void {
            if ($portfolio->media_path) {
                Storage::disk('public')->delete($portfolio->media_path);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}

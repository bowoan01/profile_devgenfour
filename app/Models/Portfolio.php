<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'project_date',
        'featured_image',
        'location',
        'industry',
        'summary',
        'body',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'bool',
        'is_published' => 'bool',
    ];

    protected static function booted(): void
    {
        static::saving(function (Portfolio $portfolio) {
            if (blank($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function seoMetadata()
    {
        return $this->morphOne(SeoMetadata::class, 'seoable');
    }
}

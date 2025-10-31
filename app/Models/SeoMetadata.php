<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMetadata extends Model
{
    use HasFactory;

    protected $fillable = [
        'seoable_type',
        'seoable_id',
        'route_name',
        'title',
        'description',
        'keywords',
        'og_image',
        'extras',
    ];

    protected $casts = [
        'extras' => 'array',
    ];

    public function seoable()
    {
        return $this->morphTo();
    }
}

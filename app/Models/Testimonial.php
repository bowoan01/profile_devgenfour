<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'company',
        'rating',
        'message',
        'order_column',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'int',
        'order_column' => 'int',
        'is_active' => 'bool',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_column');
    }
}

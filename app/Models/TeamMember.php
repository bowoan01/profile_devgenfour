<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'email',
        'linkedin_url',
        'instagram_url',
        'bio',
        'is_active',
        'order_column',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'order_column' => 'int',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_column');
    }
}

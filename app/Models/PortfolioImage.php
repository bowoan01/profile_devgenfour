<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'path',
        'caption',
        'order_column',
    ];

    protected $casts = [
        'order_column' => 'int',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}

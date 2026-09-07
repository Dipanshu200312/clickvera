<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = ['title', 'category', 'description', 'image_path', 'live_link', 'is_featured', 'is_active', 'sort_order'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}

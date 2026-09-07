<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = ['category', 'name', 'price', 'description', 'features', 'is_highlighted', 'is_active', 'sort_order'];
    protected $casts = ['features' => 'array', 'is_highlighted' => 'boolean', 'is_active' => 'boolean'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComboPackage extends Model
{
    protected $fillable = ['name', 'price', 'description', 'features', 'is_active', 'sort_order'];
    protected $casts = ['features' => 'array', 'is_active' => 'boolean'];
}

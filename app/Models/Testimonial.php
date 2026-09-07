<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'role', 'image_path', 'rating', 'feedback', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}

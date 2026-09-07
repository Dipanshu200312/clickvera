<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'blog_category_id',
        'description',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if ($blog->blog_category_id) {
                $blog->category = BlogCategory::whereKey($blog->blog_category_id)->value('name') ?: $blog->category;
            }
        });
    }

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->blogCategory?->name ?: $this->category ?: 'Blog';
    }
}

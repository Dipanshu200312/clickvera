<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SiteSetting;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'settings' => SiteSetting::pluck('value', 'key'),
            'categories' => BlogCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
            'selectedCategory' => null,
            'blogs' => Blog::with('blogCategory')->where('is_active', true)->latest('published_at')->paginate(9),
        ]);
    }

    public function category(string $category): View
    {
        $selectedCategory = BlogCategory::where('slug', $category)->where('is_active', true)->first();

        abort_unless($selectedCategory, 404);

        return view('blog.index', [
            'settings' => SiteSetting::pluck('value', 'key'),
            'categories' => BlogCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
            'selectedCategory' => $selectedCategory,
            'blogs' => Blog::with('blogCategory')
                ->where('is_active', true)
                ->where('blog_category_id', $selectedCategory->id)
                ->latest('published_at')
                ->paginate(9),
        ]);
    }

    public function show(string $slug): View
    {
        $blog = Blog::with('blogCategory')->where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('blog.show', [
            'settings' => SiteSetting::pluck('value', 'key'),
            'blog' => $blog,
            'related' => Blog::with('blogCategory')
                ->where('is_active', true)
                ->where('blog_category_id', $blog->blog_category_id)
                ->whereKeyNot($blog->id)
                ->latest('published_at')
                ->limit(3)
                ->get(),
            'recentBlogs' => Blog::where('is_active', true)
                ->whereKeyNot($blog->id)
                ->latest('published_at')
                ->limit(4)
                ->get(),
            'categories' => BlogCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }
}

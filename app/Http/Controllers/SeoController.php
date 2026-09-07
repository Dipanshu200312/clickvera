<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        URL::forceRootUrl('https://www.clickvera.in');
        URL::forceScheme('https');

        $now = now()->toAtomString();

        $urls = collect([
            ['loc' => route('home'), 'lastmod' => $now, 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => route('about'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('services'), 'lastmod' => $now, 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['loc' => route('work'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('process'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('blog.index'), 'lastmod' => $now, 'changefreq' => 'daily', 'priority' => '0.9'],
            ['loc' => route('contact'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('privacy'), 'lastmod' => $now, 'changefreq' => 'yearly', 'priority' => '0.3'],
            ['loc' => route('terms'), 'lastmod' => $now, 'changefreq' => 'yearly', 'priority' => '0.3'],
        ]);

        $categoryUrls = BlogCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (BlogCategory $category) => [
                'loc' => route('blog.category', $category->slug),
                'lastmod' => $category->updated_at?->toAtomString() ?: $now,
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ]);

        $blogUrls = Blog::where('is_active', true)
            ->latest('published_at')
            ->get()
            ->map(fn (Blog $blog) => [
                'loc' => route('blog.show', $blog->slug),
                'lastmod' => ($blog->updated_at ?: $blog->published_at ?: now())->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ]);

        $xml = view('seo.sitemap', [
            'urls' => $urls->merge($categoryUrls)->merge($blogUrls),
        ])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $body = "User-agent: *\nAllow: /\nSitemap: ".URL::to('/sitemap.xml')."\n";
        return response($body, 200)->header('Content-Type', 'text/plain');
    }
}

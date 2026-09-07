@extends('layouts.app')
@section('meta_title', ($selectedCategory ? $selectedCategory->name.' Articles' : 'Blog').' | Clickvera')
@section('meta_description', 'Read Clickvera insights on digital marketing, website development, SEO, content, branding and practical online growth.')
@section('content')
<main class="overflow-hidden">
    <section class="page-hero" style="--page-image:url('https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1800&q=85')">
        <div class="hero-orb hero-orb-1" style="opacity:.2"></div><div class="hero-grid"></div>
        <div class="container-wide relative text-center">
            <div class="hero-badge mx-auto"><span></span>Insights</div>
            <h1>Insights for <span class="highlight">smarter</span> growth.</h1>
            <p>Practical ideas for marketing, websites, SEO, and content — no fluff, just what moves the needle.</p>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#fff"/></svg></div>

    <section class="section-light">
        <div class="container-wide">
            <div class="reveal flex flex-wrap gap-2">
                <a href="{{ route('blog.index') }}" class="{{ $selectedCategory ? 'rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-bold text-slate-700 hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700 transition' : 'rounded-full bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow' }}">All</a>
                @foreach($categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" class="{{ $selectedCategory?->id === $category->id ? 'rounded-full bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow' : 'rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-bold text-slate-700 hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700 transition' }}">{{ $category->name }}</a>
                @endforeach
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @forelse($blogs as $blog)
                    <article class="reveal group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm hover:-translate-y-1 hover:shadow-xl transition-all" style="--delay:{{$loop->index*60}}ms">
                        <div class="relative h-52 overflow-hidden bg-slate-100">
                            <img src="{{ $blog->featured_image ? asset('storage/'.$blog->featured_image) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=85' }}" alt="{{ $blog->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                            <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-black uppercase tracking-widest text-slate-700 shadow">{{ $blog->category_name }}</span>
                        </div>
                        <div class="flex flex-1 flex-col p-6">
                            <span class="text-xs font-bold uppercase tracking-widest text-emerald-600">{{ optional($blog->published_at)->format('M d, Y') ?? 'Insight' }}</span>
                            <h3 class="mt-2 line-clamp-2 text-lg font-black leading-tight text-slate-900 group-hover:text-emerald-700 transition">{{ $blog->title }}</h3>
                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ $blog->description }}</p>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-black text-slate-900 hover:text-emerald-600">Read more <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-12 text-center md:col-span-3">No blog posts published in this category yet.</div>
                @endforelse
            </div>
            <div class="mt-8">{{ $blogs->links() }}</div>
        </div>
    </section>
</main>
@endsection

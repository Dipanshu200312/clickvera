@extends('layouts.app')
@php
    $fallbackImage = 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1800&q=85';
    $featuredImage = $blog->featured_image ? asset('storage/'.$blog->featured_image) : $fallbackImage;
    $publishedDate = optional($blog->published_at ?: $blog->created_at)->format('M d, Y');
@endphp
@section('meta_title', $blog->meta_title ?: $blog->title)
@section('meta_description', $blog->meta_description ?: $blog->description)
@section('meta_keywords', $blog->meta_keywords ?: 'digital marketing, web development, content writing')
@section('og_type', 'article')
@section('og_image', $featuredImage)
@section('content')
<main class="overflow-hidden">
    <section class="relative overflow-hidden bg-slate-50 pb-10 pt-28 lg:pb-14 lg:pt-32">
        <div class="absolute inset-0 bg-gradient-to-b from-white to-slate-50"></div>
        <div class="container-wide relative">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 hover:border-emerald-300 hover:text-emerald-700"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg> Back to insights</a>
            <div class="mt-6 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-black uppercase tracking-widest text-emerald-700">{{ $blog->category_name ?? 'Insight' }} • {{ $publishedDate }}</div>
            <h1 class="mt-4 max-w-3xl text-3xl font-black leading-tight tracking-tight text-slate-900 lg:text-5xl">{{ $blog->title }}</h1>
            @if($blog->description)<p class="mt-3 max-w-2xl text-lg leading-7 text-slate-600">{{ $blog->description }}</p>@endif
        </div>
    </section>

    <section class="bg-slate-50 pb-14 lg:pb-20">
        <div class="container-wide grid gap-8 lg:grid-cols-[minmax(0,1fr)_340px] lg:items-start">
            <article>
                <figure class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
                    <div class="h-[240px] bg-slate-100 sm:h-[380px] lg:h-[480px]">
                        <img src="{{ $featuredImage }}" alt="{{ $blog->title }}" class="h-full w-full object-cover object-center">
                    </div>
                </figure>

                <div class="mt-8 rounded-2xl border border-slate-200 bg-white px-6 py-8 shadow-xl shadow-slate-200/60 sm:px-8 lg:px-10 lg:py-10">
                    <p class="mb-6 flex items-center gap-2 border-b border-slate-100 pb-5 text-sm font-bold text-slate-500">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span> Published on {{ $publishedDate }}
                    </p>
                    <div class="prose-page max-w-none rounded-none p-0 text-base leading-8 shadow-none sm:text-[1.0625rem]">
                        {!! $blog->content !!}
                    </div>
                    <div class="mt-10 flex flex-wrap gap-2 border-t border-slate-100 pt-6">
                        <span class="text-sm font-bold text-slate-500">Share:</span>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-bold hover:border-emerald-300 hover:text-emerald-700">LinkedIn</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-bold hover:border-emerald-300 hover:text-emerald-700">X</a>
                        <button onclick="navigator.clipboard.writeText(window.location.href)" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-bold hover:border-emerald-300 hover:text-emerald-700">Copy link</button>
                    </div>
                </div>
            </article>

            <aside class="grid gap-6 lg:sticky lg:top-28">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60">
                    <p class="text-xs font-black uppercase tracking-widest text-emerald-700">Recent insights</p>
                    <div class="mt-5 grid gap-3">
                        @forelse($recentBlogs as $recent)
                            @php($recentImage = $recent->featured_image ? asset('storage/'.$recent->featured_image) : $fallbackImage)
                            <a href="{{ route('blog.show', $recent->slug) }}" class="group grid grid-cols-[82px_1fr] gap-3 rounded-xl border border-slate-100 p-2.5 transition hover:border-emerald-200 hover:bg-emerald-50/60">
                                <div class="h-20 overflow-hidden rounded-lg bg-slate-100">
                                    <img src="{{ $recentImage }}" alt="{{ $recent->title }}" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <span class="text-[11px] font-bold uppercase tracking-widest text-slate-500">{{ optional($recent->published_at ?: $recent->created_at)->format('M d, Y') }}</span>
                                    <h3 class="mt-1 line-clamp-2 text-sm font-black leading-5 text-slate-900 group-hover:text-emerald-700">{{ $recent->title }}</h3>
                                </div>
                            </a>
                        @empty
                            <p class="rounded-xl bg-slate-50 p-4 text-sm font-semibold text-slate-600">No recent blogs available yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60">
                    <p class="text-xs font-black uppercase tracking-widest text-emerald-700">Categories</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @forelse($categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700">
                                {{ $category->name }}
                            </a>
                        @empty
                            <p class="text-sm text-slate-500">No categories yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl bg-slate-900 p-6 text-white shadow-xl">
                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-500/20 blur-2xl"></div>
                    <span class="inline-flex rounded-full bg-emerald-500 px-3 py-1 text-xs font-black uppercase tracking-widest text-white">Work with us</span>
                    <h2 class="mt-4 text-xl font-black leading-tight">Want a website or<br>marketing plan?</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-400">Tell us your goal and we’ll suggest the clearest next step.</p>
                    <a href="{{ route('contact') }}" class="btn-primary mt-5 w-full" style="justify-content:center">Get proposal <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                </div>
            </aside>
        </div>
    </section>

    @if($related->isNotEmpty())
        <section class="section-dark">
            <div class="container-wide">
                <p class="eyebrow">Related</p>
                <h2 class="section-title text-white">More insights</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-3">
                    @foreach($related as $item)
                        @php($relatedImage = $item->featured_image ? asset('storage/'.$item->featured_image) : $fallbackImage)
                        <a href="{{ route('blog.show', $item->slug) }}" class="reveal group overflow-hidden rounded-2xl border border-white/10 bg-white/[.04] backdrop-blur hover:bg-white/[.06] transition">
                            <div class="h-44 overflow-hidden"><img src="{{ $relatedImage }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]"></div>
                            <div class="p-5">
                                <span class="text-xs font-bold uppercase tracking-widest text-emerald-300">{{ optional($item->published_at ?: $item->created_at)->format('M d, Y') }}</span>
                                <h3 class="mt-2 line-clamp-2 text-base font-black text-white">{{ $item->title }}</h3>
                                <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-400">{{ $item->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection

@extends('layouts.app')
@section('meta_title', 'Our Work & Portfolio | Clickvera')
@section('meta_description', 'Explore selected Clickvera projects across website development, digital marketing, content and technical improvements.')
@section('content')
<main class="overflow-hidden">
    <section class="page-hero" style="--page-image:url('https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1800&q=85')">
        <div class="hero-orb hero-orb-1" style="opacity:.25"></div><div class="hero-grid"></div>
        <div class="container-wide relative text-center">
            <div class="hero-badge mx-auto"><span></span>Our Work</div>
            <h1>Recent <span class="highlight">launches</span> and digital improvement projects.</h1>
            <p>Selected work presented around challenge, solution, stack and business outcome — shipped, not just designed.</p>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#fff"/></svg></div>

    <section class="section-light">
        <div class="container-wide">
            <div class="reveal flex flex-wrap items-center justify-between gap-4">
                <div><p class="eyebrow-dark">Portfolio</p><h2 class="section-title !mt-2">Built to convert, not just to look good.</h2></div>
                <a href="{{ route('contact') }}" class="btn-primary hidden sm:inline-flex">Start a project <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2">
                @forelse($projects as $project)
                    <article class="reveal group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm hover:-translate-y-1 hover:shadow-xl transition-all">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=85' }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                            <div class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/95 px-3 py-1.5 text-xs font-black uppercase tracking-widest text-slate-700 shadow"><span class="h-2 w-2 rounded-full bg-emerald-500"></span>{{ $project->category }}</div>
                            @if($project->live_link)
                            <a href="{{ $project->live_link }}" target="_blank" class="absolute right-4 top-4 grid h-9 w-9 place-items-center rounded-xl bg-slate-900 text-white shadow-lg transition hover:bg-emerald-600">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-black tracking-tight text-slate-900">{{ $project->title }}</h3>
                            <div class="mt-5 grid gap-4 rounded-xl border border-slate-100 bg-slate-50 p-4">
                                @php $rows = [
                                    ['k'=>'Challenge','v'=>$project->description ?: 'Needed a clearer digital experience and stronger enquiry flow.'],
                                    ['k'=>'Our Solution','v'=>'Focused digital solution with improved structure, navigation and conversion paths.'],
                                    ['k'=>'Stack','v'=>$project->category ?: 'Website, design and digital implementation'],
                                    ['k'=>'Outcome','v'=>'Improved presence and smoother enquiry experience.'],
                                ]; @endphp
                                @foreach($rows as $r)
                                <div class="grid grid-cols-[110px_1fr] gap-3 text-sm"><b class="font-black text-slate-900">{{ $r['k'] }}</b><p class="leading-6 text-slate-600">{{ $r['v'] }}</p></div>
                                @endforeach
                            </div>
                            @if($project->live_link)
                                <a href="{{ $project->live_link }}" target="_blank" class="mt-5 inline-flex items-center gap-2 text-sm font-black text-emerald-600 hover:text-emerald-700">View live project <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="reveal rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center md:col-span-2">
                        <div class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-slate-100 text-slate-500"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6v6H9z"/></svg></div>
                        <p class="mt-4 font-bold text-slate-700">No projects yet</p><p class="mt-1 text-sm text-slate-500">Projects will appear here after publishing from admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-dark">
        <div class="container-wide grid gap-8 lg:grid-cols-[1.1fr_.9fr] lg:items-center">
            <div class="reveal">
                <p class="eyebrow">Have a project in mind?</p>
                <h2 class="section-title text-white">Let's turn your idea into a shipped product.</h2>
                <p class="mt-4 max-w-xl leading-7 text-slate-400">Share scope and goals — we’ll return a clear proposal with timeline and investment in 24 hours.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn-primary btn-xl">Book a Free Consultation</a>
                    <a href="{{ route('services') }}" class="btn-secondary btn-xl" style="background:rgba(255,255,255,.06); color:#fff; border-color:rgba(255,255,255,.12)">See services</a>
                </div>
            </div>
            <div class="reveal grid grid-cols-2 gap-4">
                <div class="rounded-2xl border border-white/10 bg-white/[.04] p-6 backdrop-blur"><div class="text-3xl font-black text-white">14d</div><div class="text-xs font-bold uppercase tracking-widest text-slate-400">Avg. to first launch</div></div>
                <div class="rounded-2xl border border-white/10 bg-white/[.04] p-6 backdrop-blur"><div class="text-3xl font-black text-white">4.9/5</div><div class="text-xs font-bold uppercase tracking-widest text-slate-400">Client satisfaction</div></div>
                <div class="col-span-2 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-6"><p class="text-sm font-bold uppercase tracking-widest text-emerald-300">What you get</p><p class="mt-2 text-sm leading-6 text-slate-300">Scope + timeline + fixed investment before we start. No surprises.</p></div>
            </div>
        </div>
    </section>
</main>
@endsection

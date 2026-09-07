@extends('layouts.app')
@section('meta_title', 'Our Process | Clickvera')
@section('meta_description', 'See Clickvera seven-step process for discovery, strategy, design, development, launch, growth and support.')
@section('content')
@php
    $steps = [
        ['number' => '01', 'title' => 'Discover', 'description' => 'We understand your business, goals and requirements.'],
        ['number' => '02', 'title' => 'Strategise', 'description' => 'We create a clear project and digital strategy based on your objectives.'],
        ['number' => '03', 'title' => 'Design', 'description' => 'We create user-focused designs and prototypes that align with your brand and audience.'],
        ['number' => '04', 'title' => 'Build', 'description' => 'We develop, test and optimise your digital solution.'],
        ['number' => '05', 'title' => 'Launch', 'description' => 'We deploy your project and ensure everything works smoothly.'],
        ['number' => '06', 'title' => 'Grow', 'description' => 'We provide ongoing marketing, SEO and digital growth support.'],
        ['number' => '07', 'title' => 'Support', 'description' => 'We help maintain, secure and continuously improve your digital presence.'],
    ];
@endphp
<main class="overflow-hidden">
    <section class="page-hero" style="--page-image:url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1800&q=85')">
        <div class="hero-orb hero-orb-1" style="opacity:.25"></div><div class="hero-grid"></div>
        <div class="container-wide relative text-center">
            <div class="hero-badge mx-auto"><span></span>Our Process</div>
            <h1>A clear workflow from first <span class="highlight">conversation</span> to ongoing support.</h1>
            <p>Seven steps, one owner, zero surprises — from discovery to continuous improvement.</p>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#0B1120"/></svg></div>

    <section class="section-dark" style="padding-bottom:5rem">
        <div class="container-wide">
            {{-- Timeline rail (desktop) --}}
            <div class="relative">
                <div class="pointer-events-none absolute left-[3.5rem] right-[3.5rem] top-[52px] hidden h-[2px] bg-gradient-to-r from-emerald-500/0 via-emerald-500/40 to-cyan-500/0 lg:block"></div>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @foreach(array_slice($steps,0,4) as $step)
                        <article class="reveal group relative rounded-2xl border border-white/10 bg-white/[.04] p-6 backdrop-blur transition hover:-translate-y-1 hover:bg-white/[.06]" style="--delay:{{$loop->index*70}}ms">
                            <div class="flex items-center gap-3">
                                <div class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-emerald-500 to-cyan-500 font-black text-white shadow-lg shadow-emerald-500/20">{{ $step['number'] }}</div>
                                <div class="h-1 flex-1 rounded-full bg-white/10 group-hover:bg-emerald-500/30 transition"></div>
                            </div>
                            <h3 class="mt-5 text-base font-black tracking-widest text-white">{{ strtoupper($step['title']) }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-400">{{ $step['description'] }}</p>
                        </article>
                    @endforeach
                </div>
                <div class="mx-auto mt-6 grid max-w-4xl gap-6 md:grid-cols-3">
                    @foreach(array_slice($steps,4) as $step)
                        <article class="reveal rounded-2xl border border-white/10 bg-white/[.04] p-6 backdrop-blur hover:-translate-y-1 hover:bg-white/[.06] transition" style="--delay:{{(4+$loop->index)*70}}ms">
                            <div class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-emerald-500 to-cyan-500 font-black text-white shadow-lg">{{ $step['number'] }}</div>
                            <h3 class="mt-5 text-base font-black tracking-widest text-white">{{ strtoupper($step['title']) }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-400">{{ $step['description'] }}</p>
                        </article>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="reveal mx-auto mt-12 max-w-3xl rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-6 text-center backdrop-blur">
                <p class="text-sm font-black uppercase tracking-widest text-emerald-300">What happens after support?</p>
                <p class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-300">We loop back to Discover — continuous improvement beats one-off launches. Your roadmap stays alive.</p>
                <a href="{{ route('contact') }}" class="btn-primary mt-5">Start with discovery <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
            </div>
        </div>
    </section>

    <section class="section-light">
        <div class="container-wide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
                <p class="eyebrow-dark">Why this process works</p>
                <h2 class="section-title">No black boxes, no status-chasing.</h2>
                <ul class="mt-6 grid gap-3">
                    @php $bullets = ['One senior owner end-to-end','Weekly demo + written update','Fixed scope, fixed investment','Launch is day one, not the finish line']; @endphp
                    @foreach($bullets as $b)
                    <li class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm"><span class="grid h-7 w-7 place-items-center rounded-full bg-emerald-50 text-emerald-600">✓</span>{{ $b }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="reveal rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="rounded-xl bg-white p-4 shadow-sm"><div class="text-2xl font-black text-slate-900">7</div><div class="text-xs font-bold uppercase tracking-widest text-slate-500">Steps</div></div>
                    <div class="rounded-xl bg-white p-4 shadow-sm"><div class="text-2xl font-black text-slate-900">1</div><div class="text-xs font-bold uppercase tracking-widest text-slate-500">Owner</div></div>
                    <div class="rounded-xl bg-white p-4 shadow-sm"><div class="text-2xl font-black text-slate-900">∞</div><div class="text-xs font-bold uppercase tracking-widest text-slate-500">Iterations</div></div>
                </div>
                <p class="mt-6 text-sm leading-6 text-slate-600">We ship in increments, get feedback early, and keep momentum. You’ll always know what’s next.</p>
                <a href="{{ route('services') }}" class="btn-light mt-4 w-full" style="justify-content:center">See what we build</a>
            </div>
        </div>
    </section>
</main>
@endsection

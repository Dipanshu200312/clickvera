@extends('layouts.app')
@section('meta_title', 'Contact Us | Clickvera')
@section('meta_description', 'Contact Clickvera to discuss website development, UI/UX design, software, digital marketing, SEO, content, branding or technical support.')
@section('meta_keywords', 'contact digital marketing agency India, web development company contact, Clickvera contact')
@section('schema')
{{-- ContactPage schema with the verified site-wide phone and email. --}}
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'ContactPage',
    '@id' => 'https://www.clickvera.in/contact#page',
    'name' => 'Contact ClickVera — Book a Free Consultation',
    'url' => 'https://www.clickvera.in/contact',
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'ClickVera',
        'url' => 'https://www.clickvera.in/',
        'email' => 'team@clickvera.in',
        'telephone' => '+91-8178842239',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
@section('content')
<main class="overflow-hidden">
    <section class="page-hero" style="--page-image:url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=70')">
        <div class="hero-orb hero-orb-1" style="opacity:.25"></div><div class="hero-grid"></div>
        <div class="container-wide relative text-center">
            <div class="hero-badge mx-auto"><span></span>Contact</div>
            <h1>Book a <span class="highlight">free consultation.</span></h1>
            <p>Tell us about your business, goals and requirements — we’ll recommend the right next step in one call.</p>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#f8fafc"/></svg></div>

    <section class="section-light contact-page-section" style="padding-top:3rem">
        <div class="container-wide grid gap-10 lg:grid-cols-[.9fr_1.1fr] lg:items-start">
            <div class="contact-page-info reveal lg:sticky lg:top-28">
                <p class="eyebrow-dark">Start here</p>
                <h2 class="section-title">Let’s discuss your project.</h2>
                <p class="mt-4 max-w-xl leading-7 text-slate-400">Prefer email or phone? Reach us directly — average response time within 24 hours.</p>

                <div class="mt-8 grid gap-3">
                    <a href="mailto:{{ $settings['contact_email'] ?? 'team@clickvera.in' }}" class="contact-direct-card">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-white text-slate-900"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                        <div><div class="text-xs font-bold uppercase tracking-widest text-slate-400">Email</div><div class="font-bold text-white group-hover:text-emerald-300">{{ $settings['contact_email'] ?? 'team@clickvera.in' }}</div></div>
                    </a>
                    <a href="tel:{{ preg_replace('/\s+/', '', $settings['contact_phone'] ?? '+918178842239') }}" class="contact-direct-card">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-emerald-500 text-white"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81 19.79 19.79 0 01.08 2.18 2 2 0 012.06 0h3a2 2 0 012 1.72c.12 1.33.43 2.64.93 3.9a2 2 0 01-.57 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.57c1.26.5 2.57.81 3.9.93A2 2 0 0122 16.92z"/></svg></span>
                        <div><div class="text-xs font-bold uppercase tracking-widest text-slate-400">Phone / WhatsApp</div><div class="font-bold text-white group-hover:text-emerald-300">{{ $settings['contact_phone'] ?? '+91 8178842239' }}</div></div>
                    </a>
                    <div class="contact-direct-card">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-white"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                        <div><div class="text-xs font-bold uppercase tracking-widest text-slate-400">Response time</div><div class="font-bold text-white">Within 24 hours</div></div>
                    </div>
                </div>

                @if($faqs->isNotEmpty())
                <div class="mt-8">
                    <h3 class="text-sm font-black uppercase tracking-widest text-white">Quick answers</h3>
                    <div class="mt-4 grid gap-2">
                    @foreach($faqs as $faq)
                        <details class="group rounded-xl border border-white/10 bg-white/[.03] open:bg-white/[.06]">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-4 py-3 text-sm font-bold text-white">{{ $faq->question }}<span class="grid h-7 w-7 place-items-center rounded-full border border-white/10 bg-white/5 text-white group-open:rotate-45 transition">+</span></summary>
                            <p class="px-4 pb-4 text-sm leading-6 text-slate-400">{{ $faq->answer }}</p>
                        </details>
                    @endforeach
                    </div>
                </div>
                @endif
            </div>

            <form method="post" action="{{ route('contact.store') }}" class="contact-card contact-page-form reveal">
                @csrf
                <div class="contact-page-form-head"><div><span class="plan-badge">Project inquiry</span><h2>Tell us what you're building.</h2><p>We’ll get back within 24 hours with scope, timeline and investment.</p></div><span class="contact-form-step">02</span></div>

                @if(session('success'))
                    <div class="success-alert">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="mt-5 rounded-xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-200">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <div class="contact-page-fields">
                    <label><span>Full name</span><input class="field-dark" name="name" value="{{ old('name') }}" placeholder="Your name" required></label>
                    <label><span>Phone number <small>Optional</small></span><input class="field-dark" name="phone" value="{{ old('phone') }}" placeholder="+91 81788 42239"></label>
                    <label class="contact-page-field-wide"><span>Work email</span><input class="field-dark" name="email" type="email" value="{{ old('email') }}" placeholder="you@company.com" required></label>
                    <label class="contact-page-field-wide"><span>Project details</span><textarea class="field-dark min-h-36" name="message" placeholder="Tell us about your goals, timeline and budget" required>{{ old('message') }}</textarea></label>
                    <button class="btn-primary btn-xl w-full" type="submit" style="justify-content:center">Book a Free Consultation <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></button>
                    <p class="contact-page-privacy">🔒 No spam. No obligation. Just a helpful conversation.</p>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection

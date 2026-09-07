@extends('layouts.app')
@section('meta_title', 'About Us | Clickvera')
@section('meta_description', 'Learn about Clickvera, a digital and technology partner for design, development, marketing and ongoing support.')
@section('content')
<main class="overflow-hidden">
    {{-- Hero --}}
    <section class="page-hero about-page-hero" style="--page-image:url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1800&q=85')">
        <div class="hero-orb hero-orb-1" style="opacity:.35"></div>
        <div class="hero-orb hero-orb-2" style="opacity:.25"></div>
        <div class="hero-grid"></div>
        <div class="container-wide relative about-hero-layout">
            <div class="about-hero-copy">
                <div class="hero-badge" style="background:rgba(52,211,153,.08); border-color:rgba(52,211,153,.2)"><span></span>About Clickvera</div>
                <h1>We turn digital complexity into <span class="highlight">clear growth.</span></h1>
                <p>Strategy, design, development, marketing and ongoing support from one accountable team—built around your business, not buzzwords.</p>
                <div class="about-hero-actions"><a href="{{ route('contact') }}" class="btn-primary btn-xl">Start a conversation <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg></a><a href="{{ route('services') }}" class="about-hero-link">Explore our services</a></div>
            </div>
            <aside class="about-hero-panel reveal">
                <p>What you can expect</p>
                <div><span>01</span><strong>Senior attention</strong><small>Direct access to the people doing the work.</small></div>
                <div><span>02</span><strong>Clear communication</strong><small>Scope, progress and next steps without jargon.</small></div>
                <div><span>03</span><strong>Built for outcomes</strong><small>Every decision tied back to business value.</small></div>
            </aside>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#fff"/></svg></div>

    {{-- Who we are --}}
    <section class="section-light">
        <div class="container-wide grid gap-12 lg:grid-cols-2 lg:items-center">
            <div class="image-feature-card reveal">
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1400&q=85" alt="Agency team">
                <div><span>Growth team</span><strong>Small enough to move fast, senior enough to move correctly.</strong></div>
            </div>
            <div class="reveal">
                <p class="eyebrow-dark">Who we are</p>
                <h2 class="section-title">{{ $settings['about_title'] ?? 'A professional digital and technology team for businesses that want clarity.' }}</h2>
                <p class="mt-6 text-[1.0625rem] leading-8 text-slate-600">{{ $settings['about_description'] ?? 'We combine strategy, UI/UX design, development, SEO, digital marketing, content, branding and technical support into one practical service experience. No silos — one accountable partner.' }}</p>
                <div class="mt-8 grid grid-cols-3 gap-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-center"><b class="block text-2xl font-black text-slate-900">150+</b><span class="text-xs font-bold uppercase tracking-widest text-slate-500">Projects</span></div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-center"><b class="block text-2xl font-black text-slate-900">50+</b><span class="text-xs font-bold uppercase tracking-widest text-slate-500">Clients</span></div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-center"><b class="block text-2xl font-black text-slate-900">98%</b><span class="text-xs font-bold uppercase tracking-widest text-slate-500">Retention</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="section-light alt">
        <div class="container-wide">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="eyebrow-dark" style="justify-content:center">How we work</p>
                <h2 class="section-title mx-auto text-center">Principles that keep projects calm and profitable.</h2>
                <p class="mx-auto mt-4 max-w-xl text-center text-slate-600 leading-7">We optimize for outcomes, not hours. Every decision is measured against your revenue, reputation, and runway.</p>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @php $values = [
                    ['title'=>'Clarity first','desc'=>'Plain scope, plain pricing, plain timelines. You always know what is being built and why.','grad'=>'linear-gradient(135deg, var(--cv-green), var(--cv-cyan))','icon'=>'M9 12l2 2 4-4M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['title'=>'Ownership','desc'=>'One senior owner from discovery to launch. No hand-offs, no ticket shuffle, just progress.','grad'=>'linear-gradient(135deg, var(--cv-cyan), var(--cv-violet))','icon'=>'M12 15a3 3 0 100-6 3 3 0 000 6z M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 01-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1-1.51V12a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0015.4 15a1.65 1.65 0 001 1.51V18a2 2 0 014 0v-.09a1.65 1.65 0 00-1-1.51z'],
                    ['title'=>'Craft & care','desc'=>'Pixel care, performance budgets, and content that converts. Built to last, not just to launch.','grad'=>'linear-gradient(135deg, var(--cv-orange), var(--cv-orange-deep))','icon'=>'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
                ]; @endphp
                @foreach($values as $v)
                <div class="reveal rounded-2xl border border-slate-200 bg-white p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all" style="--delay:{{$loop->index*80}}ms">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl text-white shadow-lg" style="background:{{$v['grad']}}">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="{{$v['icon']}}"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-black text-slate-900">{{$v['title']}}</h3>
                    <p class="mt-2 text-[0.9375rem] leading-7 text-slate-600">{{$v['desc']}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    @php
        $aboutTestimonials = $testimonials->map(fn ($item) => ['name' => $item->name, 'role' => $item->role, 'feedback' => $item->feedback]);
        if ($aboutTestimonials->isEmpty()) {
            $aboutTestimonials = collect([
                ['name'=>'Aarav Mehta','role'=>'Founder, Retail Brand','feedback'=>'Clickvera gave our brand a much stronger digital presence. The process was clear, responsive, and focused on results.'],
                ['name'=>'Neha Sharma','role'=>'Director, Education','feedback'=>'The team understood our requirements quickly and delivered a clean, fast website that is easier for customers to use.'],
                ['name'=>'Rohan Kapoor','role'=>'E-commerce Owner','feedback'=>'From design to launch, everything was handled professionally. We have seen a clear improvement in enquiries and conversions.'],
                ['name'=>'Priya Verma','role'=>'Marketing Manager','feedback'=>'Their communication and attention to detail stood out. Every milestone was clear and delivered on time.'],
                ['name'=>'Kunal Singh','role'=>'Founder, Service Business','feedback'=>'Clickvera turned our ideas into a polished digital experience that looks premium and works across every device.'],
                ['name'=>'Simran Kaur','role'=>'Brand Consultant','feedback'=>'A dependable creative and technology partner with practical suggestions, strong execution and genuine care.'],
            ]);
        }
    @endphp
    <section class="section-light testimonials-section about-testimonials-section" style="background: transparent !important;">
        <div class="container-wide">
            <div class="testimonial-heading reveal">
                <div><p class="eyebrow">CLIENT STORIES</p><h2 class="section-title text-white">Trusted by businesses.<br><em>Remembered for results.</em></h2></div>
                <div class="testimonial-summary"><div class="testimonial-score"><strong>4.9</strong><span><b>★★★★★</b>Average client rating</span></div><p>Clear communication, thoughtful execution, and digital work that moves businesses forward.</p></div>
            </div>
            <div class="testimonial-carousel reveal" data-carousel="about-testimonials">
                <div class="carousel-track">
                    @foreach($aboutTestimonials as $testimonial)
                    <article class="testimonial-quote-card carousel-card">
                        <div class="testimonial-card-top"><span class="testimonial-stars">★★★★★</span><span class="testimonial-verified">✓ Verified client</span></div>
                        <div class="quote-icon">&ldquo;</div><p class="quote-text">{{ $testimonial['feedback'] }}</p>
                        <div class="quote-author"><div><div class="author-name">{{ $testimonial['name'] }}</div><div class="author-role">{{ $testimonial['role'] }}</div></div></div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="testimonial-carousel-footer">
                <div class="carousel-dots testimonial-dots" data-carousel-dots="about-testimonials"></div>
                <div class="carousel-actions testimonial-actions" data-carousel-controls="about-testimonials"><button type="button" data-dir="-1" aria-label="Previous testimonial">←</button><button type="button" data-dir="1" aria-label="Next testimonial">→</button></div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section-gradient">
        <div class="container-wide">
            <div class="mx-auto max-w-3xl text-center reveal" style="position:relative; z-index:1">
                <p class="eyebrow" style="justify-content:center">Next step</p>
                <h2 class="section-title mx-auto text-white text-center">Let’s make your next launch your best one.</h2>
                <p class="mx-auto mt-4 max-w-xl text-center leading-7" style="color:rgba(203,213,225,.65)">Book a free consultation — we’ll map scope, timeline, and investment in one call.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <a href="{{ route('contact') }}" class="btn-primary btn-xl">Book a Free Consultation <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                    <a href="{{ route('services') }}" class="btn-secondary btn-xl" style="background:rgba(255,255,255,.08); color:#fff; border-color:rgba(255,255,255,.14)">Explore services</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

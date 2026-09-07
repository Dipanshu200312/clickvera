@extends('layouts.app')
@section('meta_title', 'Services & Pricing | Clickvera')
@section('meta_description', 'Explore Clickvera services for website development, UI/UX design, software, mobile apps, digital marketing, SEO, social media, content, branding and technical support.')
@section('content')
@php
    $serviceCategories = [
        'Build' => [
            'message' => 'We build the digital products and experiences your business needs.',
            'services' => ['Website Design & Development', 'UI/UX Design', 'Figma Design & Prototyping', 'Web Application Development', 'Mobile App Development', 'Custom Software Development', 'E-commerce Development'],
        ],
        'Grow' => [
            'message' => 'We help your business increase visibility, reach customers and generate leads.',
            'services' => ['SEO', 'Local SEO', 'Social Media Management', 'Social Media Marketing', 'Digital Marketing', 'Lead Generation', 'Content Writing', 'Content Marketing'],
        ],
        'Support & Create' => [
            'message' => 'We help you maintain, secure and continuously improve your digital presence.',
            'services' => ['Technical Support & IT Services', 'Website Maintenance', 'Website Security', 'Graphic Design', 'Branding', 'Video & Creative Content Services'],
        ],
    ];
    $plans = [
        ['name' => 'Launch', 'badge' => 'STARTER', 'price' => '₹15,000 - ₹25,000', 'label' => 'One-time project', 'heading' => 'Build Your Digital Foundation', 'description' => 'A professional starting point for new businesses, local businesses and professionals looking to establish a strong online presence.', 'features' => ['1-5 page responsive business website', 'Mobile-friendly design', 'Basic UI/UX design', 'Contact form integration', 'WhatsApp integration', 'Basic on-page SEO setup', 'Google Analytics / tracking setup', 'Social profile setup and optimisation for up to 2 platforms', 'Basic website speed optimisation'], 'ideal' => 'New businesses, local businesses and professionals launching online.', 'cta' => 'Get Started', 'featured' => false],
        ['name' => 'Growth', 'badge' => 'MOST POPULAR', 'price' => '₹40,000 - ₹60,000', 'label' => 'One-time project', 'heading' => 'Build Your Brand. Generate More Leads.', 'description' => 'A complete digital foundation for growing businesses that need a stronger online presence and a website designed to support marketing and lead generation.', 'features' => ['Up to 10-page custom website', 'Custom UI/UX design', 'Figma design and prototyping', 'Mobile-responsive development', 'SEO-friendly website structure', 'Basic content support', 'Contact and lead-generation forms', 'WhatsApp integration', 'Google Analytics and conversion tracking', 'Social media profile setup and optimisation', 'Basic technical SEO setup'], 'ideal' => 'Growing businesses, startups and professional service companies.', 'cta' => 'Start Growing', 'featured' => true],
        ['name' => 'Scale', 'badge' => 'SCALE', 'price' => 'Starting from ₹80,000', 'label' => 'Custom project + optional monthly growth retainer', 'heading' => 'Build, Grow & Scale Your Digital Business', 'description' => 'A customised digital solution for established businesses that need advanced technology, marketing and ongoing digital growth support.', 'features' => ['Custom website or e-commerce development', 'Advanced UI/UX design', 'Figma design and prototyping', 'Advanced SEO strategy', 'Social media management', 'Content strategy and content creation', 'Google & Meta Ads management', 'Lead generation strategy', 'Conversion optimisation', 'Monthly performance reporting', 'Ongoing technical support'], 'ideal' => 'Established businesses and ambitious brands ready for long-term digital growth.', 'cta' => 'Talk to an Expert', 'featured' => false],
    ];
    $plans[0]['price'] = '₹19,999';
    $plans[1]['price'] = '₹34,999';
    $plans[2]['price'] = '₹49,999';

    $customServices = ['Web Application Development', 'Mobile App Development', 'Custom Software Development', 'E-commerce Development', 'Advanced Website Development', 'Custom UI/UX Design', 'Business System Integrations', 'CRM Integrations', 'API Integrations', 'Technical Consulting'];
    $supportPlans = [
        ['title' => 'SEO & Local SEO', 'price' => 'Starting from ₹10,000/month', 'description' => 'Improve your search visibility, local presence and organic traffic through ongoing SEO optimisation.', 'cta' => 'Explore SEO'],
        ['title' => 'Social Media Management', 'price' => 'Starting from ₹10,000/month', 'description' => 'Build a consistent social media presence with content planning, creative support, publishing and reporting.', 'cta' => 'Explore Social Media'],
        ['title' => 'Digital Marketing & Lead Generation', 'price' => 'Starting from ₹20,000/month', 'description' => 'Generate qualified leads through targeted digital marketing campaigns and conversion-focused strategies.', 'note' => 'Advertising budget billed separately.', 'cta' => 'Grow Your Business'],
        ['title' => 'Website Maintenance & Security', 'price' => 'Starting from ₹5,000/month', 'description' => 'Keep your website secure, updated, backed up and performing reliably with ongoing technical support.', 'cta' => 'Get Support'],
    ];
    $industries = ['Startups', 'Small Businesses', 'SMEs', 'Local Businesses', 'Professional Services', 'E-commerce Brands'];
@endphp
<main class="overflow-hidden">
    <section class="page-hero services-page-hero" style="--page-image:url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1800&q=85')">
        <div class="hero-orb hero-orb-1" style="opacity:.3"></div><div class="hero-orb hero-orb-2" style="opacity:.2"></div><div class="hero-grid"></div>
        <div class="container-wide relative services-hero-content">
            <div class="services-hero-copy">
            <div class="hero-badge"><span></span>Full-service digital partner</div>
            <h1>Everything your business needs to <span class="highlight">win online.</span></h1>
            <p>Strategy, design, technology and marketing working as one connected team—from your first idea to long-term growth.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#services" class="btn-primary btn-xl">Explore services <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg></a>
                <a href="#pricing" class="btn-secondary btn-xl" style="background:rgba(255,255,255,.08); color:#fff; border-color:rgba(255,255,255,.14)">View pricing</a>
            </div>
            <div class="services-hero-proof"><span><b>20+</b> digital services</span><span><b>3</b> connected teams</span><span><b>1</b> accountable partner</span></div>
            </div>
            <div class="services-hero-path reveal">
                <p>Your growth journey</p>
                @foreach([['01','BUILD','Launch strong digital foundations'],['02','GROW','Reach and convert more customers'],['03','SUPPORT','Improve, secure and scale']] as $step)
                    <div class="services-path-step"><span>{{ $step[0] }}</span><div><b>{{ $step[1] }}</b><small>{{ $step[2] }}</small></div><i>↗</i></div>
                @endforeach
                <div class="services-path-foot"><span></span>One team from strategy to support</div>
            </div>
        </div>
    </section>
    <div class="section-wave" style="background:var(--cv-ink)"><svg viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none" style="height:60px"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#0B1120"/></svg></div>

    <section id="services" class="section-dark services-catalog-section">
        <div class="container-wide">
            <div class="services-catalog-heading reveal">
                <div><p class="eyebrow">What we do</p><h2 class="section-title text-white">Three capabilities.<br><em>One connected strategy.</em></h2></div>
                <p>Every engagement is mapped to your business stage. Choose a focused service or combine capabilities into one complete growth partnership.</p>
            </div>
            <div class="service-category-list reveal">
                @foreach($serviceCategories as $category => $group)
                    <article class="service-category-row">
                        <div class="service-row-number">0{{ $loop->iteration }}</div>
                        <div class="service-row-intro">
                            <div class="service-row-title"><span>{{ $loop->iteration === 1 ? '✓' : ($loop->iteration === 2 ? '↗' : '◇') }}</span><h3>{{ $category }}</h3></div>
                            <p>{{ $group['message'] }}</p>
                            <a href="{{ route('contact') }}">Explore <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg></a>
                        </div>
                        <div class="service-row-services">
                            @foreach($group['services'] as $service)
                                <div><span></span><b>{{ $service }}</b></div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="industries" class="section-light services-industries-section">
        <div class="container-wide">
            <div class="flex flex-wrap items-end justify-between gap-6 reveal">
                <div><p class="eyebrow-dark">Industries</p><h2 class="section-title">Built for practical business growth.</h2><p class="mt-3 max-w-xl text-slate-600 leading-7">Solutions shaped around your market, customer journey and digital maturity.</p></div>
                <span class="hidden sm:inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-600">6 verticals • 100% tailored</span>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($industries as $industry)
                    <div class="industry-service-card reveal" style="--delay:{{$loop->index*60}}ms">
                        <span class="industry-card-index">0{{ $loop->iteration }}</span>
                        <div class="industry-card-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg></div>
                        <b class="text-[1.05rem] font-black text-slate-900">{{ $industry }}</b><p class="mt-2 text-sm leading-6 text-slate-600">Solutions shaped around your market, customer journey and current digital maturity.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="pricing" class="section-light alt">
        <div class="container-wide">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="eyebrow-dark" style="justify-content:center">Pricing</p>
                <h2 class="section-title mx-auto text-center">Plans designed around your business goals</h2>
                <p class="mx-auto mt-4 max-w-xl text-center leading-7 text-slate-600">Whether launching or scaling, pick the plan that matches your current stage. Custom solutions available.</p>
            </div>
            <div class="home-packages-wrap mt-10">
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach($plans as $plan)
                    <article class="home-package-card {{ $plan['featured'] ? 'is-featured' : '' }} reveal" style="--delay:{{$loop->index*80}}ms">
                        <span class="home-package-badge">{{ $plan['badge'] }}</span>
                        <h4 class="mt-4 text-xl font-black" style="letter-spacing:-.02em">{{ $plan['name'] }}</h4>
                        <p class="home-package-price">{{ $plan['price'] }}</p>
                        <p class="mt-1 text-xs font-black uppercase tracking-widest text-slate-400">{{ $plan['label'] }}</p>
                        <h5 class="mt-5 text-base font-black">{{ $plan['heading'] }}</h5>
                        <p class="home-package-summary">{{ $plan['description'] }}</p>
                        <ul class="home-package-features">
                            @foreach($plan['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <div class="home-package-meta">
                            <span>Ideal for</span>
                            <p>{{ $plan['ideal'] }}</p>
                        </div>
                        <a class="{{ $plan['featured'] ? 'btn-primary' : 'btn-light' }} mt-6 w-full" style="justify-content:center" href="{{ route('contact') }}">{{ $plan['cta'] }}</a>
                        @if($plan['name'] === 'Scale')
                            <p class="mt-4 text-xs leading-5 text-slate-500">Advertising spend, hosting, domain, paid plugins, third-party software and other external platform costs are billed separately.</p>
                        @endif
                    </article>
                @endforeach
            </div>
            </div>
        </div>
    </section>

    <section class="section-dark custom-solutions-section">
        <div class="container-wide custom-solutions-layout">
            <div class="section-heading custom-solutions-intro reveal">
                <p class="eyebrow"><span></span>Custom Solutions</p>
                <h2 class="section-title text-white">Built around your<br><em>exact workflow.</em></h2>
                <p class="section-subtitle">Every business has different goals. We’ll scope a tailored solution around timeline, budget, and outcomes.</p>
                <a href="{{ route('contact') }}" class="btn-primary mt-8">Discuss Your Project <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
            </div>
            <div class="custom-solutions-list">
                @foreach($customServices as $customService)
                    <div class="custom-solution-row reveal"><span class="custom-solution-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><strong class="custom-solution-name">{{ $customService }}</strong><b class="custom-solution-arrow">↗</b></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-light monthly-services-section">
        <div class="container-wide">
            <div class="monthly-services-heading"><div><p class="eyebrow-dark">Monthly Services</p><h2 class="section-title">Ongoing growth.<br>Reliable support.</h2></div><p>Flexible monthly partnerships designed to keep your digital presence visible, secure and continuously improving.</p></div>
            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach($supportPlans as $supportPlan)
                    <article class="monthly-service-card reveal" style="--delay:{{$loop->index*70}}ms">
                        <span class="monthly-card-number">0{{ $loop->iteration }}</span>
                        <h4 class="mt-4 text-base font-black text-slate-900">{{ $supportPlan['title'] }}</h4>
                        <p class="mt-2 text-sm font-black text-emerald-600">{{ $supportPlan['price'] }}</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $supportPlan['description'] }}</p>
                        @isset($supportPlan['note'])<p class="mt-2 text-xs font-bold text-slate-500">{{ $supportPlan['note'] }}</p>@endisset
                        <a class="btn-plan mt-5" href="{{ route('contact') }}">{{ $supportPlan['cta'] }}</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-gradient plan-guidance-section">
        <div class="container-wide text-center">
            <div class="mx-auto max-w-3xl reveal" style="position:relative; z-index:1">
                <p class="eyebrow" style="justify-content:center">Plan Guidance</p>
                <h2 class="section-title mx-auto text-white text-center">Not sure which plan is right for you?</h2>
                <p class="section-subtitle mx-auto text-center" style="color:rgba(203,213,225,.7)">Tell us about your business, goals and requirements. Our team will recommend the right solution.</p>
                <a href="{{ route('contact') }}" class="btn-primary btn-xl mt-8">Book a Free Consultation <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                <p class="mt-3 text-sm font-semibold text-slate-400">No obligation. Just a conversation about your project.</p>
            </div>
        </div>
    </section>
</main>
@endsection

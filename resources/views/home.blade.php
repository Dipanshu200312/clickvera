@extends('layouts.app')
@section('meta_title', 'Digital Marketing & Web Development Agency in India | ClickVera')
@section('meta_description', 'ClickVera is a digital marketing and web development agency in India offering SEO, websites, e-commerce, UI/UX, digital marketing and technology solutions.')
@section('canonical_url', 'https://www.clickvera.in/')
@section('og_image', 'https://www.clickvera.in/assets/logo/logo.png')
@section('schema')
{{-- Organization schema (head). Add "sameAs": ["<linkedin>", "<instagram>", "<x>"] once real profile URLs are available. --}}
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => 'https://www.clickvera.in/#organization',
    'name' => 'ClickVera',
    'url' => 'https://www.clickvera.in/',
    'logo' => 'https://www.clickvera.in/assets/logo/logo.png',
    'email' => 'team@clickvera.in',
    'telephone' => '+91 8178842239',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
{{-- FAQPage schema (head). Questions/answers mirror the visible FAQ section below. --}}
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'FAQPage',
    '@id' => 'https://www.clickvera.in/#faq',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'What services does ClickVera provide?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'ClickVera provides website design and development, UI/UX design, web application development, e-commerce development, SEO and local SEO, digital marketing, social media management, lead generation, content, branding and website maintenance and technical support.']],
        ['@type' => 'Question', 'name' => 'Does ClickVera provide SEO services?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. ClickVera provides SEO and local SEO services, including on-page optimisation, technical improvements and local presence optimisation. Ongoing monthly SEO support starts from ₹10,000/month.']],
        ['@type' => 'Question', 'name' => 'Does ClickVera develop business websites?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. ClickVera designs and develops responsive business websites, from 1–5 page starter websites to custom 10-page websites and advanced builds, with SEO-friendly structure and lead-generation forms.']],
        ['@type' => 'Question', 'name' => 'Does ClickVera provide e-commerce development?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. ClickVera builds custom e-commerce websites as part of Scale solutions and custom services, with design, development and ongoing support shaped around your products and workflow.']],
        ['@type' => 'Question', 'name' => 'Does ClickVera work with startups and small businesses?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. ClickVera works with startups, SMEs, local businesses, professional service companies and growing brands, with Launch, Growth and Scale plans for different stages.']],
        ['@type' => 'Question', 'name' => "How does ClickVera's digital marketing service work?", 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'ClickVera plans targeted digital marketing and lead-generation campaigns with conversion-focused pages, analytics and reporting. Monthly management starts from ₹20,000/month, with advertising budgets billed separately.']],
        ['@type' => 'Question', 'name' => 'How can I get started with ClickVera?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Share your requirements through the contact form or book a free consultation. The ClickVera team responds within 24 hours with a clear plan, scope, timeline and proposal.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
@section('content')
{{-- FOLLOW-UP (photos): hero/about/service images below are generic stock photos.
     Replace with real team photos, project screenshots or permitted client
     dashboard shots (About + hero first), updating ALT text to match. --}}
@php
    $images = [
        'hero' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=75',
        'team' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=70',
        'marketing' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=70',
        'code' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1000&q=70',
        'writing' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1000&q=70',
    ];

    $partners = ['Google', 'Meta', 'Shopify', 'WordPress', 'Laravel'];
    $clients = ['Studio Brand', 'Retail Company', 'Local Service Co.', 'Education Partner', 'Health Practice'];
    $serviceCategories = [
        [
            'title' => 'Build',
            'summary' => 'We build the digital products and experiences your business needs.',
            'items' => [
                'Website Design & Development',
                'UI/UX Design',
                'Figma Design & Prototyping',
                'Web Application Development',
                'Mobile App Development',
                'Custom Software Development',
                'E-commerce Development',
            ],
        ],
        [
            'title' => 'Grow',
            'summary' => 'We help your business increase visibility, reach customers and generate leads.',
            'items' => [
                'SEO',
                'Local SEO',
                'Social Media Management',
                'Social Media Marketing',
                'Digital Marketing',
                'Lead Generation',
                'Content Writing',
                'Content Marketing',
            ],
        ],
        [
            'title' => 'Support & Create',
            'summary' => 'We help you maintain, secure and continuously improve your digital presence.',
            'items' => [
                'Technical Support & IT Services',
                'Website Maintenance',
                'Website Security',
                'Graphic Design',
                'Branding',
                'Video & Creative Content Services',
            ],
        ],
    ];

    $packages = [
        [
            'name' => 'Launch',
            'badge' => 'STARTER',
            'heading' => 'Build Your Digital Foundation',
            'summary' => 'A professional starting point for new businesses, local businesses and professionals looking to establish a strong online presence.',
            'features' => [
                '1-5 page responsive business website',
                'Mobile-friendly design',
                'Basic UI/UX layout',
                'Contact form and WhatsApp integration',
                'Basic on-page SEO setup',
                'Analytics or tracking setup',
            ],
            'ideal' => 'New businesses, local businesses and professionals launching online.',
            'investment' => '₹19,999',
            'label' => 'One-time project',
            'cta' => 'Get Started',
            'featured' => false,
        ],
        [
            'name' => 'Growth',
            'badge' => 'MOST POPULAR',
            'heading' => 'Build Your Brand. Generate More Leads.',
            'summary' => 'A complete digital foundation for growing businesses that need a stronger online presence and a website designed to support marketing and lead generation.',
            'features' => [
                'Up to 10-page custom website',
                'Custom UI/UX design',
                'Figma design and prototyping',
                'SEO-friendly website structure',
                'Lead-generation forms and WhatsApp integration',
                'Analytics and conversion tracking',
            ],
            'ideal' => 'Growing businesses, startups and professional service companies.',
            'investment' => '₹34,999',
            'label' => 'One-time project',
            'cta' => 'Start Growing',
            'featured' => true,
        ],
        [
            'name' => 'Scale',
            'badge' => 'SCALE',
            'heading' => 'Build, Grow & Scale Your Digital Business',
            'summary' => 'A customised digital solution for established businesses that need advanced technology, marketing and ongoing digital growth support.',
            'features' => [
                'Custom website or e-commerce build',
                'Advanced UI/UX design',
                'Advanced SEO strategy',
                'Social media management',
                'Content strategy and creation',
                'Ongoing technical support',
                'Monthly reporting and optimization',
            ],
            'ideal' => 'Established businesses and ambitious brands ready for long-term digital growth.',
            'investment' => '₹49,999',
            'label' => 'Custom project + optional monthly growth retainer',
            'cta' => 'Talk to an Expert',
            'featured' => false,
        ],
    ];

    $customServices = ['Web Application Development', 'Mobile App Development', 'Custom Software Development', 'E-commerce Development', 'Advanced Website Development', 'Custom UI/UX Design', 'Business System Integrations', 'CRM Integrations', 'API Integrations', 'Technical Consulting'];
    $supportPlans = [
        ['title' => 'SEO & Local SEO', 'price' => 'Starting from ₹10,000/month', 'description' => 'Improve your search visibility, local presence and organic traffic through ongoing SEO optimisation for startups, SMEs and local businesses.', 'cta' => 'Explore SEO Services'],
        ['title' => 'Social Media Management', 'price' => 'Starting from ₹10,000/month', 'description' => 'Build a consistent social media presence with content planning, creative support, publishing and reporting.', 'cta' => 'Explore Social Media Services'],
        ['title' => 'Digital Marketing & Lead Generation', 'price' => 'Starting from ₹20,000/month', 'description' => 'Generate qualified leads through targeted digital marketing campaigns and conversion-focused strategies for growing businesses.', 'note' => 'Advertising budget billed separately.', 'cta' => 'Explore Lead Generation Services'],
        ['title' => 'Technical Support & Website Maintenance', 'price' => 'Starting from ₹5,000/month', 'description' => 'Keep your website secure, updated, backed up and performing reliably with ongoing technical support and website maintenance.', 'cta' => 'Explore Maintenance Services'],
    ];
@endphp

<style>
    .home-hero-shell { position: relative; z-index: 1; width: 100%; max-width: 44rem; }
    .home-hero-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-top: 28px; }
    .hero-glow { position: absolute; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(15,118,110,.09) 0%, transparent 70%); pointer-events: none; top: 50%; left: 50%; transform: translate(-50%, -50%); }
    .stat-number { display: block; font-size: 1.9rem; font-weight: 900; color: #fff; letter-spacing: -.02em; line-height: 1; }
    .stat-label { display: block; margin-top: 4px; font-size: .7rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: rgba(203,213,225,.5); }
    .hero-social-proof { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 14px; margin-top: 22px; }
    .avatar-stack { display: flex; align-items: center; }
    .avatar-stack span { width: 32px; height: 32px; border-radius: 99px; border: 2px solid #0F172A; margin-left: -8px; display: grid; place-items: center; font-size: 11px; font-weight: 800; color: #fff; background: linear-gradient(135deg, #0F766E, #0E7490); }
    .avatar-stack span:first-child { margin-left: 0; }
    .avatar-stack img { width: 32px; height: 32px; border-radius: 99px; border: 2px solid #0F172A; margin-left: -8px; object-fit: cover; }
    .avatar-stack img:first-child { margin-left: 0; }
    .hero-float-card { display: none; position: absolute; z-index: 2; border-radius: 14px; border: 1px solid rgba(255,255,255,.08); background: rgba(255,255,255,.06); backdrop-filter: blur(14px); padding: 12px 14px; box-shadow: 0 12px 32px rgba(0,0,0,.2); }
    @media (min-width: 1100px) { .hero-float-card { display: flex; } }
    .hero-float-card b { font-size: 13px; font-weight: 800; color: #fff; }
    .hero-float-card p { font-size: 11px; font-weight: 600; color: rgba(203,213,225,.6); margin-top: 2px; }
    .service-icon-wrap { display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 14px; background: linear-gradient(135deg, var(--cv-green) 0%, var(--cv-cyan) 100%); box-shadow: 0 8px 24px rgba(5,150,105,.25); margin-bottom: 20px; }
    .service-icon-wrap svg { width: 26px; height: 26px; color: #fff; }
    .service-category-card { background: #fff; border: 1px solid var(--cv-line); border-radius: var(--cv-radius-2xl); overflow: hidden; box-shadow: var(--cv-shadow); transition: all .4s cubic-bezier(.4,0,.2,1); display: flex; flex-direction: column; position: relative; }
    .service-category-card::before { content:""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--cv-green), var(--cv-cyan)); opacity: 0; transition: opacity .4s; }
    .service-category-card:hover { transform: translateY(-10px); box-shadow: var(--cv-shadow-2xl); border-color: rgba(5,150,105,.12); }
    .service-category-card:hover::before { opacity: 1; }
    .service-category-card .card-header-img { width: 100%; height: 200px; object-fit: cover; }
    .service-category-card .card-body { padding: 28px; flex: 1; display: flex; flex-direction: column; }
    .service-category-card h3 { font-size: 1.375rem; font-weight: 800; color: var(--cv-ink); letter-spacing: -.02em; }
    .service-category-card .card-summary { margin-top: 10px; color: #64748B; line-height: 1.7; font-size: .9375rem; }
    .service-category-card .card-items { margin-top: 20px; display: grid; gap: 10px; flex: 1; }
    .service-category-card .card-item { display: flex; align-items: flex-start; gap: 10px; font-size: .875rem; font-weight: 600; color: #334155; line-height: 1.5; }
    .service-category-card .card-item::before { content:""; flex-shrink: 0; margin-top: 6px; width: 6px; height: 6px; border-radius: 99px; background: var(--cv-green); box-shadow: 0 0 6px rgba(5,150,105,.3); }
    .trusted-badge { display: inline-flex; align-items: center; gap: 8px; border-radius: 99px; border: 1px solid var(--cv-line-strong); background: #fff; padding: 8px 18px; font-size: .8125rem; font-weight: 700; color: #475569; box-shadow: var(--cv-shadow-sm); transition: all .3s; }
    .trusted-badge:hover { border-color: var(--cv-green); color: var(--cv-green); box-shadow: var(--cv-shadow); transform: translateY(-1px); }
    .trusted-badge::before { content: "✓"; display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 99px; background: #DCFCE7; color: var(--cv-green); font-size: .6875rem; font-weight: 800; }
    .testimonial-quote-card { background: #fff; border: 1px solid var(--cv-line); border-radius: var(--cv-radius-2xl); padding: 32px; box-shadow: var(--cv-shadow); transition: all .4s cubic-bezier(.4,0,.2,1); position: relative; overflow: hidden; display: flex; flex-direction: column; }
    .testimonial-quote-card::before { content:""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--cv-green), var(--cv-cyan)); border-radius: 3px 3px 0 0; }
    .testimonial-quote-card:hover { transform: translateY(-6px); box-shadow: var(--cv-shadow-xl); }
    .testimonial-quote-card .quote-icon { font-size: 2rem; color: var(--cv-green); opacity: .25; line-height: 1; font-family: Georgia, serif; }
    .testimonial-quote-card .quote-text { margin-top: 12px; font-size: 1rem; line-height: 1.8; color: #475569; flex: 1; }
    .testimonial-quote-card .quote-author { margin-top: 24px; display: flex; align-items: center; gap: 12px; padding-top: 20px; border-top: 1px solid var(--cv-line); }
    .testimonial-quote-card .author-avatar { width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, var(--cv-green), var(--cv-cyan)); display: grid; place-items: center; color: #fff; font-weight: 800; font-size: .875rem; flex-shrink: 0; box-shadow: 0 4px 12px rgba(5,150,105,.2); }
    .testimonial-quote-card .author-name { font-weight: 800; color: var(--cv-ink); font-size: .9375rem; }
    .testimonial-quote-card .author-role { font-size: .8125rem; color: #94A3B8; margin-top: 2px; }
    .monthly-plan-card { background: #fff; border: 1px solid var(--cv-line); border-radius: var(--cv-radius-xl); padding: 28px; box-shadow: var(--cv-shadow); transition: all .4s cubic-bezier(.4,0,.2,1); display: flex; flex-direction: column; position: relative; overflow: hidden; }
    .monthly-plan-card::before { content:""; position: absolute; top: 0; left: 0; width: 4px; height: 0; background: linear-gradient(180deg, var(--cv-green), var(--cv-cyan)); border-radius: 0 2px 2px 0; transition: height .4s cubic-bezier(.4,0,.2,1); }
    .monthly-plan-card:hover { transform: translateY(-6px); box-shadow: var(--cv-shadow-xl); border-color: rgba(5,150,105,.15); }
    .monthly-plan-card:hover::before { height: 100%; }
    .monthly-plan-card h3 { font-size: 1.125rem; font-weight: 800; color: var(--cv-ink); letter-spacing: -.01em; }
    .monthly-plan-card .plan-price { margin-top: 12px; font-size: 1.25rem; font-weight: 900; color: var(--cv-green); letter-spacing: -.02em; }
    .monthly-plan-card .plan-desc { margin-top: 12px; line-height: 1.7; color: #64748B; font-size: .9375rem; flex: 1; }
    .monthly-plan-card .plan-note { margin-top: 10px; font-size: .8125rem; font-weight: 600; color: #94A3B8; }
    .section-wave { position: relative; margin-top: -1px; }
    .section-wave svg { display: block; width: 100%; height: auto; }
</style>

<main class="overflow-hidden">

    {{-- ═══════════════════════════════════════════════
         HERO
         ═══════════════════════════════════════════════ --}}
    <section class="hero-section" style="--hero-image: url('{{ $images['hero'] }}')">
        <div class="hero-bg"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-grid"></div>
        <div class="hero-glow"></div>

        <div class="container-wide relative grid gap-10 lg:grid-cols-[1.05fr_0.9fr] lg:items-center pb-10 lg:pb-14" style="padding-top: 150px;">
            {{-- Left — copy --}}
            <div class="reveal text-center lg:text-left">
                <div class="hero-badge mx-auto lg:mx-0"><span></span>Digital & Technology Partner • Since 2020</div>

                <h1 class="hero-title mx-auto lg:mx-0" style="max-width: 32rem; text-align: inherit;">Digital Marketing &amp; Web Development Agency for Growing Businesses</h1>

                <p class="hero-copy mx-auto lg:mx-0" style="text-align: inherit; max-width: 30rem;">ClickVera helps startups, SMEs, local businesses and growing companies build, improve and grow their digital presence through digital marketing, SEO, website development, e-commerce, UI/UX and technology solutions.</p>

                <div class="home-hero-actions" style="justify-content: center;">
                    <style>@media(min-width:1024px){ .home-hero-actions{justify-content:flex-start !important;}}</style>
                    <a class="btn-primary" href="{{ route('contact') }}" style="padding:13px 22px; border-radius:10px; box-shadow: 0 10px 24px rgba(16,185,129,.35);">
                        Book a Free Consultation
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a class="btn-secondary" href="{{ route('services') }}" style="padding:12px 18px; border-radius:10px; background: rgba(255,255,255,.08); color:#fff; border-color: rgba(255,255,255,.14);">
                        View Digital Marketing &amp; Web Development Services
                    </a>
                </div>

                <div class="hero-social-proof" style="justify-content: center;">
                    <style>@media(min-width:1024px){ .hero-social-proof{justify-content:flex-start !important;}}</style>
                    <div class="avatar-stack">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&fit=crop&crop=face&auto=format" alt="Happy ClickVera client headshot 1" width="32" height="32" loading="lazy" decoding="async">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face&auto=format" alt="Happy ClickVera client headshot 2" width="32" height="32" loading="lazy" decoding="async">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&crop=face&auto=format" alt="Happy ClickVera client headshot 3" width="32" height="32" loading="lazy" decoding="async">
                        <span>+50</span>
                    </div>
                    <div class="text-left">
                        <div class="flex items-center gap-1 text-amber-400 text-sm leading-none">★★★★★ <span class="text-white font-bold ml-1">4.9/5</span></div>
                        <div class="text-xs font-semibold text-slate-400">Trusted by 50+ businesses</div>
                    </div>
                    <span class="hidden sm:inline h-8 w-px bg-white/10"></span>
                    <span class="hidden sm:inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1.5 text-xs font-bold text-slate-300 border border-white/10">✓ No spam — just plan</span>
                </div>

                <div class="hero-stats-bar" style="margin-top:22px; max-width: 30rem; margin-left:0; margin-right:auto;">
                    <article style="padding:12px 10px;">
                        <span class="stat-number" style="font-size:1.35rem;">150+</span>
                        <span class="stat-label">Projects</span>
                    </article>
                    <article style="padding:12px 10px;">
                        <span class="stat-number" style="font-size:1.35rem;">98%</span>
                        <span class="stat-label">On-time</span>
                    </article>
                    <article style="padding:12px 10px;">
                        <span class="stat-number" style="font-size:1.35rem;">6+</span>
                        <span class="stat-label">Years</span>
                    </article>
                </div>
            </div>

            {{-- Right — premium visual with better background --}}
            <div class="reveal relative hidden lg:block" style="--delay:120ms">
                <div style="position:relative; border-radius:24px; overflow:hidden; border:1px solid rgba(255,255,255,.09); box-shadow: 0 28px 70px rgba(0,0,0,.38), 0 0 0 1px rgba(255,255,255,.04) inset; background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02)); padding: 8px;">
                    <div style="border-radius:18px; overflow:hidden; position:relative; background:#0F172A; border:1px solid rgba(255,255,255,.06);">
                        <img src="{{ $images['hero'] }}" alt="ClickVera digital marketing and web development team collaborating on client growth" width="1200" height="404" fetchpriority="high" decoding="async" style="width:100%; height:404px; object-fit:cover; opacity:1; filter: saturate(1.08) contrast(1.06); display:block;">
                    </div>
                </div>
                <!-- floating accent -->
                <div style="position:absolute; right:-14px; top:-14px; background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:10px 12px; box-shadow:0 12px 32px rgba(15,23,42,.12); display:flex; align-items:center; gap:10px;">
                    <span style="width:32px; height:32px; border-radius:10px; background:#0F766E; color:#fff; display:grid; place-items:center;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
                    <div><div style="font-size:12px; font-weight:800; color:#0F172A; line-height:1;">Trusted Partner</div><div style="font-size:11px; color:#64748b;">Since 2020</div></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Wave divider into light section --}}
    <div class="section-wave" style="background: var(--cv-ink);">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height: 36px;"><path d="M0 40C240 80 480 0 720 40C960 80 1200 0 1440 40V80H0V40Z" fill="#fff"/></svg>
    </div>


    {{-- ═══════════════════════════════════════════════
         ABOUT US — after banner
         ═══════════════════════════════════════════════ --}}
    <section id="about" class="section-light" style="background: #fff; overflow: visible; padding-bottom: 3rem;">
        <div class="container-wide grid gap-10 lg:gap-14 lg:grid-cols-2 lg:items-stretch" style="align-items: stretch; padding-top: 12px;">
            {{-- Left — image (height = content) --}}
            <div class="reveal flex flex-col h-full">
                <div style="position: relative; flex: 1; display:flex; flex-direction:column; border-radius: 20px; overflow: hidden; background: #f1f5f9; border: 1px solid #e2e8f0; box-shadow: 0 20px 50px rgba(15,23,42,.10); min-height: 420px;">
                    <img src="{{ $images['team'] }}" alt="ClickVera digital marketing and technology team working with startups and SMEs in India" width="800" height="520" loading="lazy" decoding="async" style="width:100%; flex:1; min-height: 380px; object-fit: cover; object-position: center; display:block;">
                    <div style="position: absolute; left: 14px; right: 14px; bottom: 14px; background: rgba(255,255,255,.97); backdrop-filter: blur(10px); border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 14px; display:flex; align-items:center; gap:12px; box-shadow: 0 10px 24px rgba(15,23,42,.14);">
                        <span style="width:38px; height:38px; border-radius:9px; background:#0F766E; color:#fff; display:grid; place-items:center; flex-shrink:0;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></span>
                        <div style="flex:1; min-width:0;"><div style="font-size:13px; font-weight:800; color:#0F172A; line-height:1;">50+ Happy Clients</div><div style="font-size:12px; color:#64748b; white-space:nowrap;">Trusted by startups & SMEs across India</div></div>
                        <span style="background:#0F172A; color:#fff; border-radius:999px; padding:6px 10px; font-size:12px; font-weight:800;">4.9 ★</span>
                    </div>
                </div>
            </div>

            {{-- Right — content --}}
            <div class="reveal lg:pl-8" style="padding-top: 2px; padding-bottom: 12px;">
                <div style="display:inline-flex; align-items:center; gap:10px; background:#fff; border:1px solid #e2e8f0; border-radius:999px; padding:6px 14px 6px 6px; box-shadow: 0 4px 12px rgba(15,23,42,.06);">
                    <span style="display:grid; place-items:center; width:28px; height:28px; border-radius:999px; background:#0F766E; color:#fff;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
                    <span style="font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; color:#0F172A;">About Clickvera</span>
                    <span style="width:6px; height:6px; border-radius:99px; background:#22c55e;"></span>
                    <span style="font-size:12px; font-weight:700; color:#64748b;">Since 2020</span>
                </div>
                <h2 class="section-title" style="margin-top: 14px; font-size: clamp(1.85rem, 3vw, 2.4rem); line-height:1.12; letter-spacing:-.03em; font-weight: 900;">Build, Improve &amp; Grow Your Online Presence With One Team</h2>
                <p class="mt-4 text-[15px] leading-7 text-slate-600">ClickVera works with startups, SMEs and local businesses to fix slow websites, weak search visibility and inconsistent enquiries. Strategy, design, development, search optimisation and ongoing support come together under one roof — so every part of your online presence pulls in the same direction: winning customers.</p>

                <div class="mt-7 grid grid-cols-3 gap-3">
                    <div style="text-align:center; background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:16px 8px; box-shadow: 0 4px 12px rgba(15,23,42,.04);"><div style="font-size:20px; font-weight:900; color:#0F172A; line-height:1;">150+</div><div style="font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#64748b; margin-top:6px;">Projects</div></div>
                    <div style="text-align:center; background:#0F172A; border-radius:14px; padding:16px 8px; box-shadow: 0 8px 20px rgba(15,23,42,.18);"><div style="font-size:20px; font-weight:900; color:#fff; line-height:1;">50+</div><div style="font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#94a3b8; margin-top:6px;">Clients</div></div>
                    <div style="text-align:center; background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:16px 8px; box-shadow: 0 4px 12px rgba(15,23,42,.04);"><div style="font-size:20px; font-weight:900; color:#0F766E; line-height:1;">4.9★</div><div style="font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#64748b; margin-top:6px;">Rated</div></div>
                </div>

                <div class="mt-8 grid gap-6">
                    <div class="flex gap-4 items-start">
                        <span style="flex-shrink:0; width:38px; height:38px; border-radius:10px; background:#ecfdf5; color:#0F766E; display:grid; place-items:center; margin-top:1px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <div style="padding-top:1px; padding-left:2px;"><div style="font-size:14px; font-weight:800; color:#0F172A; line-height:1.35;">Strategy-Led, not template-led</div><div style="font-size:13px; color:#64748b; margin-top:3px; line-height:1.6;">Every page, flow and word tied to a business outcome — not just a pretty layout.</div></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <span style="flex-shrink:0; width:38px; height:38px; border-radius:10px; background:#f1f5f9; color:#0F172A; display:grid; place-items:center; margin-top:1px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></span>
                        <div style="padding-top:1px; padding-left:2px;"><div style="font-size:14px; font-weight:800; color:#0F172A; line-height:1.35;">Senior team, zero hand-offs</div><div style="font-size:13px; color:#64748b; margin-top:3px; line-height:1.6;">One owner from discovery to launch to growth. You always know who to call.</div></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <span style="flex-shrink:0; width:38px; height:38px; border-radius:10px; background:#fff7ed; color:#c2410c; display:grid; place-items:center; margin-top:1px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="5"/><path d="M12 13v5"/><path d="M9 18h6"/></svg></span>
                        <div style="padding-top:1px; padding-left:2px;"><div style="font-size:14px; font-weight:800; color:#0F172A; line-height:1.35;">Built to convert</div><div style="font-size:13px; color:#64748b; margin-top:3px; line-height:1.6;">We optimize for enquiries and revenue, not just looks.</div></div>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-3" style="padding-bottom: 4px;">
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#0F172A] px-6 py-3 text-[14px] font-bold text-white shadow-md hover:bg-black transition" style="min-height:44px;">About ClickVera Digital Marketing Agency <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-3 text-[14px] font-bold text-slate-700 hover:border-slate-300" style="min-height:44px;">Talk to a Digital Marketing Expert</a>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         WHAT WE DO — premium
         ═══════════════════════════════════════════════ --}}
    <section class="section-light alt" style="background: #f8fafc; position: relative; overflow: hidden;">
        <div style="position:absolute; inset:0; background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 22px 22px; opacity: 0.4; mask-image: radial-gradient(ellipse 70% 50% at 50% 0%, black 30%, transparent 75%); pointer-events: none;"></div>
        <div class="container-wide" style="position: relative;">
            <div class="reveal" style="text-align: center; max-width: 42rem; margin: 0 auto;">
                <p class="eyebrow-dark" style="justify-content: center; gap: 10px;"><span style="width:28px; height:2px; background:#0F766E; border-radius:99px; display:inline-block;"></span> WHAT WE DO <span style="width:28px; height:2px; background:#0F766E; border-radius:99px; display:inline-block;"></span></p>
                <h2 class="section-title" style="text-align: center; margin-left:auto; margin-right:auto; font-size: clamp(1.85rem, 3.2vw, 2.5rem); line-height:1.12;">Our Digital Marketing &amp; Web Development Services</h2>
                <p style="text-align: center; margin: 16px auto 0; max-width: 38rem; font-size: 15px; line-height: 1.7; color: #64748b;">ClickVera organises website development, SEO, digital marketing, e-commerce, UI/UX and support around the journey most businesses follow: create the foundation, increase visibility, then keep improving. <a href="{{ route('services') }}" style="font-weight:700; color:#0F766E;">View all digital marketing services</a>.</p>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3 items-stretch">
                @php
                    $serviceOverview = [
                        ['title' => 'Website Design & Development', 'image' => $images['code'], 'alt' => 'Website design and development services by ClickVera digital marketing agency in India', 'desc' => 'Responsive business websites and custom builds with SEO-friendly structure, lead-generation forms and analytics — ideal for startups, SMEs and local businesses launching or rebuilding online.', 'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>', 'accent' => '#0F766E', 'link' => 'Explore Website Development Services'],
                        ['title' => 'SEO & Digital Marketing', 'image' => $images['marketing'], 'alt' => 'ClickVera SEO and digital marketing services for lead generation in India', 'desc' => 'SEO, local SEO, social media management, targeted campaigns and content that improve search visibility and help generate better enquiries from the right customers.', 'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>', 'accent' => '#0F172A', 'link' => 'Explore SEO & Digital Marketing Services'],
                        ['title' => 'E-commerce, UI/UX & Support', 'image' => $images['writing'], 'alt' => 'E-commerce development, UI/UX design and website maintenance services by ClickVera', 'desc' => 'E-commerce builds, web applications, UI/UX design, branding and website maintenance and security that keep your store and site fast, secure and improving month after month.', 'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>', 'accent' => '#b45309', 'link' => 'Explore E-commerce & UI/UX Services'],
                    ];
                @endphp
                @foreach($serviceOverview as $svc)
                    <article class="reveal group flex flex-col overflow-hidden bg-white border border-slate-200 rounded-[20px] shadow-sm hover:shadow-xl hover:border-slate-300 hover:-translate-y-1.5 transition-all duration-300" style="--delay: {{ $loop->index * 100 }}ms">
                        <div style="position: relative; height: 190px; overflow: hidden; background: #f1f5f9;">
                            <img src="{{ $svc['image'] }}" alt="{{ $svc['alt'] }}" width="800" height="450" loading="lazy" decoding="async" style="width:100%; height:100%; object-fit: cover; transition: transform .6s ease;" class="group-hover:scale-[1.04]">
                            <div style="position:absolute; inset:0; background: linear-gradient(180deg, transparent 40%, rgba(15,23,42,.06) 100%);"></div>
                            <div style="position:absolute; top:0; left:0; right:0; height:3px; background: {{ $svc['accent'] }};"></div>
                        </div>
                        <div style="position: relative; flex:1; display:flex; flex-direction:column; padding: 22px 22px 24px;">
                            <div style="width:44px; height:44px; border-radius:12px; background: {{ $svc['accent'] }}; color:#fff; display:grid; place-items:center; box-shadow: 0 8px 20px rgba(15,118,110,.18); margin-top: -42px; border: 3px solid #fff;" aria-hidden="true">{!! $svc['icon'] !!}</div>
                            <h3 style="margin-top:14px; font-size:18px; font-weight:800; color:#0F172A; letter-spacing:-.02em; line-height:1.2;">{{ $svc['title'] }}</h3>
                            <p style="margin-top:10px; font-size:14px; line-height:1.7; color:#64748b; flex:1;">{{ $svc['desc'] }}</p>
                            <div style="margin-top:16px;"><a href="{{ route('services') }}#services" style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:700; color:{{ $svc['accent'] }};">{{ $svc['link'] }} <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a></div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         WHAT WE OFFER — unique
         ═══════════════════════════════════════════════ --}}
    <section id="services" class="section-light" style="background:linear-gradient(135deg,#dff7f2 0%,#e7f0ff 48%,#f6eaff 100%); position:relative; overflow:hidden;">
        <div style="position:absolute; width:460px; height:460px; border-radius:999px; background:rgba(45,212,191,.30); filter:blur(28px); top:-280px; left:-165px; pointer-events:none;"></div>
        <div style="position:absolute; width:390px; height:390px; border-radius:999px; background:rgba(167,139,250,.22); filter:blur(32px); bottom:-250px; right:-105px; pointer-events:none;"></div>
        <div class="container-wide" style="position: relative;">
            <div>
                <div class="reveal" style="max-width:47rem; text-align:center; margin:0 auto;">
                    <p style="display:inline-flex; align-items:center; gap:9px; color:#0f766e; font-size:12px; font-weight:800; letter-spacing:.16em;"><span style="display:block; width:30px; height:2px; background:#0f766e;"></span>WHAT WE OFFER</p>
                    <h2 style="margin-top:18px; color:#0f172a; font-size:clamp(2.35rem,5vw,4.4rem); font-weight:900; letter-spacing:-.065em; line-height:.98;">Digital Solutions Built Around Your Business Goals</h2>
                    <p style="margin-top:20px; color:#b8c8d9; font-size:15px; line-height:1.75;">Start where your business needs us most — website design, SEO, digital marketing, e-commerce, UI/UX, lead generation or technical support — or bring the whole journey together with one team.</p>
                    <a href="{{ route('services') }}#services" style="margin-top:28px; display:inline-flex; align-items:center; gap:9px; padding:0 0 8px; color:#0f172a; border-bottom:2px solid #0f766e; font-size:13px; font-weight:800;">View all website development and digital marketing services <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                </div>

                <div style="margin-top:54px; border-top:1px solid rgba(15,23,42,.18); background:rgba(255,255,255,.48); backdrop-filter:blur(10px); padding:0 28px; border-radius:22px; box-shadow:0 18px 45px rgba(50,76,110,.08);">
                @foreach($serviceCategories as $offering)
                    @php
                        $num = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                        $accent = $loop->iteration === 1 ? '#0F766E' : ($loop->iteration === 2 ? '#0F172A' : '#92400e');
                        $bg = $loop->iteration === 1 ? 'linear-gradient(135deg,#0F766E 0%,#14B8A6 100%)' : ($loop->iteration === 2 ? 'linear-gradient(135deg,#0F172A 0%,#334155 100%)' : 'linear-gradient(135deg,#92400e 0%,#b45309 100%)');
                        $offeringLinkText = $loop->iteration === 1 ? 'Explore Website Development & UI/UX Services' : ($loop->iteration === 2 ? 'Explore SEO & Digital Marketing Services' : 'Explore Technical Support & Maintenance Services');
                    @endphp
                    <article class="reveal group" style="--delay: {{ $loop->index * 100 }}ms; padding:36px 0; border-bottom:1px solid rgba(15,23,42,.16);">
                        <div class="grid gap-5 items-start md:grid-cols-[120px_1fr_1.25fr] md:gap-10">
                            <div style="display:flex; align-items:flex-start; gap:10px;">
                                <span style="color:{{ $loop->iteration === 1 ? '#0f766e' : ($loop->iteration === 2 ? '#2563eb' : '#b45309') }}; font-size:clamp(3.6rem,6vw,5.5rem); font-weight:900; letter-spacing:-.09em; line-height:.75;">{{ $num }}</span>
                                <span style="width:34px; height:34px; border-radius:50%; background:{{ $bg }}; color:#fff; display:grid; place-items:center; flex-shrink:0;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        @if($loop->iteration === 1)
                                            <rect width="18" height="18" x="3" y="3" rx="3"/><path d="m9 12 2 2 4-4"/>
                                        @elseif($loop->iteration === 2)
                                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>
                                        @else
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                        @endif
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <h3 style="font-size:clamp(1.7rem,2.5vw,2.35rem); font-weight:900; color:#0f172a; letter-spacing:-.05em; line-height:1;">{{ $offering['title'] }}</h3>
                                <p style="margin-top:12px; max-width:27rem; font-size:14px; line-height:1.7; color:#64748b;">{{ $offering['summary'] }}</p>
                                <a href="{{ route('services') }}#services" style="margin-top:13px; display:inline-flex; align-items:center; gap:6px; font-size:12px; font-weight:800; color:{{ $loop->iteration === 1 ? '#5eead4' : ($loop->iteration === 2 ? '#93c5fd' : '#fbbf24') }};">{{ $offeringLinkText }} <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                            </div>
                            <div style="display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); align-content:flex-start; gap:10px 18px; padding-top:5px;">
                                @foreach($offering['items'] as $item)
                                    <span style="display:flex; align-items:flex-start; gap:7px; font-size:12px; font-weight:700; color:#475569; line-height:1.45;">
                                        <span style="width:6px; height:6px; margin-top:5px; border-radius:99px; background: {{ $loop->iteration === 1 ? '#0f766e' : ($loop->iteration === 2 ? '#2563eb' : '#b45309') }}; flex-shrink:0;"></span>
                                        {{ $item }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
                </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         PRICING
         ═══════════════════════════════════════════════ --}}
    <section id="pricing" class="section-light alt">
        <div class="container-wide">
            <div class="section-heading reveal" style="text-align: center; max-width: 56rem; margin-left: auto; margin-right: auto;">
                <p class="eyebrow-dark" style="justify-content: center;">OUR PACKAGES</p>
                <h2 class="section-title" style="text-align: center;">Plans Designed Around Your Business Goals</h2>
                <p class="home-section-copy" style="text-align: center; margin-left: auto; margin-right: auto;">Whether you're launching your first website, growing your online presence, or looking for ongoing digital support, choose a plan that fits your current stage of growth.</p>
                <p class="home-section-copy" style="text-align: center; margin-left: auto; margin-right: auto;">Need something more specific? We also create custom solutions based on your business requirements.</p>
            </div>

            <div class="home-packages-wrap mt-12">
                <div class="grid gap-5 lg:grid-cols-3">
                    @foreach($packages as $package)
                        <article class="home-package-card {{ $package['featured'] ? 'is-featured' : '' }} reveal" style="--delay: {{ $loop->index * 100 }}ms">
                            <div class="home-package-top">
                                <h3>{{ $package['name'] }}</h3>
                                <span class="home-package-badge">{{ $package['badge'] }}</span>
                            </div>
                            <p class="home-package-price">{{ $package['investment'] }}</p>
                            <p class="mt-2 text-xs font-extrabold uppercase tracking-wider text-slate-400" style="letter-spacing: 0.08em;">{{ $package['label'] }}</p>
                            <h4 class="mt-5 text-xl font-extrabold" style="letter-spacing: -.02em;">{{ $package['heading'] }}</h4>
                            <p class="home-package-summary">{{ $package['summary'] }}</p>
                            <ul class="home-package-features">
                                @foreach($package['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            <div class="home-package-meta">
                                <div>
                                    <span>Ideal for</span>
                                    <p>{{ $package['ideal'] }}</p>
                                </div>
                            </div>
                            <div class="home-package-cta">
                                <a href="{{ route('contact') }}" class="{{ $package['featured'] ? 'btn-primary w-full' : 'btn-light w-full' }}" style="{{ !$package['featured'] ? 'background: #fff; border: 2px solid var(--cv-line-strong); font-weight: 700;' : '' }}">{{ $package['cta'] }}</a>
                            </div>
                            @if($package['name'] === 'Scale')
                                <p class="mt-4 text-xs leading-5" style="color: #94A3B8;">Advertising spend, hosting, domain, paid plugins, third-party software and other external platform costs are billed separately.</p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         CUSTOM SOLUTIONS
         ═══════════════════════════════════════════════ --}}
    <section class="section-dark custom-solutions-section">
        <div class="container-wide custom-solutions-layout">
            <div class="section-heading reveal custom-solutions-intro">
                <p class="eyebrow"><span></span>CUSTOM SOLUTIONS</p>
                <h2 class="section-title text-white">Built for the<br><em>way you work.</em></h2>
                <p class="section-subtitle">Your business is not a template. We shape technology, design and integrations around your exact workflow, team and growth goals.</p>
                <div class="custom-solutions-note"><span>+</span> Tell us what needs solving. We'll map the right solution.</div>
                <a href="{{ route('contact') }}" class="btn-primary mt-8">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    Discuss Your Project
                </a>
            </div>
            <div class="custom-solutions-list">
                @foreach($customServices as $customService)
                    <a href="{{ route('contact') }}" class="custom-solution-row reveal" style="--delay: {{ $loop->index * 70 }}ms;" aria-label="Discuss {{ $customService }} with ClickVera">
                        <span class="custom-solution-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="custom-solution-name">{{ $customService }}</span>
                        <span class="custom-solution-arrow">↗</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         MONTHLY SERVICES
         ═══════════════════════════════════════════════ --}}
    <section class="section-light">
        <div class="container-wide">
            <div class="section-heading reveal" style="text-align: center; max-width: 56rem; margin-left: auto; margin-right: auto;">
                <p class="eyebrow-dark" style="justify-content: center;">MONTHLY SERVICES</p>
                <h2 class="section-title" style="text-align: center;">Ongoing Digital Growth & Support</h2>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($supportPlans as $supportPlan)
                    <article class="monthly-plan-card reveal" style="--delay: {{ $loop->index * 80 }}ms">
                        <h3>{{ $supportPlan['title'] }}</h3>
                        <p class="plan-price">{{ $supportPlan['price'] }}</p>
                        <p class="plan-desc">{{ $supportPlan['description'] }}</p>
                        @isset($supportPlan['note'])
                            <p class="plan-note">{{ $supportPlan['note'] }}</p>
                        @endisset
                        <a href="{{ route('contact') }}" class="btn-plan mt-6" aria-label="{{ $supportPlan['cta'] }} — contact ClickVera">{{ $supportPlan['cta'] }}</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         PLAN GUIDANCE CTA
         ═══════════════════════════════════════════════ --}}
    <section class="section-gradient plan-guidance-section">
        <div class="container-wide text-center">
            <div class="mx-auto max-w-3xl reveal" style="position: relative; z-index: 1;">
                <p class="eyebrow" style="justify-content: center;">PLAN GUIDANCE</p>
                <h2 class="section-title mx-auto text-white" style="text-align: center;">Not Sure Which Plan Is Right for You?</h2>
                <p class="section-subtitle mx-auto" style="color: rgba(203,213,225,.65); text-align: center;">Tell us about your business, goals and requirements. Our team will recommend the right solution based on your needs.</p>
                <a href="{{ route('contact') }}" class="btn-primary btn-xl mt-8">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    Book a Free Consultation
                </a>
                <p class="mt-4 text-sm font-semibold" style="color: #94A3B8;">No obligation. Just a conversation about your project.</p>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         FEATURED WORK (hidden until real projects are published)
         ═══════════════════════════════════════════════ --}}
    @if($projects->isNotEmpty())
    <section class="section-dark featured-work-section">
        <div class="container-wide grid gap-10 lg:grid-cols-[.85fr_1.15fr] lg:items-center">
            <div class="reveal">
                <p class="eyebrow">FEATURED WORK</p>
                <h2 class="section-title text-white">Our Work</h2>
                <p class="section-subtitle">A look at the websites, campaigns, and content systems we've built for businesses across different industries.</p>
                <a href="{{ route('work') }}" class="btn-primary mt-8">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 12 2 2 4-4"/></svg>
                    View Portfolio
                </a>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                @foreach($projects->take(4) as $project)
                    <article class="combo-card reveal">
                        <div class="mini-icon">{{ strtoupper(Str::substr($project->category, 0, 2)) }}</div>
                        <h3>{{ $project->title }}</h3>
                        <p>{{ Str::limit($project->description, 105) }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    {{-- ═══════════════════════════════════════════════
         BLOG
         ═══════════════════════════════════════════════ --}}
    <section class="section-light insights-section">
        <div class="container-wide">
            <div class="carousel-head reveal">
                <div>
                    <p class="eyebrow-dark">LATEST INSIGHTS</p>
                    <h2 class="section-title">Digital Growth Insights</h2>
                    <p class="home-section-copy">Practical SEO, website and digital marketing guides written to help startups, SMEs and local businesses make smarter decisions online. <a href="{{ route('blog.index') }}" style="font-weight:700; color:#0F766E;">Read all digital growth insights</a>.</p>
                </div>
                <a href="{{ route('blog.index') }}" class="btn-light">
                    Read Digital Growth Insights
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
            @if($blogs->isNotEmpty())
            <div class="insights-grid">
                @foreach($blogs as $blog)
                    <a href="{{ route('blog.show', $blog->slug) }}" class="project-card insight-card {{ $loop->first ? 'is-featured' : '' }} {{ $blogs->count() === 1 ? 'is-only' : '' }} reveal" style="--delay: {{ $loop->index * 80 }}ms" aria-label="Read article: {{ $blog->title }}">
                        <div class="project-media">
                            <img src="{{ $blog->featured_image ? asset('storage/'.$blog->featured_image) : $images['marketing'] }}" alt="{{ $blog->title }} — ClickVera digital growth insight" width="800" height="450" loading="lazy" decoding="async">
                        </div>
                        <div style="padding: 24px;">
                            <span class="insight-meta">{{ optional($blog->published_at)->format('M d, Y') ?? 'Insight' }} <b>•</b> Insights</span>
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ $blog->description }}</p>
                            <span class="insight-read-more">Read article <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         PARTNERS
         ═══════════════════════════════════════════════ --}}
    <section class="section-dark partners-section">
        <div class="container-wide">
            <div class="section-heading partners-heading reveal">
                <p class="eyebrow partners-eyebrow"><span></span>OUR TECHNOLOGY PARTNERS<span></span></p>
                <h2 class="section-title text-white">Why Businesses Choose ClickVera</h2>
                <p class="section-subtitle" style="text-align: center; margin-left: auto; margin-right: auto;">We use industry-leading platforms Google, Meta, Shopify, WordPress, and Laravel to build and grow your digital presence with the right tools for your business. <a href="{{ route('about') }}" style="color:#5eead4; font-weight:700;">Learn why businesses choose ClickVera</a>.</p>
            </div>
            @php
                $partnerVisuals = [
                    'Google' => ['logo' => 'google.svg', 'type' => 'google', 'label' => 'Search & Analytics'],
                    'Meta' => ['logo' => 'meta.svg', 'type' => 'meta', 'label' => 'Social & Advertising'],
                    'Shopify' => ['logo' => 'shopify.svg', 'type' => 'shopify', 'label' => 'E-commerce'],
                    'WordPress' => ['logo' => 'wordpress.svg', 'type' => 'wordpress', 'label' => 'Content & Websites'],
                    'Laravel' => ['logo' => 'laravel.svg', 'type' => 'laravel', 'label' => 'Web Applications'],
                ];
            @endphp
            <div class="partner-showcase-grid">
                @foreach($partners as $partner)
                    @php $visual = $partnerVisuals[$partner] ?? ['logo' => null, 'mark' => strtoupper(substr($partner, 0, 1)), 'type' => 'default', 'label' => 'Digital Platform']; @endphp
                    <div class="partner-showcase-tile reveal" style="--delay: {{ $loop->index * 80 }}ms;">
                        <span class="partner-mark {{ $visual['type'] }}">
                            @if($visual['logo'])
                                <img src="{{ asset('assets/platforms/'.$visual['logo']) }}" alt="{{ $partner }} platform used by ClickVera digital marketing agency" width="48" height="48" loading="lazy" decoding="async">
                            @else
                                {{ $visual['mark'] }}
                            @endif
                        </span>
                        <span class="partner-name">{{ $partner }}</span>
                        <span class="partner-label">{{ $visual['label'] }}</span>
                    </div>
                @endforeach
            </div>
            <p class="partners-footnote reveal"><span></span>Certified tools. Proven workflows. One experienced team.<span></span></p>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         CLIENTS — each logo renders only with an approved one-line outcome.
         Fill 'outcome' with a real, account-owner-approved result to show it.
         The section auto-hides until at least one outcome exists.
         ═══════════════════════════════════════════════ --}}
    @php
        $clientLogos = [
            ['file' => 'B1HH.webp', 'name' => 'B1HH', 'outcome' => ''],
            ['file' => 'Elevare.webp', 'name' => 'Elevare', 'outcome' => ''],
            ['file' => 'rs.svg', 'name' => 'RS', 'outcome' => ''],
            ['file' => 'tripbaggo-logo.webp', 'name' => 'Tripbaggo', 'outcome' => ''],
        ];
        $provenClients = array_values(array_filter($clientLogos, fn ($c) => trim($c['outcome'] ?? '') !== ''));
    @endphp
    @if(count($provenClients))
    <section class="section-light alt clients-section">
        <div class="container-wide" style="text-align: center;">
            <div class="section-heading reveal" style="max-width: 42rem; margin-left: auto; margin-right: auto;">
                <p class="eyebrow-dark" style="justify-content: center;">OUR CLIENTS</p>
                <h2 class="section-title" style="text-align: center;">Brands that trust our work.</h2>
            </div>
            <div class="client-logo-slider reveal" aria-label="Our clients">
                <div class="client-logo-track">
                    @foreach([false, true] as $isDuplicate)
                        <div class="client-logo-group" @if($isDuplicate) aria-hidden="true" @endif>
                            @foreach($provenClients as $clientLogo)
                                <figure class="home-logo-tile-light client-logo-tile" style="text-align:center;">
                                    <img src="{{ asset('assets/logo/'.$clientLogo['file']) }}" alt="{{ $isDuplicate ? '' : $clientLogo['name'].' logo — ClickVera client' }}" @if($isDuplicate) aria-hidden="true" @endif width="160" height="64" loading="lazy" decoding="async">
                                    @unless($isDuplicate)
                                        <figcaption style="margin-top:8px; font-size:12px; font-weight:600; color:#64748b; line-height:1.5;">{{ $clientLogo['outcome'] }}</figcaption>
                                    @endunless
                                </figure>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


    {{-- ═══════════════════════════════════════════════
         TESTIMONIALS (hidden until real testimonials are published)
         ═══════════════════════════════════════════════ --}}
    @if($testimonials->isNotEmpty())
    <section class="section-gradient testimonials-section">
        <div class="container-wide">
            @php
                $testimonialItems = $testimonials->map(fn ($item) => [
                    'name' => $item->name,
                    'role' => $item->role,
                    'feedback' => $item->feedback,
                ]);
            @endphp
            <div class="testimonial-heading reveal">
                <div>
                    <p class="eyebrow">CLIENT STORIES</p>
                    <h2 class="section-title text-white">Client Success Stories</h2>
                </div>
                <div class="testimonial-summary">
                    <div class="testimonial-score"><strong>4.9</strong><span><b>★★★★★</b>Average client rating</span></div>
                    <p>Clear communication, thoughtful execution, and digital work that moves businesses forward. Ratings and counts shown here reflect information published on this website.</p>
                </div>
            </div>
            <div class="testimonial-carousel reveal" data-carousel="testimonials">
                <div class="carousel-track">
                    @foreach($testimonialItems as $testimonial)
                    <article class="testimonial-quote-card carousel-card">
                        <div class="testimonial-card-top"><span class="testimonial-stars" aria-label="Rated 5 out of 5 stars">★★★★★</span></div>
                        <div class="quote-icon" aria-hidden="true">&ldquo;</div>
                        <p class="quote-text">{{ $testimonial['feedback'] }}</p>
                        <div class="quote-author">
                            <div>
                                <div class="author-name">{{ $testimonial['name'] }}</div>
                                <div class="author-role">{{ $testimonial['role'] }}</div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="testimonial-carousel-footer">
                <div class="carousel-dots testimonial-dots" data-carousel-dots="testimonials"></div>
                <div class="carousel-actions testimonial-actions" data-carousel-controls="testimonials">
                    <button type="button" data-dir="-1" aria-label="Previous testimonial">←</button>
                    <button type="button" data-dir="1" aria-label="Next testimonial">→</button>
                </div>
            </div>
            @endif
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         FAQ
         ═══════════════════════════════════════════════ --}}
    <section class="section-light" aria-labelledby="faq-heading">
        <div class="container-wide" style="max-width: 56rem;">
            <div class="section-heading reveal" style="text-align: center; max-width: 56rem; margin-left: auto; margin-right: auto;">
                <p class="eyebrow-dark" style="justify-content: center;">FAQ</p>
                <h2 id="faq-heading" class="section-title" style="text-align: center;">Frequently Asked Questions</h2>
                <p class="home-section-copy" style="text-align: center; margin-left: auto; margin-right: auto;">Clear answers about ClickVera services for websites, SEO, e-commerce and digital growth. Need more detail? <a href="{{ route('contact') }}" style="font-weight:700; color:#0F766E;">Contact ClickVera</a>.</p>
            </div>
            <div class="mt-10 grid gap-4">
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">What services does ClickVera provide?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">ClickVera provides website design and development, UI/UX design, web application development, e-commerce development, SEO and local SEO, digital marketing, social media management, lead generation, content, branding and website maintenance and technical support.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">Does ClickVera provide SEO services?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">Yes. ClickVera provides SEO and local SEO services, including on-page optimisation, technical improvements and local presence optimisation. Ongoing monthly SEO support starts from ₹10,000/month. <a href="{{ route('services') }}#services" style="font-weight:700; color:#0F766E;">Explore SEO services</a>.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">Does ClickVera develop business websites?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">Yes. ClickVera designs and develops responsive business websites — from 1–5 page starter websites to custom 10-page websites and advanced builds — with SEO-friendly structure and lead-generation forms. <a href="{{ route('services') }}#services" style="font-weight:700; color:#0F766E;">Explore website development services</a>.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">Does ClickVera provide e-commerce development?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">Yes. ClickVera builds custom e-commerce websites as part of Scale solutions and custom services, with design, development and ongoing support shaped around your products and workflow.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">Does ClickVera work with startups and small businesses?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">Yes. ClickVera works with startups, SMEs, local businesses, professional service companies and growing brands, with Launch, Growth and Scale plans for different stages. <a href="{{ route('about') }}" style="font-weight:700; color:#0F766E;">About ClickVera</a>.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">How does ClickVera's digital marketing service work?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">ClickVera plans targeted digital marketing and lead-generation campaigns with conversion-focused pages, analytics and reporting. Monthly management starts from ₹20,000/month, with advertising budgets billed separately.</p>
                </details>
                <details class="reveal" style="background:#fff; border:1px solid var(--cv-line); border-radius:16px; padding:20px 22px; box-shadow:var(--cv-shadow-sm);">
                    <summary style="font-weight:800; color:#0F172A; cursor:pointer; font-size:1rem;">How can I get started with ClickVera?</summary>
                    <p style="margin-top:10px; color:#64748B; line-height:1.7; font-size:.9375rem;">Share your requirements through the contact form or book a free consultation. The ClickVera team responds within 24 hours with a clear plan, scope, timeline and proposal. <a href="{{ route('contact') }}" style="font-weight:700; color:#0F766E;">Book a free consultation</a>.</p>
                </details>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         CONTACT
         ═══════════════════════════════════════════════ --}}
    <section class="section-contact">
        <div class="container-wide">
        <div class="contact-shell reveal">
            <div class="contact-intro">
                <div class="contact-kicker"><span>01</span> START YOUR PROJECT</div>
                <h2 class="section-title text-white">Ready to Grow Your Business Online?</h2>
                <p class="section-subtitle" style="color: rgba(203,213,225,.65);">Share a few details about your project and ClickVera will get back to you within 24 hours with a clear plan and a free proposal — no commitment required. Prefer to talk first? <a href="{{ route('contact') }}" style="color:#5eead4; font-weight:700;">Book a free consultation</a>.</p>
                <div class="contact-benefits">
                    <div class="contact-benefit">
                        <span class="contact-benefit-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--cv-green-bright)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: -4px; margin-right: 6px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </span>
                        <div><strong>24-hour response</strong><p>A clear next step, without the sales pressure.</p></div>
                    </div>
                    <div class="contact-benefit">
                        <span class="contact-benefit-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--cv-green-bright)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: -4px; margin-right: 6px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        </span>
                        <div><strong>Free project roadmap</strong><p>Scope, timeline and transparent pricing included.</p></div>
                    </div>
                </div>
                <div class="contact-process"><span><b>1</b>Tell us</span><i></i><span><b>2</b>We plan</span><i></i><span><b>3</b>We build</span></div>
            </div>
            <form method="post" action="{{ route('contact.store') }}" class="contact-card contact-form-modern">
                @csrf
                <div class="contact-form-head"><div><span class="plan-badge">Project inquiry</span><p class="contact-form-title" style="font-size:1.25rem; font-weight:800; color:#fff; margin-top:8px;">Tell us what you're building.</p></div><span class="contact-form-number" aria-hidden="true">02</span></div>
                @if(session('success'))
                    <div class="success-alert">{{ session('success') }}</div>
                @endif
                <div class="contact-fields">
                    <label><span>Your name</span><input class="field-dark" name="name" value="{{ old('name') }}" placeholder="e.g. Rahul Sharma" required autocomplete="name"></label>
                    <label><span>Work email</span><input class="field-dark" name="email" value="{{ old('email') }}" type="email" placeholder="you@company.com" required autocomplete="email"></label>
                    <label class="contact-field-wide"><span>Phone number <small>Optional</small></span><input class="field-dark" name="phone" value="{{ old('phone') }}" type="tel" placeholder="+91 81788 42239" autocomplete="tel"></label>
                    <label class="contact-field-wide"><span>Project details</span><textarea class="field-dark" name="message" placeholder="What would you like us to design or build?" rows="5" required>{{ old('message') }}</textarea></label>
                    <button class="btn-primary btn-xl" type="submit" style="width: 100%;">
                        Start a conversation
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                    <p class="contact-privacy"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Your information stays private. No spam, ever.</p>
                </div>
            </form>
        </div>
        </div>
    </section>

</main>
@endsection

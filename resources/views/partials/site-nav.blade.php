@php
    $siteSettings = $settings ?? collect();
@endphp
<header class="site-header">
    <div class="header-accent"></div>
    <nav class="container-wide flex items-center justify-between" style="min-height: 112px; gap: 24px; padding-top: 6px; padding-bottom: 6px;">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center shrink-0" aria-label="ClickVera — Digital Marketing Agency in India (Home)" style="gap: 0;">
            <img
                src="{{ asset('assets/logo/logo.png') }}"
                alt="ClickVera — Digital Marketing Agency in India"
                width="280"
                height="108"
                fetchpriority="high"
                decoding="async"
                style="height: 108px; width: auto; max-width: 280px; object-fit: contain; display: block;"
            >
        </a>

        {{-- Center Nav — premium pill hover --}}
        <div class="hidden lg:flex items-center shrink" style="gap: 4px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 999px; padding: 4px 6px;">
            <a href="{{ route('home') }}" class="nav-pill">Home</a>
            <a href="{{ route('about') }}" class="nav-pill">About</a>
            <a href="{{ route('services') }}" class="nav-pill">Services</a>
            <a href="{{ route('services') }}#industries" class="nav-pill hidden xl:inline-flex">Industries</a>
            <a href="{{ route('services') }}#pricing" class="nav-pill">Pricing</a>
            <a href="{{ route('blog.index') }}" class="nav-pill">Blog</a>
            <a href="{{ route('contact') }}" class="nav-pill">Contact</a>
        </div>

        {{-- CTA --}}
        <div class="flex items-center shrink-0" style="gap: 10px;">
            <a href="{{ route('contact') }}" class="header-consultation-btn hidden sm:inline-flex items-center" style="gap: 8px; color: #fff; border-radius: 10px; padding: 10px 18px; font-size: 14px; font-weight: 700; letter-spacing: -0.01em; transition: all .2s;">
                Book a Free Consultation
                <span style="display: grid; place-items: center; width: 20px; height: 20px; border-radius: 6px; background: rgba(255,255,255,.12);"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
            </a>
            <button class="mobile-menu-toggle lg:hidden" type="button" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu" style="width: 42px; height: 42px; border-radius: 10px; border: 1px solid #e2e8f0; background: #fff; display: grid; place-items: center;">
                <span style="display:block; width:18px; height:2px; border-radius:99px; background:#0F172A; margin: 2.5px 0;"></span>
                <span style="display:block; width:18px; height:2px; border-radius:99px; background:#0F172A; margin: 2.5px 0;"></span>
                <span style="display:block; width:18px; height:2px; border-radius:99px; background:#0F172A; margin: 2.5px 0;"></span>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="mobile-menu lg:hidden">
        <div class="container-wide py-5">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('services') }}#industries">Industries</a>
            <a href="{{ route('services') }}#pricing">Pricing</a>
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('contact') }}" class="mt-4 w-full" style="display:flex; justify-content:center; background:#0F172A; color:#fff; border-radius:10px; padding:12px; font-weight:700;">Book a Free Consultation</a>
        </div>
    </div>
</header>

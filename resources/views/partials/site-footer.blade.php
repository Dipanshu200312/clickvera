@php
    $siteSettings = $settings ?? collect();
    $siteName = $siteSettings['site_name'] ?? 'ClickVera';
    $contactEmail = $siteSettings['contact_email'] ?? 'team@clickvera.in';
    $contactPhone = $siteSettings['contact_phone'] ?? '+91 8178842239';
    $footerImage = 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1400&q=85';
    $teamImage = 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=85';
    $codeImage = 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1000&q=85';
    $writingImage = 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1000&q=85';
@endphp
<footer class="site-footer">
    <div class="container-wide py-16 lg:py-20">
        <div class="footer-cta">
            <div>
                <p class="eyebrow">Ready to start?</p>
                <h2>Ready to Grow Your Business Online?</h2>
                <p>Websites, SEO, digital marketing, e-commerce, UI/UX and technical support shaped around your business goals. <a href="{{ route('services') }}" style="color:#5eead4; font-weight:700;">Explore digital marketing services</a>.</p>
            </div>
            <a href="{{ route('contact') }}" class="btn-primary btn-xl" style="white-space: nowrap;">
                Book a Free Consultation
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="brand-mark" style="color: #fff;">
                    <span class="brand-signal"></span>
                    {{ $siteName }}
                </a>
                <p>{{ $siteSettings['footer_text'] ?? 'ClickVera - Your digital and technology partner for building, growing and supporting your business.' }}</p>
                <div class="footer-image-row">
                    <img src="{{ $teamImage }}" alt="ClickVera digital marketing and technology team planning client growth" width="400" height="260" loading="lazy" decoding="async">
                    <img src="{{ $codeImage }}" alt="Website development project by ClickVera web development company in India" width="400" height="260" loading="lazy" decoding="async">
                    <img src="{{ $writingImage }}" alt="ClickVera SEO and digital marketing services content workspace" width="400" height="260" loading="lazy" decoding="async">
                </div>
            </div>

            <div>
                <h3>Quick Links</h3>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('services') }}#industries">Industries</a>
                <a href="{{ route('work') }}">Our Work</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('services') }}#pricing">Pricing</a>
            </div>

            <div>
                <h3>Services</h3>
                <a href="{{ route('services') }}#services">Website Design &amp; Development</a>
                <a href="{{ route('services') }}#services">UI/UX Design Services</a>
                <a href="{{ route('services') }}#services">SEO &amp; Digital Marketing</a>
                <a href="{{ route('services') }}#services">E-commerce Development</a>
                <a href="{{ route('services') }}#services">Technical Support &amp; Maintenance</a>
            </div>

            <div>
                <h3>Contact</h3>
                <p><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></p>
                <p><a href="tel:+918178842239">{{ $contactPhone }}</a></p>
                <a href="{{ route('privacy') }}">Privacy Policy</a>
                <a href="{{ route('terms') }}">Terms & Conditions</a>
                {{-- Social profiles: add real URLs when available. Placeholder "#" links removed to avoid broken/crawlable links. --}}
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.</span>
            <span style="letter-spacing: 0.08em;">Build . Grow . Support</span>
        </div>
    </div>
</footer>

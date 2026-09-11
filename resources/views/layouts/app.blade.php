<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('meta_title', ($settings['site_name'] ?? config('app.name', 'ClickVera')))</title>
    <meta name="description" content="@yield('meta_description', $settings['meta_description'] ?? 'Digital marketing, website development, and content writing agency.')">
    <meta name="keywords" content="@yield('meta_keywords', 'digital marketing agency India, web development company, SEO services, ClickVera')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta property="og:title" content="@yield('meta_title', $settings['site_name'] ?? config('app.name', 'ClickVera'))">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description'] ?? 'Digital marketing, website development, and content writing agency.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:site_name" content="ClickVera">
    <meta property="og:locale" content="en_IN">
    <meta property="og:image" content="@yield('og_image', asset('assets/logo/logo.png'))">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', $settings['site_name'] ?? config('app.name', 'ClickVera'))">
    <meta name="twitter:description" content="@yield('meta_description', $settings['meta_description'] ?? 'Digital marketing, website development, and content writing agency.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/logo/logo.png'))">
    <meta name="theme-color" content="#0F172A">
    <link rel="icon" type="image/png" sizes="any" href="{{ asset('assets/logo/favicon.png') }}?v=3">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logo/favicon.png') }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset('assets/logo/favicon.png') }}?v=3">
    @yield('schema')
@vite(['resources/css/app.css', 'resources/js/app.js'])

<meta name="google-site-verification" content="e3DLXRwoQWeVHSfSTOpViPd1FQ1pnbsnkz8MFEEULuY" />
</head>
<body class="antialiased">
    <div class="page-loader" aria-hidden="true">
        <div class="page-loader__mark">
            <span></span>
        </div>
    </div>
    <div class="scroll-progress" aria-hidden="true"></div>
    @hasSection('minimal')
    @else
        @include('partials.site-nav')
    @endif

    @yield('content')

    @hasSection('minimal')
    @else
        @include('partials.site-footer')
    @endif
</body>
</html>

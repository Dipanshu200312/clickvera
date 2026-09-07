<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', $settings['meta_description'] ?? 'Digital marketing, website development, and content writing agency.')">
    <meta name="keywords" content="@yield('meta_keywords', 'digital marketing, website development, content writing, SEO, Laravel agency')">
    <meta property="og:title" content="@yield('meta_title', $settings['site_name'] ?? config('app.name'))">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description'] ?? 'Digital marketing, website development, and content writing agency.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif
    <title>@yield('meta_title', $settings['site_name'] ?? config('app.name'))</title>
    <link rel="icon" type="image/png" sizes="any" href="{{ asset('public/assets/logo/favicon.png') }}?v=3">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/assets/logo/favicon.png') }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset('public/assets/logo/favicon.png') }}?v=3">
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

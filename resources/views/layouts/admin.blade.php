<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-950">
<div class="min-h-screen lg:flex">
    <aside class="bg-slate-950 p-6 text-white lg:w-72">
        <a href="{{ route('admin.dashboard') }}" class="text-xl font-black">GrowthForge CMS</a>
        <nav class="mt-8 grid gap-2 text-sm">
            <a class="admin-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="admin-link" href="{{ route('admin.settings.edit') }}">Website Content</a>
            @foreach(config('cms.resources') as $slug => $resource)
                <a class="admin-link" href="{{ route('admin.resources.index', $slug) }}">{{ Str::plural($resource['label']) }}</a>
            @endforeach
        </nav>
        <form method="post" action="{{ route('logout') }}" class="mt-8">@csrf<button class="btn-light w-full">Logout</button></form>
    </aside>
    <main class="flex-1 p-6 lg:p-10">
        @if(session('success'))<div class="mb-6 rounded-lg bg-emerald-100 p-4 text-emerald-900">{{ session('success') }}</div>@endif
        @yield('content')
    </main>
</div>
</body>
</html>

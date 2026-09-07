@extends('layouts.admin')
@section('content')
<h1 class="text-3xl font-black">Website Content</h1>
<form method="post" action="{{ route('admin.settings.update') }}" class="mt-6 grid gap-5 rounded-xl bg-white p-6 shadow-sm">
    @csrf
    @foreach(['site_name' => 'Site name', 'hero_heading' => 'Hero heading', 'hero_subheading' => 'Hero subheading', 'primary_cta' => 'Primary CTA', 'secondary_cta' => 'Secondary CTA', 'about_title' => 'About title', 'about_description' => 'About description', 'mission' => 'Mission', 'vision' => 'Vision', 'footer_text' => 'Footer text', 'contact_email' => 'Contact email', 'contact_phone' => 'Contact phone', 'meta_description' => 'Meta description'] as $key => $label)
        <label><span class="field-label">{{ $label }}</span><textarea class="field min-h-20" name="{{ $key }}">{{ old($key, $settings[$key] ?? '') }}</textarea></label>
    @endforeach
    <button class="btn-primary w-fit">Save content</button>
</form>
@endsection

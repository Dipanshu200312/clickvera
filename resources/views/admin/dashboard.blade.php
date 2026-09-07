@extends('layouts.admin')
@section('content')
<h1 class="text-3xl font-black">Dashboard</h1>
<div class="mt-6 grid gap-4 md:grid-cols-4">
    @foreach($stats as $label => $value)
        <div class="rounded-xl bg-white p-6 shadow-sm"><p class="text-sm text-slate-500">{{ $label }}</p><strong class="mt-2 block text-3xl">{{ $value }}</strong></div>
    @endforeach
</div>
<section class="mt-8 rounded-xl bg-white p-6 shadow-sm">
    <h2 class="text-xl font-bold">Recent inquiries</h2>
    <div class="mt-4 overflow-x-auto">
        <table class="w-full text-left text-sm">
            @foreach($leads as $lead)
                <tr class="border-t"><td class="py-3 font-semibold">{{ $lead->name }}</td><td>{{ $lead->email }}</td><td>{{ $lead->phone }}</td><td>{{ $lead->created_at->diffForHumans() }}</td></tr>
            @endforeach
        </table>
    </div>
</section>
@endsection

@extends('layouts.admin')
@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <h1 class="text-3xl font-black">{{ Str::plural($config['label']) }}</h1>
    <a class="btn-primary" href="{{ route('admin.resources.create', $resource) }}">Add {{ $config['label'] }}</a>
</div>
<div class="mt-6 overflow-x-auto rounded-xl bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-slate-50 text-slate-500"><tr>@foreach($config['columns'] as $column)<th class="p-4">{{ Str::headline($column) }}</th>@endforeach<th class="p-4">Actions</th></tr></thead>
        <tbody>
            @foreach($items as $item)
                <tr class="border-t">@foreach($config['columns'] as $column)<td class="p-4">{{ is_bool($item->{$column}) ? ($item->{$column} ? 'Yes' : 'No') : Str::limit($item->{$column}, 55) }}</td>@endforeach
                    <td class="flex gap-2 p-4"><a class="btn-light" href="{{ route('admin.resources.edit', [$resource, $item->id]) }}">Edit</a><form method="post" action="{{ route('admin.resources.destroy', [$resource, $item->id]) }}">@csrf @method('delete')<button class="btn-danger">Delete</button></form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-5">{{ $items->links() }}</div>
@endsection

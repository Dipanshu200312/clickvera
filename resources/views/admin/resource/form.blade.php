@extends('layouts.admin')
@section('content')
<h1 class="text-3xl font-black">{{ $item->exists ? 'Edit' : 'Add' }} {{ $config['label'] }}</h1>
<form method="post" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.resources.update', [$resource, $item->id]) : route('admin.resources.store', $resource) }}" class="mt-6 grid gap-5 rounded-xl bg-white p-6 shadow-sm">
    @csrf
    @if($item->exists) @method('put') @endif
    @foreach($config['fields'] as $name => $field)
        @php($type = $field['type'] ?? 'text')
        <label class="{{ $type === 'checkbox' ? 'flex items-center gap-3' : '' }}">
            @if($type === 'checkbox')
                <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $item->{$name} ?? true))>
                <span>{{ $field['label'] }}</span>
            @else
                <span class="field-label">{{ $field['label'] }}</span>
                @if($type === 'richtext')
                    <div class="rich-toolbar">
                        <button type="button" data-command="bold">Bold</button>
                        <button type="button" data-command="italic">Italic</button>
                        <button type="button" data-command="insertUnorderedList">List</button>
                        <button type="button" data-command="formatBlock" data-value="h2">Heading</button>
                    </div>
                    <textarea class="rich-source" name="{{ $name }}">{{ old($name, $item->{$name}) }}</textarea>
                    <div class="rich-editor" contenteditable="true">{!! old($name, $item->{$name}) !!}</div>
                @elseif($type === 'select')
                    <select class="field" name="{{ $name }}" required>
                        <option value="">Select {{ strtolower($field['label']) }}</option>
                        @foreach($field['options'] ?? [] as $option)
                            @php($optionValue = is_array($option) ? $option['value'] : $option)
                            @php($optionLabel = is_array($option) ? $option['label'] : $option)
                            <option value="{{ $optionValue }}" @selected((string) old($name, $item->{$name}) === (string) $optionValue)>{{ $optionLabel }}</option>
                        @endforeach
                    </select>
                @elseif($type === 'textarea' || $type === 'lines')
                    <textarea class="field min-h-28" name="{{ $name }}">{{ old($name, $type === 'lines' ? implode("\n", $item->{$name} ?? []) : $item->{$name}) }}</textarea>
                @else
                    @php($fieldValue = $type === 'password' ? '' : old($name, $type === 'datetime-local' && $item->{$name} ? $item->{$name}->format('Y-m-d\TH:i') : $item->{$name}))
                    <input class="field" type="{{ $type === 'image' ? 'file' : $type }}" name="{{ $name }}" value="{{ $type === 'image' ? '' : $fieldValue }}">
                @endif
            @endif
            @error($name)<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
        </label>
    @endforeach
    <button class="btn-primary w-fit">Save</button>
</form>
@endsection

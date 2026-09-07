<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ResourceController extends Controller
{
    private array $resources;

    public function __construct()
    {
        $this->resources = config('cms.resources');
    }

    public function index(string $resource): View
    {
        $config = $this->config($resource);
        $items = $config['model']::latest()->paginate(15);

        return view('admin.resource.index', compact('resource', 'config', 'items'));
    }

    public function create(string $resource): View
    {
        $config = $this->config($resource);
        $item = new $config['model'];

        return view('admin.resource.form', compact('resource', 'config', 'item'));
    }

    public function store(Request $request, string $resource): RedirectResponse
    {
        $config = $this->config($resource);
        $data = $this->validatedData($request, $config);
        $config['model']::create($data);

        return redirect()->route('admin.resources.index', $resource)->with('success', "{$config['label']} created.");
    }

    public function edit(string $resource, int $id): View
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);

        return view('admin.resource.form', compact('resource', 'config', 'item'));
    }

    public function update(Request $request, string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);
        $item->update($this->validatedData($request, $config, $item));

        return redirect()->route('admin.resources.index', $resource)->with('success', "{$config['label']} updated.");
    }

    public function destroy(string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $config['model']::findOrFail($id)->delete();

        return back()->with('success', "{$config['label']} deleted.");
    }

    private function config(string $resource): array
    {
        abort_unless(isset($this->resources[$resource]), 404);
        return $this->withFieldOptions($this->resources[$resource]);
    }

    private function withFieldOptions(array $config): array
    {
        foreach ($config['fields'] as $name => $field) {
            if (($field['type'] ?? 'text') !== 'select' || ! isset($field['options_model'])) {
                continue;
            }

            $modelClass = $field['options_model'];
            $query = $modelClass::query();

            if (array_key_exists('is_active', (new $modelClass)->getCasts())) {
                $query->where('is_active', true);
            }

            $config['fields'][$name]['options'] = $query
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get()
                ->map(fn ($option) => ['value' => $option->id, 'label' => $option->name])
                ->all();
        }

        return $config;
    }

    private function validatedData(Request $request, array $config, ?Model $item = null): array
    {
        $rules = collect($config['fields'])->mapWithKeys(function ($field, $name) use ($item) {
            $fieldRules = $field['rules'] ?? ['nullable'];

            if ($item && ($field['type'] ?? 'text') === 'password') {
                $fieldRules = collect($fieldRules)
                    ->reject(fn ($rule) => $rule === 'required')
                    ->prepend('nullable')
                    ->values()
                    ->all();
            }

            if ($item) {
                $fieldRules = collect($fieldRules)->map(function ($rule) use ($item, $name) {
                    if ($rule === 'unique:users,email') {
                        return Rule::unique('users', 'email')->ignore($item->id);
                    }

                    if (($rule === 'unique:blog_categories,slug' || $name === 'slug') && $item->getTable() === 'blog_categories') {
                        return Rule::unique('blog_categories', 'slug')->ignore($item->id);
                    }

                    return $rule;
                })->all();
            }

            return [$name => $fieldRules];
        })->all();
        $data = $request->validate($rules);

        foreach ($config['fields'] as $name => $field) {
            if (($field['type'] ?? 'text') === 'password' && blank($data[$name] ?? null)) {
                unset($data[$name]);
            }

            if (($field['type'] ?? 'text') === 'checkbox') {
                $data[$name] = $request->boolean($name);
            }

            if (($field['type'] ?? 'text') === 'lines') {
                $data[$name] = collect(preg_split('/\r\n|\r|\n/', $request->input($name, '')))
                    ->map(fn ($line) => trim($line))
                    ->filter()
                    ->values()
                    ->all();
            }

            if (($field['type'] ?? 'text') === 'richtext') {
                $data[$name] = strip_tags($request->input($name, ''), '<p><br><strong><b><em><i><u><h2><h3><ul><ol><li><a><blockquote>');
            }

            if (($field['type'] ?? 'text') === 'image') {
                unset($data[$name]);
                if ($request->hasFile($name)) {
                    $data[$name] = $request->file($name)->store($config['storage'] ?? 'uploads', 'public');
                } elseif ($item) {
                    $data[$name] = $item->{$name};
                }
            }
        }

        foreach ($config['fields'] as $name => $field) {
            if (($field['slug_from'] ?? null) && blank($data[$name] ?? null)) {
                $data[$name] = Str::slug($data[$field['slug_from']] ?? Str::random(8));
            }
        }

        return $data;
    }
}

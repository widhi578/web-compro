<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function edit(string $page): View
    {
        abort_unless(isset(config('cms.pages')[$page]), 404);

        return view('admin.content.edit', [
            'pageKey' => $page,
            'page' => config("cms.pages.{$page}"),
            'groups' => config("cms.pages.{$page}.groups"),
        ]);
    }

    public function update(Request $request, string $page): RedirectResponse
    {
        abort_unless(isset(config('cms.pages')[$page]), 404);

        $fields = collect(config("cms.pages.{$page}.groups"))
            ->flatMap(fn (array $group) => $group['fields'])
            ->keyBy('key');

        $rules = $fields->mapWithKeys(function (array $field, string $key): array {
            $rule = $field['type'] === 'image'
                ? ['nullable', 'string', 'max:2048']
                : ['required', 'string', 'max:5000'];

            return ["content.{$key}" => $rule];
        })->all();

        foreach ($fields->where('type', 'image') as $key => $field) {
            $rules["image_uploads.{$key}"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }

        $validated = $request->validate($rules);
        $values = $validated['content'] ?? [];

        foreach ($fields->where('type', 'image') as $key => $field) {
            $image = $values[$key] ?? '';

            if ($image !== '' && ! $this->isAllowedImageValue($image)) {
                throw ValidationException::withMessages([
                    "content.{$key}" => 'Gunakan URL gambar HTTP/HTTPS atau path gambar lokal yang valid.',
                ]);
            }

            if ($request->hasFile("image_uploads.{$key}")) {
                $file = $request->file("image_uploads.{$key}");
                $directory = public_path('uploads/content');
                File::ensureDirectoryExists($directory);

                $filename = Str::uuid().'.'.$file->extension();
                $file->move($directory, $filename);
                $values[$key] = '/uploads/content/'.$filename;

                $this->deleteManagedImage(SiteContent::value($key));
            }
        }

        foreach ($values as $key => $value) {
            SiteContent::query()->updateOrCreate(
                ['key' => $key],
                ['value' => trim((string) $value)]
            );
        }

        return redirect()
            ->route('admin.content.edit', $page)
            ->with('status', 'Konten berhasil diperbarui.');
    }

    private function isAllowedImageValue(string $value): bool
    {
        if (str_starts_with($value, '/uploads/content/')) {
            return ! str_contains($value, '..');
        }

        $url = parse_url($value);

        return filter_var($value, FILTER_VALIDATE_URL)
            && in_array($url['scheme'] ?? '', ['http', 'https'], true);
    }

    private function deleteManagedImage(string $value): void
    {
        if (! str_starts_with($value, '/uploads/content/')) {
            return;
        }

        $path = public_path(ltrim($value, '/'));

        if (is_file($path)) {
            unlink($path);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Support\RichText;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all');
        if (! in_array($status, ['all', 'published', 'draft'], true)) {
            $status = 'all';
        }

        $query = Article::query()->latest();
        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        }

        return view('admin.articles.index', [
            'articles' => $query->paginate(12)->withQueryString(),
            'articleCounts' => [
                'all' => Article::count(),
                'published' => Article::where('is_published', true)->count(),
                'draft' => Article::where('is_published', false)->count(),
            ],
            'statusFilter' => $status,
            'categories' => config('cms.article_categories'),
        ]);
    }

    public function create(): View
    {
        return view('admin.articles.form', [
            'article' => new Article(['is_published' => true, 'reading_time' => '4 menit baca']),
            'categories' => config('cms.article_categories'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['image'] = $this->storeImage($request);
        $data['content'] = RichText::sanitize($data['content']);
        Article::create($data);

        return redirect()->route('admin.articles.index')->with('status', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', [
            'article' => $article,
            'categories' => config('cms.article_categories'),
        ]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validatedData($request, $article);

        if ($article->title !== $data['title']) {
            $data['slug'] = $this->uniqueSlug($data['title'], $article->id);
        }

        if ($request->hasFile('image')) {
            $this->deleteManagedImage($article->image);
            $data['image'] = $this->storeImage($request);
        }

        $data['content'] = RichText::sanitize($data['content']);
        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->deleteManagedImage($article->image);
        $article->delete();

        return redirect()->route('admin.articles.index');
    }

    public function toggleStatus(Article $article): RedirectResponse
    {
        $article->is_published = ! $article->is_published;
        $article->save();

        return redirect()->route('admin.articles.index')->with(
            'status',
            $article->is_published
                ? 'Artikel berhasil diterbitkan dan sekarang tampil di halaman Blog.'
                : 'Artikel dipindahkan ke Draft dan tidak tampil di halaman Blog.'
        );
    }

    private function validatedData(Request $request, ?Article $article = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'category' => ['required', Rule::in(array_keys(config('cms.article_categories')))],
            'excerpt' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string', 'max:20000'],
            'image_alt' => ['nullable', 'string', 'max:250'],
            'reading_time' => ['required', 'string', 'max:40'],
            'is_published' => ['required', 'boolean'],
            'image' => [$article ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 2;

        while (Article::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/articles');
        File::ensureDirectoryExists($directory);
        $file = $request->file('image');
        $filename = Str::uuid().'.'.$file->extension();
        $file->move($directory, $filename);

        return '/uploads/articles/'.$filename;
    }

    private function deleteManagedImage(?string $image): void
    {
        if (! $image || ! str_starts_with($image, '/uploads/articles/')) {
            return;
        }

        $path = public_path(ltrim($image, '/'));

        if (is_file($path)) {
            unlink($path);
        }
    }
}

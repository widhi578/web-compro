<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PublicBlogController extends Controller
{
    public function index(): View
    {
        $contentKeys = [
            'alam-petualangan' => 'nature',
            'budaya-lokal' => 'culture',
            'tips-perjalanan' => 'tips',
        ];
        $articles = Schema::hasTable((new Article)->getTable())
            ? Article::query()->where('is_published', true)->latest()->get()
            : collect();

        $categories = collect(config('cms.article_categories'))
            ->map(function (string $title, string $key) use ($articles, $contentKeys) {
                return [
                    'id' => $key,
                    'title' => SiteContent::value('category.'.$contentKeys[$key].'.title') ?: $title,
                    'url' => route(config("cms.article_category_routes.{$key}")),
                    'articles' => $articles->where('category', $key)->values(),
                ];
            })->values();

        return view('blog', [
            'categories' => $categories,
            'contentValue' => static fn (string $key): string => SiteContent::value($key),
        ]);
    }
}

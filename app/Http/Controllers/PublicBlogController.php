<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class PublicBlogController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()->where('is_published', true)->latest()->get();

        $categories = collect(config('cms.article_categories'))
            ->map(function (string $title, string $key) use ($articles) {
                return [
                    'id' => $key,
                    'title' => $title,
                    'url' => route(config("cms.article_category_routes.{$key}")),
                    'articles' => $articles->where('category', $key)->values(),
                ];
            })->values();

        return view('blog', compact('categories'));
    }
}

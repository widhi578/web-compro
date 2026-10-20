@extends('layouts.app')

@section('title', 'Tips Perjalanan — Travel Indo')

@section('content')
    @php
        $c = $contentValue;
        $category = [
            'title' => $c('category.tips.title'),
            'eyebrow' => $c('category.tips.eyebrow'),
            'intro' => $c('category.tips.intro'),
            'reading_time' => '4 menit baca',
            'article_title' => $c('category.tips.article_title'),
            'lead' => $c('category.tips.lead'),
            'image' => $c('category.tips.image'),
            'image_alt' => $c('category.tips.image_alt'),
            'image_caption' => $c('category.tips.image_caption'),
            'paragraphs' => preg_split('/\r\n\s*\r\n|\n\s*\n/', trim($c('category.tips.body'))),
            'section_title' => $c('category.tips.section_title'),
            'section_intro' => $c('category.tips.section_intro'),
            'tips' => preg_split('/\r\n|\r|\n/', trim($c('category.tips.tips'))),
            'closing' => $c('category.tips.closing'),
            'related' => collect([1, 2])->map(fn (int $item): array => [
                'label' => $c("category.tips.related.{$item}.label"),
                'title' => $c("category.tips.related.{$item}.title"),
                'excerpt' => $c("category.tips.related.{$item}.excerpt"),
                'image' => $c("category.tips.related.{$item}.image"),
                'alt' => $c("category.tips.related.{$item}.alt"),
            ])->all(),
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

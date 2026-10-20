@extends('layouts.app')

@section('title', 'Budaya & Rasa Lokal — Travel Indo')

@section('content')
    @php
        $c = $contentValue;
        $category = [
            'title' => $c('category.culture.title'),
            'eyebrow' => $c('category.culture.eyebrow'),
            'intro' => $c('category.culture.intro'),
            'reading_time' => '5 menit baca',
            'article_title' => $c('category.culture.article_title'),
            'lead' => $c('category.culture.lead'),
            'image' => $c('category.culture.image'),
            'image_alt' => $c('category.culture.image_alt'),
            'image_caption' => $c('category.culture.image_caption'),
            'paragraphs' => preg_split('/\r\n\s*\r\n|\n\s*\n/', trim($c('category.culture.body'))),
            'section_title' => $c('category.culture.section_title'),
            'section_intro' => $c('category.culture.section_intro'),
            'tips' => preg_split('/\r\n|\r|\n/', trim($c('category.culture.tips'))),
            'closing' => $c('category.culture.closing'),
            'related' => collect([1, 2])->map(fn (int $item): array => [
                'label' => $c("category.culture.related.{$item}.label"),
                'title' => $c("category.culture.related.{$item}.title"),
                'excerpt' => $c("category.culture.related.{$item}.excerpt"),
                'image' => $c("category.culture.related.{$item}.image"),
                'alt' => $c("category.culture.related.{$item}.alt"),
            ])->all(),
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

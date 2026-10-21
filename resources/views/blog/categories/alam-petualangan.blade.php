@extends('layouts.app')

@section('title', 'Alam & Petualangan — Travel Indo')

@section('content')
    @php
        $c = $contentValue;
        $category = [
            'title' => $c('category.nature.title'),
            'eyebrow' => $c('category.nature.eyebrow'),
            'intro' => $c('category.nature.intro'),
            'reading_time' => '5 menit baca',
            'article_title' => $c('category.nature.article_title'),
            'lead' => $c('category.nature.lead'),
            'image' => $c('category.nature.image'),
            'image_alt' => $c('category.nature.image_alt'),
            'image_caption' => $c('category.nature.image_caption'),
            'body' => $c('category.nature.body'),
            'section_title' => $c('category.nature.section_title'),
            'section_intro' => $c('category.nature.section_intro'),
            'tips' => preg_split('/\r\n|\r|\n/', trim($c('category.nature.tips'))),
            'closing' => $c('category.nature.closing'),
            'related' => collect([1, 2])->map(fn (int $item): array => [
                'label' => $c("category.nature.related.{$item}.label"),
                'title' => $c("category.nature.related.{$item}.title"),
                'excerpt' => $c("category.nature.related.{$item}.excerpt"),
                'image' => $c("category.nature.related.{$item}.image"),
                'alt' => $c("category.nature.related.{$item}.alt"),
            ])->all(),
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

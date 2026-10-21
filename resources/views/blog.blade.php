@extends('layouts.app')

@section('title', 'Blog - Travel Indo')

@section('content')
    @php($c = $contentValue)
    <div class="ad-home blog-page" id="top">
        {{-- Pengantar halaman blog. --}}
        <section class="blog-page__banner" aria-labelledby="blog-title">
            <p class="ad-index">{{ $c('blog.banner.eyebrow') }}</p>
            <h1 id="blog-title">{{ $c('blog.banner.title') }}</h1>
            <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($c('blog.banner.description')) !!}</div>
        </section>

        <div class="blog-page__content">
            <div class="blog-page__heading">
                <div>
                    <p class="ad-index">KATEGORI ARTIKEL</p>
                    <h2>{{ $c('blog.heading') }}</h2>
                </div>
            </div>

            {{-- Artikel dikelompokkan sesuai kategori. --}}
            @foreach ($categories as $category)
                <section
                    class="blog-page__category"
                    id="{{ $category['id'] }}"
                    aria-labelledby="{{ $category['id'] }}-title"
                >
                    <div class="blog-page__category-heading">
                        <h2 id="{{ $category['id'] }}-title">
                            <a href="{{ $category['url'] }}">{{ $category['title'] }}</a>
                        </h2>
                        <a href="{{ $category['url'] }}">Buka halaman kategori <span aria-hidden="true">↗</span></a>
                    </div>

                    <div class="blog-page__grid">
                        @forelse ($category['articles'] as $article)
                            <article class="blog-card">
                                <div class="blog-card__image">
                                    <img
                                        src="{{ $article->image }}"
                                        alt="{{ $article->image_alt }}"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="blog-card__body">
                                    <div class="blog-card__meta">
                                        <span>{{ $category['title'] }}</span>
                                        <span>{{ $article->reading_time }}</span>
                                    </div>
                                    <h3>{{ $article->title }}</h3>
                                    <p>{{ $article->excerpt }}</p>
                                    <details class="blog-card__more">
                                        <summary>Baca selengkapnya <span aria-hidden="true">↗</span></summary>
                                        <div class="blog-card__formatted-content">
                                            {!! \App\Support\RichText::sanitize($article->content) !!}
                                        </div>
                                    </details>
                                </div>
                            </article>
                        @empty
                            <p>Belum ada artikel untuk kategori ini.</p>
                        @endforelse
                    </div>
                </section>
            @endforeach
        </div>

        @include('partials.contact-footer')
    </div>
@endsection

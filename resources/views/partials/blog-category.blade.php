@php($c = $contentValue)

<div class="ad-home blog-article-page" id="top">
    {{-- Breadcrumb dan pengantar kategori. --}}
    <section class="blog-article-page__banner" aria-labelledby="category-title">
        <div class="shell">
            <nav class="blog-article-page__breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('blog') }}">Blog</a>
                <span aria-hidden="true">/</span>
                <span>{{ $category['title'] }}</span>
            </nav>
            <p class="ad-index">{{ $category['eyebrow'] }}</p>
            <h1 id="category-title">{{ $category['title'] }}</h1>
            <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($category['intro']) !!}</div>
        </div>
    </section>

    {{-- Artikel utama, tips, dan bacaan terkait. --}}
    <section class="blog-article-page__content" aria-label="Artikel {{ $category['title'] }}">
        <article class="blog-article">
            <header class="blog-article__header">
                <div class="blog-article__meta">
                    <span>{{ $category['title'] }}</span>
                    <span>{{ $category['reading_time'] }}</span>
                    <span>Oleh Travel Indo</span>
                </div>
                <h2>{{ $category['article_title'] }}</h2>
                <div class="blog-article__lead ad-rich-copy">{!! \App\Support\RichText::sanitize($category['lead']) !!}</div>
            </header>

            <figure class="blog-article__cover">
                <img
                    src="{{ $category['image'] }}"
                    alt="{{ $category['image_alt'] }}"
                >
                <figcaption>{{ $category['image_caption'] }}</figcaption>
            </figure>

            <div class="blog-article__body">
                {!! \App\Support\RichText::sanitize($category['body']) !!}

                <h3>{{ $category['section_title'] }}</h3>
                <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($category['section_intro']) !!}</div>
                <ul>
                    @foreach ($category['tips'] as $tip)
                        <li>{{ $tip }}</li>
                    @endforeach
                </ul>
                <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($category['closing']) !!}</div>

                <aside class="blog-article__note">
                    <strong>{{ $c('shared.article.note_title') }}</strong>
                    <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($c('shared.article.note')) !!}</div>
                </aside>
            </div>
        </article>

        <section class="blog-article-related" aria-labelledby="related-title">
            <div class="blog-article-related__heading">
                <div>
                    <p class="ad-index">{{ $c('shared.related.eyebrow') }}</p>
                    <h2 id="related-title">{{ $c('shared.related.title') }}</h2>
                </div>
                <a href="{{ route('blog') }}">{{ $c('shared.related.link') }} <span aria-hidden="true">↗</span></a>
            </div>

            <div class="blog-article-related__grid">
                @foreach ($category['related'] as $story)
                    <article class="blog-article-related__card">
                        <img
                            src="{{ $story['image'] }}"
                            alt="{{ $story['alt'] }}"
                            loading="lazy"
                        >
                        <div>
                            <span>{{ $story['label'] }}</span>
                            <h3>{{ $story['title'] }}</h3>
                            <div class="ad-rich-copy">{!! \App\Support\RichText::sanitize($story['excerpt']) !!}</div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </section>

    @include('partials.contact-footer')
</div>

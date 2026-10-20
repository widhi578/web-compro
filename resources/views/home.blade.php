@extends('layouts.app')

@section('title', 'Travel Indo')

@section('content')
    @php
        $c = $contentValue;
        $headline = static function (string $key) use ($c): string {
            $lines = explode("\n", $c($key), 2);
            return e($lines[0]).(isset($lines[1]) ? '<br><i>'.e($lines[1]).'</i>' : '');
        };
        $specialties = range(1, 5);
        $reasons = range(1, 4);
        $trips = range(1, 3);
        $gallery = range(1, 7);
    @endphp

    <div class="ad-home travel-ad-home">
        <section class="ad-hero" id="top">
            <div class="ad-hero__grain" aria-hidden="true"></div>
            <div class="ad-hero__gallery" data-hero-gallery role="group" aria-roledescription="carousel" aria-label="Galeri destinasi Travel Indo" tabindex="0">
                @foreach (range(1, 3) as $slide)
                    <figure class="ad-hero__slide" data-hero-slide role="group" aria-roledescription="slide" aria-label="{{ $slide }} dari 3">
                        <img src="{{ $c("home.hero.slide{$slide}.image") }}" alt="{{ $c("home.hero.slide{$slide}.caption") }}" @if ($slide === 1) fetchpriority="high" @else loading="lazy" @endif>
                        <figcaption>{{ $c("home.hero.slide{$slide}.caption") }}</figcaption>
                    </figure>
                @endforeach
            </div>
            <div class="ad-hero__travel-shade"></div>
            <div class="shell ad-hero__inner">
                <p class="ad-overline">{{ $c('home.hero.overline') }}</p>
                <h1>{!! $headline('home.hero.title') !!}</h1>
                <p class="ad-hero__copy">{{ $c('home.hero.description') }}</p>
                <div class="ad-hero__actions">
                    <a class="ad-button" href="#perjalanan">Cari perjalanan <span aria-hidden="true">↗</span></a>
                    <a class="ad-text-link ad-text-link--light" href="{{ route('contact') }}">Rencanakan bersama <span aria-hidden="true">→</span></a>
                </div>
            </div>
            <div class="ad-hero__controls" aria-label="Kontrol galeri hero">
                <button type="button" data-hero-previous aria-label="Foto sebelumnya">←</button>
                <div role="group" aria-label="Pilih foto">
                    @foreach (range(0, 2) as $dot)
                        <button type="button" data-hero-dot="{{ $dot }}" aria-label="Tampilkan foto {{ $dot + 1 }}" @if ($dot === 0) aria-current="true" @endif></button>
                    @endforeach
                </div>
                <button type="button" data-hero-next aria-label="Foto berikutnya">→</button>
            </div>
        </section>

        <section class="ad-intro" aria-labelledby="intro-title"><div class="shell ad-intro__grid"><p class="ad-index">01 / {{ $c('home.intro.eyebrow') }}</p><div><h2 id="intro-title">{!! $headline('home.intro.title') !!}</h2><p>{{ $c('home.intro.description') }}</p><a class="ad-text-link" href="{{ route('about') }}">{{ $c('home.intro.link') }} <span aria-hidden="true">↗</span></a></div></div></section>

        <section class="ad-expertise" id="layanan" aria-labelledby="expertise-title"><div class="shell"><div class="ad-section-head"><p class="ad-index">02 / {{ $c('home.specialties.eyebrow') }}</p><h2 id="expertise-title">{!! $headline('home.specialties.title') !!}</h2></div><div class="ad-expertise__grid">
            @foreach ($specialties as $item)
                <article><div class="ad-icon" aria-hidden="true"><svg viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="14"/><path d="M12 36 24 12l12 24M16 29h16"/></svg></div><span>0{{ $item }}</span><h3>{{ $c("home.specialties.{$item}.title") }}</h3><p>{{ $c("home.specialties.{$item}.description") }}</p></article>
            @endforeach
        </div></div></section>

        <section class="ad-reasons" aria-labelledby="reasons-title"><div class="shell"><div class="ad-section-head ad-section-head--light"><p class="ad-index">03 / {{ $c('home.reasons.eyebrow') }}</p><h2 id="reasons-title">{!! $headline('home.reasons.title') !!}</h2></div><div class="ad-reasons__grid">
            @foreach ($reasons as $item)
                <article><b>0{{ $item }}</b><h3>{{ $c("home.reasons.{$item}.title") }}</h3><p>{{ $c("home.reasons.{$item}.description") }}</p></article>
            @endforeach
        </div></div></section>

        <section class="ad-products" id="perjalanan" aria-labelledby="products-title"><div class="shell"><div class="ad-section-head"><p class="ad-index">04 / {{ $c('home.trips.eyebrow') }}</p><h2 id="products-title">{!! $headline('home.trips.title') !!}</h2></div><div class="ad-products__grid ad-products__grid--visual">
            @foreach ($trips as $item)
                <a href="{{ route('contact') }}"><img src="{{ $c("home.trips.{$item}.image") }}" alt="{{ $c("home.trips.{$item}.title") }}" loading="lazy"><span>{{ $c("home.trips.{$item}.title") }} <span aria-hidden="true">↗</span></span></a>
            @endforeach
        </div></div></section>

        <section class="ad-work" id="galeri" aria-labelledby="work-title"><div class="shell"><div class="ad-section-head"><p class="ad-index">05 / GALERI PERJALANAN</p><h2 id="work-title">{!! $headline('home.gallery.title') !!}</h2><a class="ad-text-link" href="{{ route('gallery') }}">Buka galeri penuh <span aria-hidden="true">↗</span></a></div><div class="ad-work__carousel"><div class="ad-work__mosaic" data-trip-gallery role="region" aria-label="Galeri foto perjalanan Indonesia" tabindex="0">
            @foreach ($gallery as $item)
                <a class="ad-work__item" data-trip-slide href="{{ route('gallery') }}" aria-label="{{ $c("home.gallery.{$item}.title") }}"><img src="{{ $c("home.gallery.{$item}.image") }}" alt="{{ $c("home.gallery.{$item}.title") }}" loading="lazy"><span>{{ $c("home.gallery.{$item}.title") }}</span></a>
            @endforeach
        </div><div class="ad-work__controls" aria-label="Kontrol galeri"><button type="button" data-trip-previous aria-label="Foto sebelumnya">←</button><span data-trip-status aria-live="polite">01 / 07</span><button type="button" data-trip-next aria-label="Foto berikutnya">→</button></div></div></div></section>

        @include('partials.contact-footer')
    </div>
@endsection

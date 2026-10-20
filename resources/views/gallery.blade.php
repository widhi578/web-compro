@extends('layouts.app')

@section('title', 'Gallery - Travel Indo')

@section('content')
    @php($c = $contentValue)
    <div class="ad-home gallery-page" id="top">
        <section class="gallery-page__banner" aria-labelledby="gallery-title">
            <h1 id="gallery-title">{{ $c('gallery.banner.title') }}</h1>
            <span aria-hidden="true"></span>
        </section>

        <section
            class="gallery-page__content"
            aria-labelledby="gallery-content-title"
        >
            <div class="gallery-page__heading">
                <p class="ad-index">CERITA DALAM PERJALANAN</p>
                <h2 id="gallery-content-title">{{ $c('gallery.heading') }}</h2>
            </div>

            <div class="gallery-page__grid">
                @foreach (range(1, 12) as $item)
                    <a href="{{ route('contact') }}">
                        <img
                            src="{{ $c("gallery.{$item}.image") }}"
                            alt="{{ $c("gallery.{$item}.title") }}"
                            loading="lazy"
                        >
                        <span>{{ $c("gallery.{$item}.title") }}</span>
                    </a>
                @endforeach
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

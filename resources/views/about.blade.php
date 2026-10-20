@extends('layouts.app')

@section('title', 'About Us - Travel Indo')

@section('content')
    @php($c = $contentValue)
    <div class="ad-home about-simple" id="top">
        <section class="about-simple__banner" aria-labelledby="about-title">
            <h1 id="about-title">{{ $c('about.banner.title') }}</h1>
            <span aria-hidden="true"></span>
        </section>

        <section class="about-simple__content" aria-labelledby="about-heading">
            <div class="shell about-simple__inner">
                <img
                    src="{{ $c('about.image') }}"
                    alt="{{ $c('about.title') }}"
                    fetchpriority="high"
                >
                <div>
                    <h2 id="about-heading">{{ $c('about.title') }}</h2>
                    <p>{{ $c('about.paragraph1') }}</p>
                    <p>{{ $c('about.paragraph2') }}</p>
                    <a class="about-simple__button" href="#konsultasi">
                        {{ $c('about.button') }}
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

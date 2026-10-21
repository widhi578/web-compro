@extends('layouts.app')

@section('title', 'About Us - Travel Indo')

@section('content')
    @php($c = $contentValue)
    <div class="ad-home about-simple" id="top">
        {{-- Judul halaman Tentang Kami. --}}
        <section class="about-simple__banner" aria-labelledby="about-title">
            <h1 id="about-title">{{ $c('about.banner.title') }}</h1>
            <span aria-hidden="true"></span>
        </section>

        {{-- Foto dan pengenalan singkat perusahaan. --}}
        <section class="about-simple__content" aria-labelledby="about-heading">
            <div class="shell about-simple__inner">
                <img
                    src="{{ $c('about.image') }}"
                    alt="{{ $c('about.title') }}"
                    fetchpriority="high"
                >
                <div>
                    <h2 id="about-heading">{{ $c('about.title') }}</h2>
                    <div class="ad-rich-copy">
                        {!! \App\Support\RichText::sanitize($c('about.paragraph1')) !!}
                    </div>
                    <div class="ad-rich-copy">
                        {!! \App\Support\RichText::sanitize($c('about.paragraph2')) !!}
                    </div>
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

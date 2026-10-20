@extends('layouts.app')

@section('title', 'Our Services - Travel Indo')

@section('content')
    @php($c = $contentValue)
    <div class="ad-home services-page" id="top">
        <section class="services-page__banner" aria-labelledby="services-title">
            <h1 id="services-title">{{ $c('services.banner.title') }}</h1>
            <span aria-hidden="true"></span>
        </section>

        <section
            class="services-page__specialties"
            aria-labelledby="specialties-title"
        >
            <div class="shell">
                <div class="services-page__heading">
                    <p class="ad-index">LAYANAN TRAVEL INDO</p>
                    <h2 id="specialties-title">{{ $c('services.heading') }}</h2>
                    <span aria-hidden="true"></span>
                </div>

                <div class="services-page__specialties-grid">
                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="m5 37 13-22 8 13 6-9 11 18H5Z"></path>
                                <circle cx="35" cy="12" r="4"></circle>
                                <path d="M13 37 24 25l10 12"></path>
                            </svg>
                        </span>
                        <h3>{{ $c('home.specialties.1.title') }}</h3>
                        <p>{{ $c('home.specialties.1.description') }}</p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M5 20 24 8l19 12H5Z"></path>
                                <path d="M10 22h28M12 39V23m8 16V23m8 16V23m8 16V23M7 40h34"></path>
                                <path d="M21 8V5h6v3"></path>
                            </svg>
                        </span>
                        <h3>{{ $c('home.specialties.2.title') }}</h3>
                        <p>{{ $c('home.specialties.2.description') }}</p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M6 10h13l5 4 7-4h11v27H29l-6 4-7-4H6V10Z"></path>
                                <path d="M16 11v25m13-22v25"></path>
                                <path d="m20 27 5-10 5 10m-8-3h6"></path>
                            </svg>
                        </span>
                        <h3>{{ $c('home.specialties.3.title') }}</h3>
                        <p>{{ $c('home.specialties.3.description') }}</p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="15" r="6"></circle>
                                <circle cx="10" cy="19" r="4"></circle>
                                <circle cx="38" cy="19" r="4"></circle>
                                <path d="M12 39v-3a12 12 0 0 1 24 0v3H12Z"></path>
                                <path d="M3 37v-2a7 7 0 0 1 9-7m33 9v-2a7 7 0 0 0-9-7"></path>
                            </svg>
                        </span>
                        <h3>{{ $c('home.specialties.4.title') }}</h3>
                        <p>{{ $c('home.specialties.4.description') }}</p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="24" r="17"></circle>
                                <path d="m31 17-4 10-10 4 4-10 10-4Z"></path>
                                <path d="M24 4v4m0 32v4M4 24h4m32 0h4"></path>
                            </svg>
                        </span>
                        <h3>{{ $c('home.specialties.5.title') }}</h3>
                        <p>{{ $c('home.specialties.5.description') }}</p>
                    </article>
                </div>
            </div>
        </section>

        <section
            class="services-page__destinations"
            aria-labelledby="destinations-title"
        >
            <div class="services-page__destinations-heading">
                <p class="ad-index">PILIHAN DESTINASI</p>
                <h2 id="destinations-title">
                    {!! nl2br(e($c('services.destination.title'))) !!}
                </h2>
            </div>

            <div class="services-page__destinations-grid">
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.1.image') }}"
                        alt="{{ $c('services.destination.1.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.1.title') }}</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.2.image') }}"
                        alt="{{ $c('services.destination.2.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.2.title') }}</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.3.image') }}"
                        alt="{{ $c('services.destination.3.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.3.title') }}</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.4.image') }}"
                        alt="{{ $c('services.destination.4.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.4.title') }}</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.5.image') }}"
                        alt="{{ $c('services.destination.5.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.5.title') }}</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="{{ $c('services.destination.6.image') }}"
                        alt="{{ $c('services.destination.6.title') }}"
                        loading="lazy"
                    >
                    <span>{{ $c('services.destination.6.title') }}</span>
                </a>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

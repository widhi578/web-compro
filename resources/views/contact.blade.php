@extends('layouts.app')

@section('title', 'Contact - Travel Indo')

@section('content')
    @php
        $c = $contentValue;
        $mapQuery = rawurlencode($c('contact.map.query'));
    @endphp
    <div class="ad-home contact-page" id="top">
        <section class="contact-page__banner" aria-labelledby="contact-page-title">
            <h1 id="contact-page-title">{{ $c('contact.banner.title') }}</h1>
            <span aria-hidden="true"></span>
        </section>

        <section class="contact-page__content" aria-labelledby="contact-intro-title">
            <div class="shell">
                <div class="contact-page__intro">
                    <p class="ad-index">TRAVEL INDO / INDONESIA</p>
                    <h2 id="contact-intro-title">{{ $c('contact.heading') }}</h2>
                    <p>{{ $c('contact.description') }}</p>
                </div>

                <div class="contact-page__cards">
                    <article class="contact-page__card">
                        <span class="contact-page__card-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="5" width="18" height="14" rx="1"></rect>
                                <path d="m4 7 8 6 8-6"></path>
                            </svg>
                        </span>
                        <h3>Email</h3>
                        <a href="mailto:{{ $c('contact.email') }}">{{ $c('contact.email') }}</a>
                    </article>

                    <article class="contact-page__card">
                        <span class="contact-page__card-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7 3H4.8A1.8 1.8 0 0 0 3 4.8C3 13.7 10.3 21 19.2 21a1.8 1.8 0 0 0 1.8-1.8V17l-4.5-2-2 2a14 14 0 0 1-5.7-5.7l2-2L9 4.8 7 3Z"></path>
                            </svg>
                        </span>
                        <h3>Telepon / WhatsApp</h3>
                        <a href="tel:{{ $c('contact.phone_link') }}">{{ $c('contact.phone') }}</a>
                    </article>

                    <article class="contact-page__card">
                        <span class="contact-page__card-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>
                        </span>
                        <h3>Alamat</h3>
                        <address>{{ $c('contact.address') }}</address>
                    </article>
                </div>

                <section class="contact-page__map-section" aria-labelledby="contact-map-title">
                    <div class="contact-page__map-heading">
                        <p class="ad-index">KUNJUNGI KAMI</p>
                        <h2 id="contact-map-title">{{ $c('contact.map.title') }}</h2>
                        <p>{{ $c('contact.map.query') }}</p>
                    </div>
                    <div class="contact-page__map">
                        <iframe
                            title="Peta lokasi Travel Indo di Cipinang Besar Utara"
                            src="https://maps.google.com/maps?q={{ $mapQuery }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen
                        ></iframe>
                    </div>
                    <a
                        class="contact-page__map-link"
                        href="https://www.google.com/maps/search/?api=1&query={{ $mapQuery }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Buka di Google Maps <span aria-hidden="true">↗</span>
                    </a>
                </section>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

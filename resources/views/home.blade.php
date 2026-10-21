@extends('layouts.app')

@section('title', 'Travel Indo')

@section('content')
    @php
        $c = $contentValue;

        // Format judul CMS: baris pertama jadi judul utama, baris kedua jadi aksen.
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
        {{-- Hero dengan foto yang bisa diganti lewat panel admin. --}}
        <section class="ad-hero" id="top">
            <div class="ad-hero__grain" aria-hidden="true"></div>

            <div
                class="ad-hero__gallery"
                data-hero-gallery
                role="group"
                aria-roledescription="carousel"
                aria-label="Galeri destinasi Travel Indo"
                tabindex="0"
            >
                @foreach (range(1, 3) as $slide)
                    <figure
                        class="ad-hero__slide"
                        data-hero-slide
                        role="group"
                        aria-roledescription="slide"
                        aria-label="{{ $slide }} dari 3"
                    >
                        <img
                            src="{{ $c("home.hero.slide{$slide}.image") }}"
                            alt="{{ $c("home.hero.slide{$slide}.caption") }}"
                            @if ($slide === 1) fetchpriority="high" @else loading="lazy" @endif
                        >
                        <figcaption>{{ $c("home.hero.slide{$slide}.caption") }}</figcaption>
                    </figure>
                @endforeach
            </div>

            <div class="ad-hero__travel-shade"></div>

            <div class="shell ad-hero__inner">
                <p class="ad-overline">{{ $c('home.hero.overline') }}</p>
                <h1>{!! $headline('home.hero.title') !!}</h1>

                <div class="ad-hero__copy ad-rich-copy">
                    {!! \App\Support\RichText::sanitize($c('home.hero.description')) !!}
                </div>

                <div class="ad-hero__actions">
                    <a class="ad-button" href="#perjalanan">
                        Cari perjalanan <span aria-hidden="true">&#8599;</span>
                    </a>
                    <a class="ad-text-link ad-text-link--light" href="{{ route('contact') }}">
                        Rencanakan bersama <span aria-hidden="true">&#8594;</span>
                    </a>
                </div>
            </div>

            <div class="ad-hero__controls" aria-label="Kontrol galeri hero">
                <button type="button" data-hero-previous aria-label="Foto sebelumnya">
                    &#8592;
                </button>

                <div role="group" aria-label="Pilih foto">
                    @foreach (range(0, 2) as $dot)
                        <button
                            type="button"
                            data-hero-dot="{{ $dot }}"
                            aria-label="Tampilkan foto {{ $dot + 1 }}"
                            @if ($dot === 0) aria-current="true" @endif
                        ></button>
                    @endforeach
                </div>

                <button type="button" data-hero-next aria-label="Foto berikutnya">
                    &#8594;
                </button>
            </div>
        </section>

        {{-- Pengenalan singkat Travel Indo. --}}
        <section class="ad-intro" aria-labelledby="intro-title">
            <div class="shell ad-intro__grid">
                <p class="ad-index">01 / {{ $c('home.intro.eyebrow') }}</p>

                <div>
                    <h2 id="intro-title">{!! $headline('home.intro.title') !!}</h2>
                    <div class="ad-rich-copy">
                        {!! \App\Support\RichText::sanitize($c('home.intro.description')) !!}
                    </div>
                    <a class="ad-text-link" href="{{ route('about') }}">
                        {{ $c('home.intro.link') }} <span aria-hidden="true">&#8599;</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- Daftar spesialisasi layanan perjalanan. --}}
        <section class="ad-expertise" id="layanan" aria-labelledby="expertise-title">
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">02 / {{ $c('home.specialties.eyebrow') }}</p>
                    <h2 id="expertise-title">{!! $headline('home.specialties.title') !!}</h2>
                </div>

                <div class="ad-expertise__grid">
                    @foreach ($specialties as $item)
                        <article>
                            <div class="ad-icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none">
                                    @switch($item)
                                        @case(1)
                                            {{-- Pegunungan dan matahari untuk alam. --}}
                                            <path d="m5 36 12-19 8 12 5-8 13 15H5Z" />
                                            <circle cx="34" cy="13" r="4" />
                                            @break
                                        @case(2)
                                            {{-- Gapura untuk budaya dan tradisi lokal. --}}
                                            <path d="M8 39h32M12 39V20h24v19M9 20l15-11 15 11M18 39V26h12v13" />
                                            @break
                                        @case(3)
                                            {{-- Rute yang menghubungkan beberapa titik. --}}
                                            <path d="M9 36c8 0 8-24 16-24s8 24 14 24" />
                                            <circle cx="9" cy="36" r="3" />
                                            <circle cx="25" cy="12" r="3" />
                                            <circle cx="39" cy="36" r="3" />
                                            @break
                                        @case(4)
                                            {{-- Teman perjalanan untuk perjalanan bersama. --}}
                                            <circle cx="17" cy="16" r="6" />
                                            <circle cx="32" cy="18" r="5" />
                                            <path d="M5 39c0-8 5-13 12-13s12 5 12 13M28 28c7-2 14 2 15 9v2H32" />
                                            @break
                                        @default
                                            {{-- Kompas untuk perjalanan yang disusun khusus. --}}
                                            <circle cx="24" cy="24" r="16" />
                                            <path d="m29 19-3 8-8 3 3-8 8-3Z" />
                                    @endswitch
                                </svg>
                            </div>
                            <span>0{{ $item }}</span>
                            <h3>{{ $c("home.specialties.{$item}.title") }}</h3>
                            <div class="ad-rich-copy">
                                {!! \App\Support\RichText::sanitize($c("home.specialties.{$item}.description")) !!}
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Alasan memilih Travel Indo. --}}
        <section class="ad-reasons" aria-labelledby="reasons-title">
            <div class="shell">
                <div class="ad-section-head ad-section-head--light">
                    <p class="ad-index">03 / {{ $c('home.reasons.eyebrow') }}</p>
                    <h2 id="reasons-title">{!! $headline('home.reasons.title') !!}</h2>
                </div>

                <div class="ad-reasons__grid">
                    @foreach ($reasons as $item)
                        <article>
                            <span class="ad-reason-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    @switch($item)
                                        @case(1)
                                            {{-- Percakapan untuk respons dan komunikasi. --}}
                                            <path d="M20 11.5a7.5 7.5 0 0 1-7.5 7.5H6l-3 2v-5.2A7.5 7.5 0 1 1 20 11.5Z" />
                                            <path d="M8 10h8M8 14h5" />
                                            @break
                                        @case(2)
                                            {{-- Jam dan rute untuk jadwal yang masuk akal. --}}
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="M12 7v5l3 2M5 5l2 2M19 5l-2 2" />
                                            @break
                                        @case(3)
                                            {{-- Penanda lokasi untuk sentuhan lokal. --}}
                                            <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z" />
                                            <circle cx="12" cy="10" r="2.5" />
                                            @break
                                        @default
                                            {{-- Kompas untuk pilihan perjalanan yang fleksibel. --}}
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="m15.5 8.5-2.2 4.8-4.8 2.2 2.2-4.8 4.8-2.2Z" />
                                    @endswitch
                                </svg>
                            </span>
                            <h3>{{ $c("home.reasons.{$item}.title") }}</h3>
                            <div class="ad-rich-copy">
                                {!! \App\Support\RichText::sanitize($c("home.reasons.{$item}.description")) !!}
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Paket dan inspirasi perjalanan. --}}
        <section class="ad-products" id="perjalanan" aria-labelledby="products-title">
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">04 / {{ $c('home.trips.eyebrow') }}</p>
                    <h2 id="products-title">{!! $headline('home.trips.title') !!}</h2>
                </div>

                <div class="ad-products__grid ad-products__grid--visual">
                    @foreach ($trips as $item)
                        <a href="{{ route('contact') }}">
                            <img
                                src="{{ $c("home.trips.{$item}.image") }}"
                                alt="{{ $c("home.trips.{$item}.title") }}"
                                loading="lazy"
                            >
                            <span>
                                {{ $c("home.trips.{$item}.title") }}
                                <span aria-hidden="true">&#8599;</span>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Galeri perjalanan terbaru. --}}
        <section class="ad-work" id="galeri" aria-labelledby="work-title">
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">05 / GALERI PERJALANAN</p>
                    <h2 id="work-title">{!! $headline('home.gallery.title') !!}</h2>
                    <a class="ad-text-link" href="{{ route('gallery') }}">
                        Buka galeri penuh <span aria-hidden="true">&#8599;</span>
                    </a>
                </div>

                <div class="ad-work__carousel">
                    <div
                        class="ad-work__mosaic"
                        data-trip-gallery
                        role="region"
                        aria-label="Galeri foto perjalanan Indonesia"
                        tabindex="0"
                    >
                        @foreach ($gallery as $item)
                            <a
                                class="ad-work__item"
                                data-trip-slide
                                href="{{ route('gallery') }}"
                                aria-label="{{ $c("home.gallery.{$item}.title") }}"
                            >
                                <img
                                    src="{{ $c("home.gallery.{$item}.image") }}"
                                    alt="{{ $c("home.gallery.{$item}.title") }}"
                                    loading="lazy"
                                >
                                <span>{{ $c("home.gallery.{$item}.title") }}</span>
                            </a>
                        @endforeach
                    </div>

                    <div class="ad-work__controls" aria-label="Kontrol galeri">
                        <button type="button" data-trip-previous aria-label="Foto sebelumnya">
                            &#8592;
                        </button>
                        <span data-trip-status aria-live="polite">01 / 07</span>
                        <button type="button" data-trip-next aria-label="Foto berikutnya">
                            &#8594;
                        </button>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

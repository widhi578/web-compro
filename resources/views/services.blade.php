@extends('layouts.app')

@section('title', 'Our Services - Travel Indo')

@section('content')
    <div class="ad-home services-page" id="top">
        <section class="services-page__banner" aria-labelledby="services-title">
            <h1 id="services-title">Layanan Kami</h1>
            <span aria-hidden="true"></span>
        </section>

        <section
            class="services-page__specialties"
            aria-labelledby="specialties-title"
        >
            <div class="shell">
                <div class="services-page__heading">
                    <p class="ad-index">LAYANAN TRAVEL INDO</p>
                    <h2 id="specialties-title">Spesialisasi Kami</h2>
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
                        <h3>Alam & petualangan</h3>
                        <p>
                            Jelajahi gunung, pantai, hutan, dan lanskap Indonesia dengan
                            pilihan perjalanan yang sesuai dengan ritme Anda.
                        </p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M5 20 24 8l19 12H5Z"></path>
                                <path d="M10 22h28M12 39V23m8 16V23m8 16V23m8 16V23M7 40h34"></path>
                                <path d="M21 8V5h6v3"></path>
                            </svg>
                        </span>
                        <h3>Budaya & rasa lokal</h3>
                        <p>
                            Temui cerita di balik tradisi, kuliner, pasar, dan keseharian
                            masyarakat setempat.
                        </p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M6 10h13l5 4 7-4h11v27H29l-6 4-7-4H6V10Z"></path>
                                <path d="M16 11v25m13-22v25"></path>
                                <path d="m20 27 5-10 5 10m-8-3h6"></path>
                            </svg>
                        </span>
                        <h3>Rute antarkota</h3>
                        <p>
                            Rangkai beberapa tujuan menjadi rute yang realistis, nyaman,
                            dan tidak terburu-buru.
                        </p>
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
                        <h3>Perjalanan bersama</h3>
                        <p>
                            Rencana perjalanan yang memperhatikan kebutuhan keluarga,
                            teman, maupun rombongan kecil.
                        </p>
                    </article>

                    <article>
                        <span class="services-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="24" r="17"></circle>
                                <path d="m31 17-4 10-10 4 4-10 10-4Z"></path>
                                <path d="M24 4v4m0 32v4M4 24h4m32 0h4"></path>
                            </svg>
                        </span>
                        <h3>Perjalanan khusus</h3>
                        <p>
                            Sesuaikan destinasi, durasi, dan kegiatan dengan minat serta
                            waktu yang Anda miliki.
                        </p>
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
                    Banyak cara untuk<br><i>menjelajahi Indonesia.</i>
                </h2>
            </div>

            <div class="services-page__destinations-grid">
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=85"
                        alt="Pura dan alam hijau di Bali"
                        loading="lazy"
                    >
                    <span>Bali</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85"
                        alt="Candi di Yogyakarta"
                        loading="lazy"
                    >
                    <span>Yogyakarta</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85"
                        alt="Pulau dan perairan Labuan Bajo"
                        loading="lazy"
                    >
                    <span>Labuan Bajo</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85"
                        alt="Kepulauan Raja Ampat"
                        loading="lazy"
                    >
                    <span>Raja Ampat</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85"
                        alt="Pegunungan dan dataran tinggi di Jawa Timur"
                        loading="lazy"
                    >
                    <span>Bromo & dataran tinggi</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=85"
                        alt="Danau dan pegunungan di Sumatra"
                        loading="lazy"
                    >
                    <span>Danau Toba</span>
                </a>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

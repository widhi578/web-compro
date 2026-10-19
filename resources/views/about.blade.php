@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="about-page" id="top">
        <section class="about-hero">
            <div class="shell about-hero__inner">
                <div class="about-hero__copy">
                    <p class="eyebrow"><span></span> About Us</p>
                    <h1>Tentang<br><em>Travel Indo</em></h1>
                    <p>Kenali Travel Indo, lihat layanan perjalanan yang tersedia, dan hubungi kami jika ada yang ingin ditanyakan.</p>
                    <div class="hero__actions">
                        <a class="button button--coral" href="{{ route('services') }}">Lihat layanan <span aria-hidden="true">↗</span></a>
                        <a class="text-link" href="{{ route('contact') }}">Hubungi kami <span aria-hidden="true">↗</span></a>
                    </div>
                </div>
                <div class="about-hero__visual">
                    <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=1200&q=85" alt="Pemandangan alam di Indonesia" fetchpriority="high">
                    <span>Travel Indo · Indonesia</span>
                </div>
            </div>
        </section>

        <section class="about-intro">
            <div class="shell about-intro__inner">
                <div class="about-intro__label">
                    <span>01</span>
                    <p>Tentang kami</p>
                </div>
                <div class="about-intro__copy">
                    <h2>Mulai dari rencana perjalananmu.</h2>
                    <p>Setiap orang punya tujuan dan cara bepergian yang berbeda. Travel Indo menyediakan informasi layanan perjalanan agar kamu bisa melihat pilihan yang tersedia sebelum menghubungi kami.</p>
                </div>
            </div>
        </section>

        <section class="about-details">
            <div class="shell about-details__inner">
                <div class="about-details__heading">
                    <p class="eyebrow eyebrow--light"><span></span> Di website ini</p>
                    <h2>Yang perlu<br><em>kamu ketahui.</em></h2>
                </div>
                <div class="about-details__list">
                    <article>
                        <span>01</span>
                        <div>
                            <h3>Layanan perjalanan</h3>
                            <p style="color: var(--ink);">Lihat pilihan layanan di halaman Our Services.</p>
                        </div>
                        <a href="{{ route('services') }}" aria-label="Lihat Our Services">↗</a>
                    </article>
                    <article>
                        <span>02</span>
                        <div>
                            <h3>Galeri</h3>
                            <p style="color: var(--ink);">Lihat foto perjalanan di halaman Gallery.</p>
                        </div>
                        <a href="{{ route('gallery') }}" aria-label="Lihat Gallery">↗</a>
                    </article>
                    <article>
                        <span>03</span>
                        <div>
                            <h3>Kontak</h3>
                            <p style="color: var(--ink);">Kirim pertanyaan melalui halaman Contact Us.</p>
                        </div>
                        <a href="{{ route('contact') }}" aria-label="Buka Contact Us">↗</a>
                    </article>
                </div>
            </div>
        </section>

        <!-- <section class="about-contact">
            <div class="shell about-contact__inner">
                <div>
                    <p class="eyebrow"><span></span> Ada pertanyaan?</p>
                    <h2>Hubungi Travel Indo.</h2>
                </div>
                <a class="button button--coral" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">↗</span></a>
            </div>
        </section> -->

        <footer class="site-footer" id="kontak">
            <div class="shell site-footer__main">
                <div>
                    <a class="brand brand--footer" href="{{ route('home') }}">
                        <!-- <span class="brand__mark">T</span> -->
                        <span class="brand__name">travel<span>indo</span></span>
                    </a>
                    <p class="site-footer__tagline">Informasi perjalanan bersama Travel Indo.</p>
                </div>
                <div class="site-footer__links">
                    <p class="eyebrow eyebrow--light">Menu</p>
                    <a href="{{ route('about') }}">About Us</a>
                    <a href="{{ route('services') }}">Our Services</a>
                    <a href="{{ route('gallery') }}">Gallery</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('blog') }}">Blog</a>
                </div>
                <div class="site-footer__contact">
                    <p class="eyebrow eyebrow--light">Contact Us</p>
                    <a href="{{ route('contact') }}">Hubungi kami <span aria-hidden="true">↗</span></a>
                    <p>Detail kontak ada di halaman Contact Us.</p>
                </div>
            </div>
            <div class="shell site-footer__bottom">
                <span>&copy; {{ date('Y') }} Travel Indo.</span>
                <a href="#top">Kembali ke atas ↑</a>
            </div>
        </footer>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Gallery - Travel Indo')

@section('content')
    <div class="ad-home gallery-page" id="top">
        <section class="gallery-page__banner" aria-labelledby="gallery-title">
            <h1 id="gallery-title">Galeri Perjalanan</h1>
            <span aria-hidden="true"></span>
        </section>

        <section
            class="gallery-page__content"
            aria-labelledby="gallery-content-title"
        >
            <div class="gallery-page__heading">
                <p class="ad-index">CERITA DALAM PERJALANAN</p>
                <h2 id="gallery-content-title">Galeri Perjalanan</h2>
            </div>

            <div class="gallery-page__grid">
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
                        alt="Candi dan warisan budaya di Yogyakarta"
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
                        alt="Kepulauan tropis di Raja Ampat"
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
                        alt="Danau dan pegunungan di Sumatra Utara"
                        loading="lazy"
                    >
                    <span>Danau Toba</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85"
                        alt="Pantai dan ombak di kepulauan Indonesia"
                        loading="lazy"
                    >
                    <span>Lombok</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=900&q=85"
                        alt="Pantai tropis dengan pasir putih"
                        loading="lazy"
                    >
                    <span>Kepulauan Indonesia</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=900&q=85"
                        alt="Pegunungan dan danau saat pagi"
                        loading="lazy"
                    >
                    <span>Jelajah alam</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=900&q=85"
                        alt="Perjalanan menyusuri danau dan pegunungan"
                        loading="lazy"
                    >
                    <span>Perjalanan antarpulau</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=85"
                        alt="Pemandangan pegunungan di Indonesia"
                        loading="lazy"
                    >
                    <span>Dataran tinggi</span>
                </a>
                <a href="{{ route('contact') }}">
                    <img
                        src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=900&q=85"
                        alt="Pemandangan perjalanan di Indonesia"
                        loading="lazy"
                    >
                    <span>Temukan perjalanan Anda</span>
                </a>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

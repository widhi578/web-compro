@extends('layouts.app')

@section('title', 'About Us - Travel Indo')

@section('content')
    <div class="ad-home about-simple" id="top">
        <section class="about-simple__banner" aria-labelledby="about-title">
            <h1 id="about-title">Tentang Kami</h1>
            <span aria-hidden="true"></span>
        </section>

        <section class="about-simple__content" aria-labelledby="about-heading">
            <div class="shell about-simple__inner">
                <img
                    src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=85"
                    alt="Pura dan alam hijau di Bali"
                    fetchpriority="high"
                >
                <div>
                    <h2 id="about-heading">Travel Indo</h2>
                    <p>
                        Travel Indo membantu Anda merencanakan perjalanan di Indonesia,
                        mulai dari memilih destinasi hingga menyusun rute yang sesuai dengan
                        waktu dan kebutuhan perjalanan.
                    </p>
                    <p>
                        Jelajahi beragam pilihan perjalanan dan ceritakan rencana Anda
                        kepada kami. Kami siap membantu Anda menemukan perjalanan yang tepat.
                    </p>
                    <a class="about-simple__button" href="#konsultasi">
                        Hubungi Kami
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

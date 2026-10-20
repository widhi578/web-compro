@extends('layouts.app')

@section('title', 'Travel Indo')

@section('content')
    <div class="ad-home travel-ad-home">
        {{-- 01. Hero carousel --}}
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
                <figure
                    class="ad-hero__slide"
                    data-hero-slide
                    role="group"
                    aria-roledescription="slide"
                    aria-label="1 dari 3"
                >
                    <img
                        src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=2200&q=90"
                        alt="Pura dan hutan hijau di Bali"
                    >
                    <figcaption>Bali / budaya yang hidup</figcaption>
                </figure>

                <figure
                    class="ad-hero__slide"
                    data-hero-slide
                    role="group"
                    aria-roledescription="slide"
                    aria-label="2 dari 3"
                >
                    <img
                        src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=2200&q=90"
                        alt="Lanskap laut dan pulau di Indonesia"
                    >
                    <figcaption>Kepulauan / laut yang tenang</figcaption>
                </figure>

                <figure
                    class="ad-hero__slide"
                    data-hero-slide
                    role="group"
                    aria-roledescription="slide"
                    aria-label="3 dari 3"
                >
                    <img
                        src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=2200&q=90"
                        alt="Danau dan pegunungan"
                    >
                    <figcaption>Dataran tinggi / pagi yang sejuk</figcaption>
                </figure>
            </div>

            <div class="ad-hero__travel-shade"></div>

            <div class="shell ad-hero__inner">
                <p class="ad-overline">TRAVEL INDO / INDONESIA PILIHAN</p>
                <h1>Indonesia.<br><i>Dengan cara Anda.</i></h1>
                <p class="ad-hero__copy">
                    Perjalanan yang dirancang untuk memberi ruang: melihat lebih dekat,
                    tinggal lebih lama, dan pulang membawa cerita.
                </p>

                <div class="ad-hero__actions">
                    <a class="ad-button" href="#perjalanan">
                        Cari perjalanan
                        <span aria-hidden="true">↗</span>
                    </a>
                    <a class="ad-text-link ad-text-link--light" href="{{ route('contact') }}">
                        Rencanakan bersama
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

                <div class="ad-hero__points">
                    <span>Rute personal</span>
                    <span>Pengalaman lokal</span>
                    <span>Untuk sendiri atau bersama</span>
                </div>
            </div>

            <!-- <div class="ad-hero__tag">Geser untuk melihat<br><b>destinasi lain</b></div> -->
            <div class="ad-hero__controls" aria-label="Kontrol galeri hero">
                <button type="button" data-hero-previous aria-label="Foto sebelumnya">←</button>

                <div role="group" aria-label="Pilih foto">
                    <button
                        type="button"
                        data-hero-dot="0"
                        aria-label="Tampilkan foto 1"
                        aria-current="true"
                    ></button>
                    <button
                        type="button"
                        data-hero-dot="1"
                        aria-label="Tampilkan foto 2"
                    ></button>
                    <button
                        type="button"
                        data-hero-dot="2"
                        aria-label="Tampilkan foto 3"
                    ></button>
                </div>

                <button type="button" data-hero-next aria-label="Foto berikutnya">→</button>
            </div>
        </section>

        {{-- 02. About --}}
        <section class="ad-intro" aria-labelledby="intro-title">
            <div class="shell ad-intro__grid">
                <p class="ad-index">TENTANG KAMI</p>

                <div>
                    <h2 id="intro-title">
                        Bukan hanya sampai.<br>Tapi <i>benar-benar hadir.</i>
                    </h2>
                    <p>
                        Travel Indo membantu menyusun perjalanan di Indonesia dari awal hingga
                        akhir. Kami memadukan rute yang realistis, tempat yang berkarakter, dan
                        waktu yang cukup untuk menikmati setiap persinggahan.
                    </p>
                    <a class="ad-text-link" href="{{ route('about') }}">
                        Kenal Travel Indo
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- 03. Expertise --}}
        <section
            class="ad-expertise"
            id="layanan"
            aria-labelledby="expertise-title"
        >
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">SPESIALISASI</p>
                    <h2 id="expertise-title">
                        Satu Indonesia.<br><i>Banyak cara menjalaninya.</i>
                    </h2>
                </div>

                <div class="ad-expertise__grid">
                    <article>
                        <div class="ad-icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="35" cy="12" r="5"></circle>
                                <path d="m4 38 13-22 8 13 5-8 14 17H4Z"></path>
                                <path d="M17 16 13 23m12 6 5-8M8 38h35"></path>
                            </svg>
                        </div>
                        <span>01</span>
                        <h3>Alam & petualangan</h3>
                        <p>
                            Jalur hijau, laut terbuka, gunung, dan perjalanan untuk bergerak
                            sedikit lebih jauh.
                        </p>
                    </article>

                    <article>
                        <div class="ad-icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M6 20 24 8l18 12H6Z"></path>
                                <path d="M10 22h28M12 39V23m8 16V23m8 16V23m8 16V23M7 40h34"></path>
                                <path d="M21 8V5h6v3"></path>
                            </svg>
                        </div>
                        <span>02</span>
                        <h3>Budaya & rasa lokal</h3>
                        <p>
                            Temui cerita di balik kota, tradisi, pasar, dapur, dan kehidupan
                            sehari-hari.
                        </p>
                    </article>

                    <article>
                        <div class="ad-icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path d="M7 10h13l5 4h16v25H7V10Z"></path>
                                <path d="m18 34 6-12 6 8 4-5 5 9"></path>
                                <circle cx="18" cy="19" r="2"></circle>
                            </svg>
                        </div>
                        <span>03</span>
                        <h3>Rute antarkota</h3>
                        <p>
                            Itinerary yang menyambungkan tempat-tempat menarik tanpa melelahkan
                            di jalan.
                        </p>
                    </article>

                    <article>
                        <div class="ad-icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="15" r="6"></circle>
                                <circle cx="10" cy="19" r="4"></circle>
                                <circle cx="38" cy="19" r="4"></circle>
                                <path d="M12 39v-3a12 12 0 0 1 24 0v3H12Z"></path>
                                <path d="M3 37v-2a7 7 0 0 1 9-7m33 9v-2a7 7 0 0 0-9-7"></path>
                            </svg>
                        </div>
                        <span>04</span>
                        <h3>Perjalanan bersama</h3>
                        <p>
                            Rencana nyaman untuk keluarga, teman dekat, kantor, atau grup kecil
                            Anda.
                        </p>
                    </article>

                    <article>
                        <div class="ad-icon" aria-hidden="true">
                            <svg viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="24" r="17"></circle>
                                <path d="m31 17-4 10-10 4 4-10 10-4Z"></path>
                                <path d="M24 4v4m0 32v4M4 24h4m32 0h4"></path>
                            </svg>
                        </div>
                        <span>05</span>
                        <h3>Perjalanan khusus</h3>
                        <p>
                            Susun perjalanan dari nol sesuai minat, hari yang tersedia, dan
                            ritme Anda sendiri.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- 04. Reasons --}}
        <section class="ad-reasons" aria-labelledby="reasons-title">
            <div class="shell">
                <div class="ad-section-head ad-section-head--light">
                    <p class="ad-index">MENGAPA KAMI</p>
                    <h2 id="reasons-title">
                        Detail yang diurus,<br><i>supaya Anda bisa hadir.</i>
                    </h2>
                </div>

                <div class="ad-reasons__grid">
                    <article>
                        <span class="ad-reason-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M4 5h16v12H9l-5 4V5Z"></path>
                                <path d="M8 9h8M8 13h5"></path>
                            </svg>
                        </span>
                        <h3>Respon yang jelas</h3>
                        <p>
                            Mulai dari pertanyaan awal, kami bantu menjawab kebutuhan perjalanan
                            secara ringkas dan terbuka.
                        </p>
                    </article>
                    <article>
                        <span class="ad-reason-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m3 7 6-3 6 3 6-3v13l-6 3-6-3-6 3V7Z"></path>
                                <path d="M9 4v13m6-10v13"></path>
                                <path d="M12 8c0-2 2-3 4-3 0 3-1 5-4 5m0-2c-2-2-4-1-5 0 1 2 3 3 5 2"></path>
                            </svg>
                        </span>
                        <h3>Rute yang masuk akal</h3>
                        <p>
                            Jadwal disusun dengan waktu tempuh yang manusiawi, bukan sekadar
                            mengejar banyak titik.
                        </p>
                    </article>
                    <article>
                        <span class="ad-reason-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M3 10h18M5 10l7-6 7 6M5 19h14M7 10v9m5-9v9m5-9v9"></path>
                                <path d="M12 4V2"></path>
                            </svg>
                        </span>
                        <h3>Sentuhan lokal</h3>
                        <p>
                            Rekomendasi pengalaman dikurasi agar perjalanan terasa dekat dengan
                            tempat yang dikunjungi.
                        </p>
                    </article>
                    <article>
                        <span class="ad-reason-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                                <path d="M4.5 5.5 3 4m18 0-1.5 1.5"></path>
                            </svg>
                        </span>
                        <h3>Ruang untuk fleksibel</h3>
                        <p>
                            Perjalanan yang baik selalu menyisakan waktu untuk menemukan hal
                            yang tak direncanakan.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- 05. Trips --}}
        <section
            class="ad-products"
            id="perjalanan"
            aria-labelledby="products-title"
        >
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">PILIHAN PERJALANAN</p>
                    <h2 id="products-title">
                        Mulai dari<br><i>yang memanggil Anda.</i>
                    </h2>
                    <!-- <p class="ad-section-note">
                        Pilih satu ide perjalanan, lalu kami bantu menyesuaikannya dengan waktu
                        dan orang-orang yang ikut.
                    </p> -->
                </div>

                <div class="ad-products__grid">
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Bali yang lebih sunyi <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Jelajah Jogja <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Bandung & dataran tinggi <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Lombok pesisir <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Labuan Bajo <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Raja Ampat <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Bromo & sekitarnya <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Danau Toba <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Makassar & Toraja <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>City escape <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Perjalanan keluarga <span aria-hidden="true">↗</span></span>
                    </a>
                    <a href="{{ route('contact') }}">
                        <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
                        <span>Rute custom <span aria-hidden="true">↗</span></span>
                    </a>
                </div>
            </div>
        </section>

        {{-- 06. Gallery --}}
        <section class="ad-work" id="galeri" aria-labelledby="work-title">
            <div class="shell">
                <div class="ad-section-head">
                    <p class="ad-index">GALERI PERJALANAN</p>
                    <h2 id="work-title">
                        Indonesia yang<br><i>ingin Anda lihat lagi.</i>
                    </h2>
                    <a class="ad-text-link" href="{{ route('gallery') }}">
                        Buka galeri penuh
                        <span aria-hidden="true">↗</span>
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
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Bali, budaya dan alam"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1300&q=85"
                                alt="Pura di tengah lanskap hijau Bali"
                                loading="lazy"
                            >
                            <span>BALI / BUDAYA & ALAM</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Yogyakarta dan Candi Borobudur"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85"
                                alt="Candi dan warisan budaya di Yogyakarta"
                                loading="lazy"
                            >
                            <span>YOGYAKARTA / WARISAN BUDAYA</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Labuan Bajo dan kepulauan Komodo"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85"
                                alt="Pulau dan laut tropis di Labuan Bajo"
                                loading="lazy"
                            >
                            <span>LABUAN BAJO / KEPULAUAN KOMODO</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Raja Ampat dan laut tropis"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85"
                                alt="Kepulauan tropis dan laut biru Raja Ampat"
                                loading="lazy"
                            >
                            <span>RAJA AMPAT / LAUT TERBUKA</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Gunung Bromo dan dataran tinggi"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85"
                                alt="Pegunungan dan dataran tinggi di Jawa Timur"
                                loading="lazy"
                            >
                            <span>BROMO / DATARAN TINGGI</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Danau Toba dan Sumatra Utara"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=85"
                                alt="Danau dan pegunungan di Sumatra Utara"
                                loading="lazy"
                            >
                            <span>DANAU TOBA / SUMATRA UTARA</span>
                        </a>
                        <a
                            class="ad-work__item"
                            data-trip-slide
                            href="{{ route('gallery') }}"
                            aria-label="Pantai dan kepulauan Lombok"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85"
                                alt="Pantai dan ombak di kepulauan Indonesia"
                                loading="lazy"
                            >
                            <span>LOMBOK / PESISIR</span>
                        </a>
                    </div>

                    <div class="ad-work__controls" aria-label="Kontrol galeri">
                        <button type="button" data-trip-previous aria-label="Foto sebelumnya">
                            ←
                        </button>
                        <span data-trip-status aria-live="polite">01 / 07</span>
                        <button type="button" data-trip-next aria-label="Foto berikutnya">
                            →
                        </button>
                    </div>
                </div>

                <div class="ad-client-strip" aria-label="Jenis perjalanan">
                    <span>Solo trip</span>
                    <span>Keluarga</span>
                    <span>Teman dekat</span>
                    <span>Honeymoon</span>
                    <span>Corporate trip</span>
                    <span>Custom journey</span>
                </div>
            </div>
        </section>

        @include('partials.contact-footer')
    </div>
@endsection

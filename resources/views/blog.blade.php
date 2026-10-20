@extends('layouts.app')

@section('title', 'Blog - Travel Indo')

@section('content')
    @php
        $blogCategories = [
            [
                'id' => 'alam-petualangan',
                'title' => 'Alam & Petualangan',
                'url' => route('blog.nature'),
                'articles' => [
                    [
                        'title' => 'Persiapan sederhana untuk menikmati Bromo',
                        'image' => 'photo-1464822759023-fed622ff2c3b',
                        'alt' => 'Pegunungan dan lanskap dataran tinggi',
                        'excerpt' => 'Waktu berangkat, pakaian hangat, dan beberapa hal kecil yang membuat perjalanan ke dataran tinggi terasa lebih nyaman.',
                        'content' => 'Suhu di kawasan tinggi bisa terasa dingin, terutama pada pagi hari. Bawa lapisan pakaian, alas kaki yang nyaman, air minum, dan pelindung dari matahari. Periksa kondisi rute serta aturan kawasan sebelum pergi.',
                        'reading_time' => '4 menit baca',
                    ],
                    [
                        'title' => 'Menjelajah Raja Ampat dengan lebih bertanggung jawab',
                        'image' => 'photo-1518509562904-e7ef99cdcc86',
                        'alt' => 'Kepulauan tropis dan perairan biru',
                        'excerpt' => 'Cara sederhana menikmati alam sambil menghormati lingkungan dan masyarakat setempat.',
                        'content' => 'Gunakan pemandu lokal, bawa kembali sampah, hindari menyentuh biota laut, dan ikuti petunjuk saat snorkeling. Perjalanan yang bertanggung jawab membantu menjaga tempat yang kita nikmati.',
                        'reading_time' => '5 menit baca',
                    ],
                ],
            ],
            [
                'id' => 'budaya-lokal',
                'title' => 'Budaya & Rasa Lokal',
                'url' => route('blog.culture'),
                'articles' => [
                    [
                        'title' => 'Yogyakarta: ruang untuk budaya dan kuliner',
                        'image' => 'photo-1596402184320-417e7178b2cd',
                        'alt' => 'Candi dan warisan budaya di Yogyakarta',
                        'excerpt' => 'Rangkai kawasan bersejarah, ruang seni, dan tempat makan lokal dalam ritme perjalanan yang santai.',
                        'content' => 'Kelompokkan tempat yang ingin dikunjungi berdasarkan area. Sisakan waktu tanpa agenda untuk menjelajah gang, melihat pertunjukan, atau menemukan hidangan yang menarik perhatian.',
                        'reading_time' => '4 menit baca',
                    ],
                    [
                        'title' => 'Melihat sisi Bali lewat tradisi dan kehidupan desa',
                        'image' => 'photo-1537996194471-e657df975ab4',
                        'alt' => 'Pura dan lanskap hijau di Bali',
                        'excerpt' => 'Selain pantai, kenali suasana desa, karya lokal, dan tradisi yang menjadi bagian dari keseharian Bali.',
                        'content' => 'Saat mengunjungi tempat ibadah atau mengikuti kegiatan lokal, perhatikan aturan berpakaian dan arahan warga setempat. Memilih pemandu lokal bisa membantu memahami cerita di balik tempat yang dikunjungi.',
                        'reading_time' => '5 menit baca',
                    ],
                ],
            ],
            [
                'id' => 'tips-perjalanan',
                'title' => 'Tips Perjalanan',
                'url' => route('blog.tips'),
                'articles' => [
                    [
                        'title' => 'Menyusun rute perjalanan agar tidak habis di jalan',
                        'image' => 'photo-1470770841072-f978cf4d019e',
                        'alt' => 'Pemandangan alam dan jalan di antara perbukitan',
                        'excerpt' => 'Mulai dari jarak dan waktu tempuh untuk merangkai beberapa tujuan dengan lebih realistis.',
                        'content' => 'Kelompokkan destinasi yang berdekatan, perhitungkan waktu istirahat, dan sisakan jeda antarperpindahan. Periksa pilihan transportasi serta kondisi perjalanan sebelum menetapkan agenda.',
                        'reading_time' => '3 menit baca',
                    ],
                    [
                        'title' => 'Ide perjalanan beberapa hari di Bali dan sekitarnya',
                        'image' => 'photo-1500375592092-40eb2168fd21',
                        'alt' => 'Pantai tropis dan ombak di Indonesia',
                        'excerpt' => 'Pilih area sebagai titik awal, lalu atur perjalanan harian berdasarkan jarak dan hal yang ingin dinikmati.',
                        'content' => 'Daripada berpindah penginapan setiap hari, pertimbangkan untuk tinggal beberapa malam di satu area. Cara ini memberi lebih banyak waktu menikmati tujuan tanpa terburu-buru mengejar jadwal.',
                        'reading_time' => '4 menit baca',
                    ],
                    [
                        'title' => 'Membuat rencana liburan keluarga yang nyaman',
                        'image' => 'photo-1476514525535-07fb3b4ae5f1',
                        'alt' => 'Danau dan pegunungan sebagai suasana perjalanan bersama',
                        'excerpt' => 'Atur agenda, waktu istirahat, dan pilihan aktivitas agar setiap anggota keluarga bisa menikmati perjalanan.',
                        'content' => 'Libatkan anggota keluarga saat memilih aktivitas, siapkan waktu jeda, dan pastikan akses transportasi serta fasilitas sesuai kebutuhan. Agenda yang tidak terlalu padat biasanya lebih mudah dinikmati bersama.',
                        'reading_time' => '4 menit baca',
                    ],
                    [
                        'title' => 'Tips mengatur perjalanan bersama teman',
                        'image' => 'photo-1519046904884-53103b34b206',
                        'alt' => 'Pantai tropis untuk perjalanan bersama teman',
                        'excerpt' => 'Samakan ekspektasi sejak awal dengan membahas durasi, anggaran, dan kegiatan yang ingin dilakukan.',
                        'content' => 'Buat daftar prioritas bersama dan sepakati hal penting sebelum memesan kebutuhan perjalanan. Sisakan waktu bebas agar setiap orang tetap punya ruang untuk menikmati liburan dengan caranya.',
                        'reading_time' => '3 menit baca',
                    ],
                    [
                        'title' => 'Merencanakan perjalanan laut ke Labuan Bajo',
                        'image' => 'photo-1516690561799-46d8f74f9abf',
                        'alt' => 'Pulau-pulau dan perairan di kawasan Labuan Bajo',
                        'excerpt' => 'Hal yang patut ditanyakan sebelum berlayar: rute, durasi, fasilitas, dan ketentuan keselamatan.',
                        'content' => 'Tentukan lama perjalanan dan jenis pengalaman yang diinginkan. Tanyakan fasilitas kapal, perlengkapan keselamatan, serta apa saja yang termasuk. Cuaca bisa memengaruhi rencana di laut, jadi siapkan waktu yang fleksibel.',
                        'reading_time' => '5 menit baca',
                    ],
                    [
                        'title' => 'Lombok untuk perjalanan dengan tempo lebih tenang',
                        'image' => 'photo-1501785888041-af3ef285b470',
                        'alt' => 'Danau dan pegunungan di Indonesia',
                        'excerpt' => 'Padukan waktu di alam dan pantai dengan agenda yang disesuaikan minat serta ritme perjalanan.',
                        'content' => 'Pilih area menginap yang sesuai dengan aktivitas utama dan atur perjalanan harian agar tidak terlalu jauh. Periksa kondisi jalan serta transportasi setempat, dan berikan ruang untuk menyesuaikan rencana.',
                        'reading_time' => '4 menit baca',
                    ],
                ],
            ],
        ];
    @endphp

    <div class="ad-home blog-page" id="top">
        <section class="blog-page__banner" aria-labelledby="blog-title">
            <p class="ad-index">CERITA DARI INDONESIA</p>
            <h1 id="blog-title">Jelajahi cerita dan inspirasi perjalanan.</h1>
            <p>
                Artikel singkat seputar destinasi, budaya, dan tips untuk membantu
                merencanakan perjalanan Anda.
            </p>
        </section>

        <div class="blog-page__content">
            <div class="blog-page__heading">
                <div>
                    <p class="ad-index">KATEGORI ARTIKEL</p>
                    <h2>Cerita perjalanan</h2>
                </div>
                <!-- <p>Pilih kategori dari menu Our Services atau jelajahi semua artikel di sini.</p> -->
            </div>

            @foreach ($blogCategories as $category)
                <section
                    class="blog-page__category"
                    id="{{ $category['id'] }}"
                    aria-labelledby="{{ $category['id'] }}-title"
                >
                    <div class="blog-page__category-heading">
                        <h2 id="{{ $category['id'] }}-title">
                            <a href="{{ $category['url'] }}">{{ $category['title'] }}</a>
                        </h2>
                        <a href="{{ $category['url'] }}">Buka halaman kategori <span aria-hidden="true">↗</span></a>
                    </div>

                    <div class="blog-page__grid">
                        @foreach ($category['articles'] as $article)
                            <article class="blog-card">
                                <div class="blog-card__image">
                                    <img
                                        src="https://images.unsplash.com/{{ $article['image'] }}?auto=format&fit=crop&w=1000&q=85"
                                        alt="{{ $article['alt'] }}"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="blog-card__body">
                                    <div class="blog-card__meta">
                                        <span>{{ $category['title'] }}</span>
                                        <span>{{ $article['reading_time'] }}</span>
                                    </div>
                                    <h3>{{ $article['title'] }}</h3>
                                    <p>{{ $article['excerpt'] }}</p>
                                    <details class="blog-card__more">
                                        <summary>Baca selengkapnya <span aria-hidden="true">↗</span></summary>
                                        <p>{{ $article['content'] }}</p>
                                    </details>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>

        @include('partials.contact-footer')
    </div>
@endsection

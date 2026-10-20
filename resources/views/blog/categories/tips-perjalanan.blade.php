@extends('layouts.app')

@section('title', 'Tips Perjalanan — Travel Indo')

@section('content')
    @php
        $category = [
            'title' => 'Tips Perjalanan',
            'eyebrow' => 'RENCANA LEBIH SIAP, JALAN LEBIH NYAMAN',
            'intro' => 'Panduan praktis untuk menyusun rute, mengatur waktu, dan mempersiapkan kebutuhan sebelum menjelajahi destinasi pilihan.',
            'reading_time' => '4 menit baca',
            'article_title' => 'Menyusun rute perjalanan agar tidak habis di jalan',
            'lead' => 'Rencana perjalanan yang menyenangkan tidak harus dipenuhi banyak tujuan. Dengan menyusun urutan tempat secara masuk akal, Anda dapat mengurangi waktu berpindah dan punya lebih banyak kesempatan menikmati setiap destinasi.',
            'image' => 'photo-1470770841072-f978cf4d019e',
            'image_alt' => 'Pemandangan alam dan jalan di antara perbukitan',
            'image_caption' => 'Perhitungkan waktu tempuh dan jarak sebelum menyusun agenda harian.',
            'paragraphs' => [
                'Mulailah dengan memilih beberapa hal yang paling ingin dilakukan. Tandai lokasi pada peta, kelompokkan tempat yang berdekatan, lalu perkirakan waktu perjalanan di antara lokasi tersebut. Jarak yang tampak dekat belum tentu berarti waktu tempuhnya singkat.',
                'Sisakan jeda untuk makan, beristirahat, dan menghadapi perubahan kondisi. Jika perjalanan melibatkan beberapa kota atau pulau, cek jadwal transportasi dan beri jarak waktu yang cukup antara kedatangan dengan agenda berikutnya.',
                'Sebelum berangkat, simpan alamat penginapan, tiket, dan kontak penting di tempat yang mudah ditemukan. Beri tahu anggota perjalanan tentang rencana utama, tetapi tetap terbuka untuk menyesuaikan agenda bila cuaca atau kondisi lokal berubah.',
            ],
            'section_title' => 'Checklist singkat sebelum berangkat',
            'section_intro' => 'Beberapa langkah sederhana ini membantu perjalanan lebih terorganisir tanpa membuat persiapannya rumit:',
            'tips' => [
                'Tentukan prioritas destinasi dan susun berdasarkan lokasi.',
                'Periksa jadwal transportasi, jam buka, dan kebutuhan reservasi.',
                'Siapkan dokumen, obat pribadi, uang tunai secukupnya, serta salinan digital.',
                'Buat rencana alternatif dan bagikan informasi penting kepada teman perjalanan.',
            ],
            'closing' => 'Rencana yang baik memberi arah, bukan membatasi. Sisakan ruang untuk beristirahat dan menikmati hal-hal menarik yang ditemukan di sepanjang perjalanan.',
            'related' => [
                [
                    'label' => 'LIBURAN BERSAMA',
                    'title' => 'Membuat rencana liburan keluarga yang nyaman',
                    'excerpt' => 'Atur agenda dan waktu jeda agar setiap anggota keluarga dapat menikmati perjalanan.',
                    'image' => 'photo-1476514525535-07fb3b4ae5f1',
                    'alt' => 'Danau dan pegunungan untuk perjalanan bersama',
                ],
                [
                    'label' => 'PERJALANAN LAUT',
                    'title' => 'Hal yang perlu ditanyakan sebelum berlayar ke Labuan Bajo',
                    'excerpt' => 'Cek rute, durasi, fasilitas, dan perlengkapan keselamatan sebelum memilih perjalanan.',
                    'image' => 'photo-1516690561799-46d8f74f9abf',
                    'alt' => 'Pulau-pulau dan perairan di Labuan Bajo',
                ],
            ],
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

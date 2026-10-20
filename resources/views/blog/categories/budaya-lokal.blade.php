@extends('layouts.app')

@section('title', 'Budaya & Rasa Lokal — Travel Indo')

@section('content')
    @php
        $category = [
            'title' => 'Budaya & Rasa Lokal',
            'eyebrow' => 'KENALI CERITA SETEMPAT',
            'intro' => 'Temukan kisah tradisi, kuliner, karya, dan kehidupan sehari-hari yang membuat setiap daerah di Indonesia punya warna tersendiri.',
            'reading_time' => '5 menit baca',
            'article_title' => 'Perjalanan yang lebih dekat dengan budaya lokal',
            'lead' => 'Mengunjungi sebuah daerah bukan hanya tentang melihat tempat terkenal. Berkenalan dengan kebiasaan, rasa, dan cerita masyarakat setempat dapat membuat perjalanan terasa lebih bermakna.',
            'image' => 'photo-1596402184320-417e7178b2cd',
            'image_alt' => 'Candi dan warisan budaya di Yogyakarta',
            'image_caption' => 'Warisan budaya menjadi bagian penting dari cerita sebuah tempat.',
            'paragraphs' => [
                'Di Yogyakarta, misalnya, perjalanan dapat diisi dengan kunjungan ke kawasan bersejarah, ruang seni, pasar, dan tempat makan lokal. Atur tujuan berdasarkan area agar ada waktu untuk menikmati suasana, bukan hanya berpindah dari satu titik ke titik lain.',
                'Setiap daerah memiliki aturan dan kebiasaan yang patut dihormati. Saat mengunjungi tempat ibadah atau mengikuti kegiatan lokal, perhatikan petunjuk, berpakaian dengan pantas, dan tanyakan terlebih dahulu sebelum mengambil foto orang atau kegiatan tertentu.',
                'Kuliner juga dapat menjadi cara untuk mengenal sebuah daerah. Cobalah hidangan khas dari penjual lokal, tanyakan bahan atau cara menikmatinya, dan tetap terbuka pada rasa yang mungkin baru bagi Anda.',
            ],
            'section_title' => 'Menjadi tamu yang menghargai tuan rumah',
            'section_intro' => 'Sikap sederhana membantu menjaga pengalaman yang baik bagi wisatawan dan masyarakat setempat:',
            'tips' => [
                'Pelajari aturan dasar dan etika di tempat yang akan dikunjungi.',
                'Minta izin sebelum memotret warga, ruang privat, atau kegiatan adat.',
                'Dukung usaha lokal dengan membeli produk dan menggunakan jasa setempat.',
                'Jaga kebersihan dan hormati ruang bersama selama berada di destinasi.',
            ],
            'closing' => 'Datang dengan rasa ingin tahu dan sikap menghargai akan membuka ruang untuk pengalaman yang lebih tulus, sekaligus mendukung keberlanjutan budaya lokal.',
            'related' => [
                [
                    'label' => 'YOGYAKARTA',
                    'title' => 'Menyusuri budaya dan kuliner Yogyakarta',
                    'excerpt' => 'Rangkai kawasan bersejarah, ruang seni, dan tempat makan lokal dengan ritme santai.',
                    'image' => 'photo-1596402184320-417e7178b2cd',
                    'alt' => 'Bangunan candi di kawasan Yogyakarta',
                ],
                [
                    'label' => 'BALI',
                    'title' => 'Melihat sisi Bali lewat tradisi dan kehidupan desa',
                    'excerpt' => 'Selain pantai, kenali cerita desa, karya lokal, dan tradisi sehari-hari.',
                    'image' => 'photo-1537996194471-e657df975ab4',
                    'alt' => 'Pura dan lanskap hijau di Bali',
                ],
            ],
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

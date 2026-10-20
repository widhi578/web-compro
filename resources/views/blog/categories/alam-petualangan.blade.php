@extends('layouts.app')

@section('title', 'Alam & Petualangan — Travel Indo')

@section('content')
    @php
        $category = [
            'title' => 'Alam & Petualangan',
            'eyebrow' => 'JELAJAHI ALAM INDONESIA',
            'intro' => 'Cerita dan panduan untuk menikmati gunung, laut, pulau, serta lanskap alam Indonesia dengan persiapan yang lebih baik.',
            'reading_time' => '5 menit baca',
            'article_title' => 'Menikmati alam Indonesia dengan persiapan yang matang',
            'lead' => 'Perjalanan ke alam terbuka menawarkan pengalaman yang berbeda dari rutinitas. Agar momen tetap menyenangkan, persiapkan perjalanan dengan mempertimbangkan kondisi destinasi, kemampuan diri, dan dampak kita terhadap lingkungan.',
            'image' => 'photo-1464822759023-fed622ff2c3b',
            'image_alt' => 'Pegunungan dan lanskap dataran tinggi Indonesia',
            'image_caption' => 'Kenali kondisi alam dan jalur perjalanan sebelum memulai petualangan.',
            'paragraphs' => [
                'Indonesia memiliki banyak pilihan perjalanan alam, mulai dari mendaki dataran tinggi, menjelajahi pantai, hingga mengunjungi pulau-pulau terpencil. Setiap tempat memiliki karakter, cuaca, jalur, dan kebutuhan perlengkapan yang berbeda.',
                'Cari tahu kondisi tujuan sebelum berangkat. Untuk perjalanan ke kawasan pegunungan, periksa cuaca dan jalur serta siapkan pakaian berlapis. Untuk perjalanan laut, tanyakan kondisi perairan, perlengkapan keselamatan, dan rencana perjalanan kepada operator.',
                'Perjalanan yang baik juga memperhatikan tempat yang dikunjungi. Ikuti aturan pengelola, gunakan jasa pemandu lokal bila diperlukan, dan bawa kembali sampah agar alam tetap nyaman dinikmati bersama.',
            ],
            'section_title' => 'Persiapan kecil yang membuat perjalanan lebih nyaman',
            'section_intro' => 'Tidak harus membawa banyak barang. Utamakan perlengkapan yang sesuai dengan aktivitas dan kondisi tujuan:',
            'tips' => [
                'Periksa prakiraan cuaca, jam operasional, dan ketentuan terbaru destinasi.',
                'Pilih alas kaki serta pakaian yang sesuai dengan medan dan durasi perjalanan.',
                'Bawa air minum, obat pribadi, pelindung matahari, dan perlengkapan darurat dasar.',
                'Hormati alam, satwa, budaya setempat, serta arahan pemandu dan pengelola.',
            ],
            'closing' => 'Dengan rencana yang realistis, kita bisa menikmati perjalanan tanpa terburu-buru sekaligus lebih siap menghadapi perubahan kondisi di lapangan.',
            'related' => [
                [
                    'label' => 'PULAU & LAUT',
                    'title' => 'Menjelajah Raja Ampat dengan lebih bertanggung jawab',
                    'excerpt' => 'Kebiasaan sederhana untuk menjaga laut dan mendukung masyarakat lokal selama perjalanan.',
                    'image' => 'photo-1518509562904-e7ef99cdcc86',
                    'alt' => 'Pulau-pulau tropis dan laut biru di Indonesia',
                ],
                [
                    'label' => 'DATARAN TINGGI',
                    'title' => 'Persiapan sederhana untuk menikmati Bromo',
                    'excerpt' => 'Waktu berangkat, pakaian hangat, dan hal yang perlu diperiksa sebelum berkunjung.',
                    'image' => 'photo-1500530855697-b586d89ba3ee',
                    'alt' => 'Lanskap perbukitan dan dataran tinggi',
                ],
            ],
        ];
    @endphp

    @include('partials.blog-category', ['category' => $category])
@endsection

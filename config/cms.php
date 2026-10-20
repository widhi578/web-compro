<?php

$pages = [
    'home' => ['label' => 'Beranda', 'groups' => []],
    'about' => ['label' => 'Tentang Kami', 'groups' => []],
    'services' => ['label' => 'Layanan', 'groups' => []],
    'gallery' => ['label' => 'Galeri', 'groups' => []],
    'contact' => ['label' => 'Kontak', 'groups' => []],
    'blog' => ['label' => 'Blog', 'groups' => []],
    'shared' => ['label' => 'Footer & Kontak Umum', 'groups' => []],
    'nature' => ['label' => 'Kategori: Alam & Petualangan', 'groups' => []],
    'culture' => ['label' => 'Kategori: Budaya & Rasa Lokal', 'groups' => []],
    'tips' => ['label' => 'Kategori: Tips Perjalanan', 'groups' => []],
];

$defaults = [];
$addFields = static function (string $page, array $groups) use (&$pages, &$defaults): void {
    foreach ($groups as $group => $fields) {
        foreach ($fields as [$key, $label, $type, $value]) {
            $defaults[$key] = $value;
            $pages[$page]['groups'][$group]['label'] = $group;
            $pages[$page]['groups'][$group]['fields'][] = compact('key', 'label', 'type');
        }
    }
};

$addFields('home', [
    'Hero' => [
        ['home.hero.overline', 'Teks kecil di atas judul', 'text', 'TRAVEL INDO / INDONESIA PILIHAN'],
        ['home.hero.title', 'Judul utama', 'textarea', "Indonesia.\nDengan cara Anda."],
        ['home.hero.description', 'Deskripsi utama', 'textarea', 'Perjalanan yang dirancang untuk memberi ruang: melihat lebih dekat, tinggal lebih lama, dan pulang membawa cerita.'],
        ['home.hero.slide1.image', 'Foto hero 1', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=2200&q=90'],
        ['home.hero.slide1.caption', 'Keterangan foto 1', 'text', 'Bali / budaya yang hidup'],
        ['home.hero.slide2.image', 'Foto hero 2', 'image', 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=2200&q=90'],
        ['home.hero.slide2.caption', 'Keterangan foto 2', 'text', 'Kepulauan / laut yang tenang'],
        ['home.hero.slide3.image', 'Foto hero 3', 'image', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=2200&q=90'],
        ['home.hero.slide3.caption', 'Keterangan foto 3', 'text', 'Dataran tinggi / pagi yang sejuk'],
    ],
    'Tentang Kami' => [
        ['home.intro.eyebrow', 'Label bagian', 'text', 'TENTANG KAMI'],
        ['home.intro.title', 'Judul bagian', 'textarea', "Bukan hanya sampai.\nTapi benar-benar hadir."],
        ['home.intro.description', 'Deskripsi bagian', 'textarea', 'Travel Indo membantu menyusun perjalanan di Indonesia dari awal hingga akhir. Kami memadukan rute yang realistis, tempat yang berkarakter, dan waktu yang cukup untuk menikmati setiap persinggahan.'],
        ['home.intro.link', 'Teks tautan', 'text', 'Kenal Travel Indo'],
    ],
    'Spesialisasi' => [
        ['home.specialties.eyebrow', 'Label bagian', 'text', 'SPESIALISASI'],
        ['home.specialties.title', 'Judul bagian', 'textarea', "Satu Indonesia.\nBanyak cara menjalaninya."],
        ['home.specialties.1.title', 'Spesialisasi 1 — judul', 'text', 'Alam & petualangan'],
        ['home.specialties.1.description', 'Spesialisasi 1 — deskripsi', 'textarea', 'Jalur hijau, laut terbuka, gunung, dan perjalanan untuk bergerak sedikit lebih jauh.'],
        ['home.specialties.2.title', 'Spesialisasi 2 — judul', 'text', 'Budaya & rasa lokal'],
        ['home.specialties.2.description', 'Spesialisasi 2 — deskripsi', 'textarea', 'Temui cerita di balik kota, tradisi, pasar, dapur, dan kehidupan sehari-hari.'],
        ['home.specialties.3.title', 'Spesialisasi 3 — judul', 'text', 'Rute antarkota'],
        ['home.specialties.3.description', 'Spesialisasi 3 — deskripsi', 'textarea', 'Itinerary yang menyambungkan tempat-tempat menarik tanpa melelahkan di jalan.'],
        ['home.specialties.4.title', 'Spesialisasi 4 — judul', 'text', 'Perjalanan bersama'],
        ['home.specialties.4.description', 'Spesialisasi 4 — deskripsi', 'textarea', 'Rencana nyaman untuk keluarga, teman dekat, kantor, atau grup kecil Anda.'],
        ['home.specialties.5.title', 'Spesialisasi 5 — judul', 'text', 'Perjalanan khusus'],
        ['home.specialties.5.description', 'Spesialisasi 5 — deskripsi', 'textarea', 'Susun perjalanan dari nol sesuai minat, hari yang tersedia, dan ritme Anda sendiri.'],
    ],
    'Mengapa Kami' => [
        ['home.reasons.eyebrow', 'Label bagian', 'text', 'MENGAPA KAMI?'],
        ['home.reasons.title', 'Judul bagian', 'textarea', "Detail yang diurus,\nsupaya Anda bisa hadir."],
        ['home.reasons.1.title', 'Alasan 1 — judul', 'text', 'Respon yang jelas'],
        ['home.reasons.1.description', 'Alasan 1 — deskripsi', 'textarea', 'Mulai dari pertanyaan awal, kami bantu menjawab kebutuhan perjalanan secara ringkas dan terbuka.'],
        ['home.reasons.2.title', 'Alasan 2 — judul', 'text', 'Rute yang masuk akal'],
        ['home.reasons.2.description', 'Alasan 2 — deskripsi', 'textarea', 'Jadwal disusun dengan waktu tempuh yang manusiawi, bukan sekadar mengejar banyak titik.'],
        ['home.reasons.3.title', 'Alasan 3 — judul', 'text', 'Sentuhan lokal'],
        ['home.reasons.3.description', 'Alasan 3 — deskripsi', 'textarea', 'Rekomendasi pengalaman dikurasi agar perjalanan terasa dekat dengan tempat yang dikunjungi.'],
        ['home.reasons.4.title', 'Alasan 4 — judul', 'text', 'Ruang untuk fleksibel'],
        ['home.reasons.4.description', 'Alasan 4 — deskripsi', 'textarea', 'Perjalanan yang baik selalu menyisakan waktu untuk menemukan hal yang baru.'],
    ],
    'Pilihan Perjalanan' => [
        ['home.trips.eyebrow', 'Label bagian', 'text', 'PILIHAN PERJALANAN'],
        ['home.trips.title', 'Judul bagian', 'textarea', "Mulai dari\nyang memanggil Anda."],
        ['home.trips.1.title', 'Perjalanan 1 — nama', 'text', 'Bali yang lebih sunyi'],
        ['home.trips.1.image', 'Perjalanan 1 — foto', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=85'],
        ['home.trips.2.title', 'Perjalanan 2 — nama', 'text', 'Jelajah Jogja'],
        ['home.trips.2.image', 'Perjalanan 2 — foto', 'image', 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85'],
        ['home.trips.3.title', 'Perjalanan 3 — nama', 'text', 'Bandung & dataran tinggi'],
        ['home.trips.3.image', 'Perjalanan 3 — foto', 'image', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=85'],
    ],
    'Galeri Beranda' => [
        ['home.gallery.title', 'Judul galeri', 'textarea', "Indonesia yang\ningin Anda lihat lagi."],
        ['home.gallery.1.title', 'Foto galeri 1 — keterangan', 'text', 'BALI / BUDAYA & ALAM'],
        ['home.gallery.1.image', 'Foto galeri 1', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1300&q=85'],
        ['home.gallery.2.title', 'Foto galeri 2 — keterangan', 'text', 'YOGYAKARTA / WARISAN BUDAYA'],
        ['home.gallery.2.image', 'Foto galeri 2', 'image', 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85'],
        ['home.gallery.3.title', 'Foto galeri 3 — keterangan', 'text', 'LABUAN BAJO / KEPULAUAN KOMODO'],
        ['home.gallery.3.image', 'Foto galeri 3', 'image', 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85'],
        ['home.gallery.4.title', 'Foto galeri 4 — keterangan', 'text', 'RAJA AMPAT / LAUT TERBUKA'],
        ['home.gallery.4.image', 'Foto galeri 4', 'image', 'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85'],
        ['home.gallery.5.title', 'Foto galeri 5 — keterangan', 'text', 'BROMO / DATARAN TINGGI'],
        ['home.gallery.5.image', 'Foto galeri 5', 'image', 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85'],
        ['home.gallery.6.title', 'Foto galeri 6 — keterangan', 'text', 'DANAU TOBA / SUMATRA UTARA'],
        ['home.gallery.6.image', 'Foto galeri 6', 'image', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=85'],
        ['home.gallery.7.title', 'Foto galeri 7 — keterangan', 'text', 'LOMBOK / PESISIR'],
        ['home.gallery.7.image', 'Foto galeri 7', 'image', 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85'],
    ],
]);

$addFields('about', [
    'Halaman Tentang Kami' => [
        ['about.banner.title', 'Judul banner', 'text', 'Tentang Kami'],
        ['about.image', 'Foto halaman', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=85'],
        ['about.title', 'Judul konten', 'text', 'Travel Indo'],
        ['about.paragraph1', 'Paragraf 1', 'textarea', 'Travel Indo membantu Anda merencanakan perjalanan di Indonesia, mulai dari memilih destinasi hingga menyusun rute yang sesuai dengan waktu dan kebutuhan perjalanan.'],
        ['about.paragraph2', 'Paragraf 2', 'textarea', 'Jelajahi beragam pilihan perjalanan dan ceritakan rencana Anda kepada kami. Kami siap membantu Anda menemukan perjalanan yang tepat.'],
        ['about.button', 'Teks tombol', 'text', 'Hubungi Kami'],
    ],
]);

$addFields('services', [
    'Halaman Layanan' => [
        ['services.banner.title', 'Judul banner', 'text', 'Layanan Kami'],
        ['services.heading', 'Judul spesialisasi', 'text', 'Spesialisasi Kami'],
        ['services.destination.title', 'Judul pilihan destinasi', 'textarea', "Banyak cara untuk\nmenjelajahi Indonesia."],
        ['services.destination.1.title', 'Destinasi 1 — nama', 'text', 'Bali'],
        ['services.destination.1.image', 'Destinasi 1 — foto', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=85'],
        ['services.destination.2.title', 'Destinasi 2 — nama', 'text', 'Yogyakarta'],
        ['services.destination.2.image', 'Destinasi 2 — foto', 'image', 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85'],
        ['services.destination.3.title', 'Destinasi 3 — nama', 'text', 'Labuan Bajo'],
        ['services.destination.3.image', 'Destinasi 3 — foto', 'image', 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85'],
        ['services.destination.4.title', 'Destinasi 4 — nama', 'text', 'Raja Ampat'],
        ['services.destination.4.image', 'Destinasi 4 — foto', 'image', 'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85'],
        ['services.destination.5.title', 'Destinasi 5 — nama', 'text', 'Bromo & dataran tinggi'],
        ['services.destination.5.image', 'Destinasi 5 — foto', 'image', 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85'],
        ['services.destination.6.title', 'Destinasi 6 — nama', 'text', 'Danau Toba'],
        ['services.destination.6.image', 'Destinasi 6 — foto', 'image', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=85'],
    ],
]);

$addFields('gallery', [
    'Halaman Galeri' => [
        ['gallery.banner.title', 'Judul banner', 'text', 'Galeri Perjalanan'],
        ['gallery.heading', 'Judul galeri', 'text', 'Galeri Perjalanan'],
        ['gallery.1.title', 'Foto 1 — keterangan', 'text', 'Bali'],
        ['gallery.1.image', 'Foto 1', 'image', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=900&q=85'],
        ['gallery.2.title', 'Foto 2 — keterangan', 'text', 'Yogyakarta'],
        ['gallery.2.image', 'Foto 2', 'image', 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85'],
        ['gallery.3.title', 'Foto 3 — keterangan', 'text', 'Labuan Bajo'],
        ['gallery.3.image', 'Foto 3', 'image', 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=900&q=85'],
        ['gallery.4.title', 'Foto 4 — keterangan', 'text', 'Raja Ampat'],
        ['gallery.4.image', 'Foto 4', 'image', 'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=900&q=85'],
        ['gallery.5.title', 'Foto 5 — keterangan', 'text', 'Bromo & dataran tinggi'],
        ['gallery.5.image', 'Foto 5', 'image', 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85'],
        ['gallery.6.title', 'Foto 6 — keterangan', 'text', 'Danau Toba'],
        ['gallery.6.image', 'Foto 6', 'image', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=85'],
        ['gallery.7.title', 'Foto 7 — keterangan', 'text', 'Lombok'],
        ['gallery.7.image', 'Foto 7', 'image', 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85'],
        ['gallery.8.title', 'Foto 8 — keterangan', 'text', 'Kepulauan Indonesia'],
        ['gallery.8.image', 'Foto 8', 'image', 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=900&q=85'],
        ['gallery.9.title', 'Foto 9 — keterangan', 'text', 'Jelajah alam'],
        ['gallery.9.image', 'Foto 9', 'image', 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=900&q=85'],
        ['gallery.10.title', 'Foto 10 — keterangan', 'text', 'Perjalanan antarpulau'],
        ['gallery.10.image', 'Foto 10', 'image', 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=900&q=85'],
        ['gallery.11.title', 'Foto 11 — keterangan', 'text', 'Dataran tinggi'],
        ['gallery.11.image', 'Foto 11', 'image', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=85'],
        ['gallery.12.title', 'Foto 12 — keterangan', 'text', 'Temukan perjalanan Anda'],
        ['gallery.12.image', 'Foto 12', 'image', 'https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=900&q=85'],
    ],
]);

$addFields('contact', [
    'Halaman Kontak' => [
        ['contact.banner.title', 'Judul banner', 'text', 'Hubungi Kami'],
        ['contact.heading', 'Judul informasi kontak', 'text', 'Informasi Kontak'],
        ['contact.description', 'Deskripsi', 'textarea', 'Hubungi kami melalui email, telepon, atau kunjungi alamat Travel Indo. Kami siap membantu kebutuhan perjalanan Anda.'],
        ['contact.email', 'Alamat email', 'text', 'widhipraditya@gmail.com'],
        ['contact.phone', 'Nomor telepon yang ditampilkan', 'text', '+62 858-1063-2983'],
        ['contact.phone_link', 'Nomor telepon untuk tautan (format +62)', 'text', '+6285810632983'],
        ['contact.address', 'Alamat', 'textarea', 'Jl. Cipinang Latihan RT009/RW014 Cipinang Besar Utara'],
        ['contact.map.title', 'Judul lokasi peta', 'text', 'Temukan Lokasi Kami'],
        ['contact.map.query', 'Lokasi untuk pencarian peta', 'text', 'Jl. Cipinang Latihan RT009/RW014 Cipinang Besar Utara'],
    ],
]);

$addFields('blog', [
    'Halaman Blog' => [
        ['blog.banner.eyebrow', 'Label banner', 'text', 'CERITA DARI INDONESIA'],
        ['blog.banner.title', 'Judul banner', 'text', 'Jelajahi cerita dan inspirasi perjalanan.'],
        ['blog.banner.description', 'Deskripsi banner', 'textarea', 'Artikel singkat seputar destinasi, budaya, dan tips untuk membantu merencanakan perjalanan Anda.'],
        ['blog.heading', 'Judul daftar artikel', 'text', 'Cerita perjalanan'],
    ],
]);

$addFields('shared', [
    'Informasi Umum & Footer' => [
        ['shared.brand.tagline', 'Tagline footer', 'text', 'Perjalanan di Indonesia, disusun dengan lebih terasa.'],
        ['shared.contact.phone', 'Nomor WhatsApp', 'text', '+62 858-1063-2983'],
        ['shared.contact.phone_link', 'Nomor WhatsApp untuk tautan (angka saja, format 62)', 'text', '6285810632983'],
        ['shared.contact.message', 'Pesan awal WhatsApp', 'text', 'Halo Travel Indo, saya ingin bertanya tentang perjalanan yang saya inginkan.'],
        ['shared.contact.email', 'Alamat email footer', 'text', 'widhipraditya@gmail.com'],
        ['shared.footer.popular_routes', 'Rute populer footer', 'textarea', "Bali · Jogja · Lombok\nLabuan Bajo · Bromo · Raja Ampat"],
        ['shared.contact.consultation', 'Teks tombol konsultasi', 'text', 'Konsultasi via WhatsApp'],
    ],
]);

$addFields('nature', [
    'Kategori Alam & Petualangan' => [
        ['category.nature.title', 'Nama kategori', 'text', 'Alam & Petualangan'],
        ['category.nature.eyebrow', 'Label kategori', 'text', 'JELAJAHI ALAM INDONESIA'],
        ['category.nature.intro', 'Ringkasan kategori', 'textarea', 'Cerita dan panduan untuk menikmati gunung, laut, pulau, serta lanskap alam Indonesia dengan persiapan yang lebih baik.'],
        ['category.nature.article_title', 'Judul artikel utama', 'textarea', 'Menikmati alam Indonesia dengan persiapan yang matang'],
        ['category.nature.lead', 'Ringkasan artikel utama', 'textarea', 'Perjalanan ke alam terbuka menawarkan pengalaman yang berbeda dari rutinitas. Agar momen tetap menyenangkan, persiapkan perjalanan dengan mempertimbangkan kondisi destinasi, kemampuan diri, dan dampak kita terhadap lingkungan.'],
        ['category.nature.image', 'Foto artikel utama', 'image', 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1500&q=85'],
        ['category.nature.image_alt', 'Deskripsi foto', 'text', 'Pegunungan dan lanskap dataran tinggi Indonesia'],
    ],
]);

$addFields('culture', [
    'Kategori Budaya & Rasa Lokal' => [
        ['category.culture.title', 'Nama kategori', 'text', 'Budaya & Rasa Lokal'],
        ['category.culture.eyebrow', 'Label kategori', 'text', 'CERITA BUDAYA DAN KULINER'],
        ['category.culture.intro', 'Ringkasan kategori', 'textarea', 'Cerita tentang tradisi, kuliner, ruang seni, serta kehidupan sehari-hari yang membuat setiap daerah terasa berbeda.'],
        ['category.culture.article_title', 'Judul artikel utama', 'textarea', 'Mengenal Indonesia lewat budaya dan rasa lokal'],
        ['category.culture.lead', 'Ringkasan artikel utama', 'textarea', 'Setiap perjalanan membuka kesempatan untuk mengenal kebiasaan, cerita, dan rasa yang tumbuh di suatu tempat. Luangkan waktu untuk melihat lebih dekat dan berinteraksi dengan hormat.'],
        ['category.culture.image', 'Foto artikel utama', 'image', 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1500&q=85'],
        ['category.culture.image_alt', 'Deskripsi foto', 'text', 'Candi dan warisan budaya di Indonesia'],
    ],
]);

$addFields('tips', [
    'Kategori Tips Perjalanan' => [
        ['category.tips.title', 'Nama kategori', 'text', 'Tips Perjalanan'],
        ['category.tips.eyebrow', 'Label kategori', 'text', 'PERSIAPAN PERJALANAN'],
        ['category.tips.intro', 'Ringkasan kategori', 'textarea', 'Panduan praktis untuk menyusun rute, memilih kebutuhan perjalanan, dan menikmati waktu dengan lebih nyaman.'],
        ['category.tips.article_title', 'Judul artikel utama', 'textarea', 'Merencanakan perjalanan yang nyaman dan realistis'],
        ['category.tips.lead', 'Ringkasan artikel utama', 'textarea', 'Rencana yang baik memberi arah sekaligus ruang untuk beristirahat dan menyesuaikan diri. Pertimbangkan waktu, jarak, anggaran, serta kebutuhan orang-orang yang ikut.'],
        ['category.tips.image', 'Foto artikel utama', 'image', 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=1500&q=85'],
        ['category.tips.image_alt', 'Deskripsi foto', 'text', 'Pemandangan alam dan perjalanan di Indonesia'],
    ],
]);

return [
    'pages' => $pages,
    'defaults' => $defaults,
    'article_categories' => [
        'alam-petualangan' => 'Alam & Petualangan',
        'budaya-lokal' => 'Budaya & Rasa Lokal',
        'tips-perjalanan' => 'Tips Perjalanan',
    ],
    'article_category_routes' => [
        'alam-petualangan' => 'blog.nature',
        'budaya-lokal' => 'blog.culture',
        'tips-perjalanan' => 'blog.tips',
    ],
];

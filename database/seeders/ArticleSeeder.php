<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Persiapan sederhana untuk menikmati Bromo',
                'slug' => 'persiapan-sederhana-menikmati-bromo',
                'category' => 'alam-petualangan',
                'excerpt' => 'Waktu berangkat, pakaian hangat, dan beberapa hal kecil yang membuat perjalanan ke dataran tinggi terasa lebih nyaman.',
                'content' => 'Suhu di kawasan tinggi bisa terasa dingin, terutama pada pagi hari. Bawa lapisan pakaian, alas kaki yang nyaman, air minum, dan pelindung dari matahari. Periksa kondisi rute serta aturan kawasan sebelum pergi.',
                'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pegunungan dan lanskap dataran tinggi',
                'reading_time' => '4 menit baca',
            ],
            [
                'title' => 'Menjelajah Raja Ampat dengan lebih bertanggung jawab',
                'slug' => 'menjelajah-raja-ampat-bertanggung-jawab',
                'category' => 'alam-petualangan',
                'excerpt' => 'Cara sederhana menikmati alam sambil menghormati lingkungan dan masyarakat setempat.',
                'content' => 'Gunakan pemandu lokal, bawa kembali sampah, hindari menyentuh biota laut, dan ikuti petunjuk saat snorkeling. Perjalanan yang bertanggung jawab membantu menjaga tempat yang kita nikmati.',
                'image' => 'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Kepulauan tropis dan perairan biru',
                'reading_time' => '5 menit baca',
            ],
            [
                'title' => 'Yogyakarta: ruang untuk budaya dan kuliner',
                'slug' => 'yogyakarta-budaya-dan-kuliner',
                'category' => 'budaya-lokal',
                'excerpt' => 'Rangkai kawasan bersejarah, ruang seni, dan tempat makan lokal dalam ritme perjalanan yang santai.',
                'content' => 'Kelompokkan tempat yang ingin dikunjungi berdasarkan area. Sisakan waktu tanpa agenda untuk menjelajah gang, melihat pertunjukan, atau menemukan hidangan yang menarik perhatian.',
                'image' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Candi dan warisan budaya di Yogyakarta',
                'reading_time' => '4 menit baca',
            ],
            [
                'title' => 'Melihat sisi Bali lewat tradisi dan kehidupan desa',
                'slug' => 'bali-tradisi-dan-kehidupan-desa',
                'category' => 'budaya-lokal',
                'excerpt' => 'Selain pantai, kenali suasana desa, karya lokal, dan tradisi yang menjadi bagian dari keseharian Bali.',
                'content' => 'Saat mengunjungi tempat ibadah atau mengikuti kegiatan lokal, perhatikan aturan berpakaian dan arahan warga setempat. Memilih pemandu lokal bisa membantu memahami cerita di balik tempat yang dikunjungi.',
                'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pura dan lanskap hijau di Bali',
                'reading_time' => '5 menit baca',
            ],
            [
                'title' => 'Menyusun rute perjalanan agar tidak habis di jalan',
                'slug' => 'menyusun-rute-perjalanan',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Mulai dari jarak dan waktu tempuh untuk merangkai beberapa tujuan dengan lebih realistis.',
                'content' => 'Kelompokkan destinasi yang berdekatan, perhitungkan waktu istirahat, dan sisakan jeda antarperpindahan. Periksa pilihan transportasi serta kondisi perjalanan sebelum menetapkan agenda.',
                'image' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pemandangan alam dan jalan di antara perbukitan',
                'reading_time' => '3 menit baca',
            ],
            [
                'title' => 'Ide perjalanan beberapa hari di Bali dan sekitarnya',
                'slug' => 'ide-perjalanan-bali-beberapa-hari',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Pilih area sebagai titik awal, lalu atur perjalanan harian berdasarkan jarak dan hal yang ingin dinikmati.',
                'content' => 'Daripada berpindah penginapan setiap hari, pertimbangkan untuk tinggal beberapa malam di satu area. Cara ini memberi lebih banyak waktu menikmati tujuan tanpa terburu-buru mengejar jadwal.',
                'image' => 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pantai tropis dan ombak di Indonesia',
                'reading_time' => '4 menit baca',
            ],
            [
                'title' => 'Membuat rencana liburan keluarga yang nyaman',
                'slug' => 'rencana-liburan-keluarga',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Atur agenda, waktu istirahat, dan pilihan aktivitas agar setiap anggota keluarga bisa menikmati perjalanan.',
                'content' => 'Libatkan anggota keluarga saat memilih aktivitas, siapkan waktu jeda, dan pastikan akses transportasi serta fasilitas sesuai kebutuhan. Agenda yang tidak terlalu padat biasanya lebih mudah dinikmati bersama.',
                'image' => 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Danau dan pegunungan sebagai suasana perjalanan bersama',
                'reading_time' => '4 menit baca',
            ],
            [
                'title' => 'Tips mengatur perjalanan bersama teman',
                'slug' => 'tips-perjalanan-bersama-teman',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Samakan ekspektasi sejak awal dengan membahas durasi, anggaran, dan kegiatan yang ingin dilakukan.',
                'content' => 'Buat daftar prioritas bersama dan sepakati hal penting sebelum memesan kebutuhan perjalanan. Sisakan waktu bebas agar setiap orang tetap punya ruang untuk menikmati liburan dengan caranya.',
                'image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pantai tropis untuk perjalanan bersama teman',
                'reading_time' => '3 menit baca',
            ],
            [
                'title' => 'Merencanakan perjalanan laut ke Labuan Bajo',
                'slug' => 'merencanakan-perjalanan-laut-labuan-bajo',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Hal yang patut ditanyakan sebelum berlayar: rute, durasi, fasilitas, dan ketentuan keselamatan.',
                'content' => 'Tentukan lama perjalanan dan jenis pengalaman yang diinginkan. Tanyakan fasilitas kapal, perlengkapan keselamatan, serta apa saja yang termasuk. Cuaca bisa memengaruhi rencana di laut, jadi siapkan waktu yang fleksibel.',
                'image' => 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Pulau-pulau dan perairan di kawasan Labuan Bajo',
                'reading_time' => '5 menit baca',
            ],
            [
                'title' => 'Lombok untuk perjalanan dengan tempo lebih tenang',
                'slug' => 'lombok-perjalanan-tempo-tenang',
                'category' => 'tips-perjalanan',
                'excerpt' => 'Padukan waktu di alam dan pantai dengan agenda yang disesuaikan minat serta ritme perjalanan.',
                'content' => 'Pilih area menginap yang sesuai dengan aktivitas utama dan atur perjalanan harian agar tidak terlalu jauh. Periksa kondisi jalan serta transportasi setempat, dan berikan ruang untuk menyesuaikan rencana.',
                'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1000&q=85',
                'image_alt' => 'Danau dan pegunungan di Indonesia',
                'reading_time' => '4 menit baca',
            ],
        ];

        foreach ($articles as $article) {
            Article::query()->updateOrCreate(
                ['slug' => $article['slug']],
                [...$article, 'is_published' => true]
            );
        }
    }
}

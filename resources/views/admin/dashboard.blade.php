@extends('admin.layout')

@section('title', 'Admin - Travel Indo')

@section('content')
    <div class="admin-dashboard-heading">
        <div>
            <p class="admin-eyebrow">DASHBOARD</p>
            <h1>Ringkasan website</h1>
            <p class="admin-intro">Lihat kondisi website dan lanjutkan pekerjaan yang Anda butuhkan.</p>
        </div>
        <a class="admin-dashboard-preview" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
            Lihat landing page <span aria-hidden="true">↗</span>
        </a>
    </div>

    {{-- Jam lokal dan status halaman website publik. --}}
    <section class="admin-live-status" aria-label="Waktu dan status website">
        <div class="admin-live-status__clock">
            <span class="admin-live-status__label">WAKTU INDONESIA BARAT</span>
            <strong data-admin-clock>{{ now('Asia/Jakarta')->format('H:i:s') }}</strong>
            <span data-admin-date>{{ now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y') }}</span>
        </div>
        <div class="admin-live-status__items">
            <div @class(['is-offline' => ! $publicSiteActive])>
                <span class="admin-live-status__dot" aria-hidden="true"></span>
                <span>
                    <strong>{{ $publicSiteActive ? 'Landing page aktif' : 'Landing page sedang perawatan' }}</strong>
                    <small>{{ $publicSiteActive ? 'Halaman beranda dapat diakses pengunjung.' : 'Halaman beranda sementara tidak tersedia untuk pengunjung.' }}</small>
                </span>
            </div>
            <div>
                <span class="admin-live-status__dot" aria-hidden="true"></span>
                <span><strong>Database terhubung</strong><small>Data dashboard berhasil dibaca</small></span>
            </div>
        </div>
    </section>

    <section class="admin-welcome" aria-label="Panduan singkat">
        <div><span>01</span><strong>Pilih bagian website</strong><p>Buka kartu halaman yang ingin diperbarui.</p></div>
        <div><span>02</span><strong>Edit konten</strong><p>Ubah teks, gunakan format editor, atau unggah foto.</p></div>
        <div><span>03</span><strong>Simpan dan lihat</strong><p>Periksa hasilnya lewat tombol Lihat website.</p></div>
    </section>

    <div class="admin-stats">
        <article><span class="admin-stat__icon" aria-hidden="true">▦</span><strong>{{ $contentCount }}</strong><span>Bagian website</span></article>
        <article><span class="admin-stat__icon" aria-hidden="true">✎</span><strong>{{ $articleCount }}</strong><span>Total artikel</span></article>
        <article><span class="admin-stat__icon" aria-hidden="true">↗</span><strong>{{ $publishedCount }}</strong><span>Artikel tayang</span></article>
    </div>

    <div class="admin-section-heading">
        <div>
            <p class="admin-eyebrow">PENGELOLAAN</p>
            <h2>Konten website</h2>
        </div>
        <span>Pilih halaman yang ingin diperbarui</span>
    </div>
    <div class="admin-page-grid">
        @foreach (config('cms.pages') as $key => $page)
            <a href="{{ route('admin.content.edit', $key) }}">
                <strong>{{ $page['label'] }}</strong>
                <span>Edit teks dan gambar ↗</span>
            </a>
        @endforeach
        <a href="{{ route('admin.articles.index') }}">
            <strong>Artikel Blog</strong>
            <span>Tambah, edit, dan hapus artikel ↗</span>
        </a>
    </div>
@endsection

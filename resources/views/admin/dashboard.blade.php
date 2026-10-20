@extends('admin.layout')

@section('title', 'Ringkasan Admin — Travel Indo')

@section('content')
    <p class="admin-eyebrow">DASHBOARD</p>
    <h1>Kelola website Travel Indo</h1>
    <p class="admin-intro">Ubah teks dan gambar halaman, atau kelola artikel tanpa mengedit file kode.</p>

    <div class="admin-stats">
        <article><strong>{{ $contentCount }}</strong><span>Bagian website</span></article>
        <article><strong>{{ $articleCount }}</strong><span>Total artikel</span></article>
        <article><strong>{{ $publishedCount }}</strong><span>Artikel tayang</span></article>
    </div>

    <h2>Konten website</h2>
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

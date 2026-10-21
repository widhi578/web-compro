@extends('admin.layout')

@section('title', 'Artikel Blog - Admin Travel Indo')

@section('content')
    {{-- Judul daftar dan pintasan untuk menulis artikel. --}}
    <div class="admin-articles-heading">
        <div>
            <p class="admin-eyebrow">KONTEN WEBSITE</p>
            <h1>Artikel Blog</h1>
            <p>Atur cerita yang tampil di halaman Blog. Artikel Draft hanya terlihat di panel admin.</p>
        </div>
        <a class="admin-button" href="{{ route('admin.articles.create') }}"><span aria-hidden="true">+</span> Tulis artikel</a>
    </div>

    {{-- Filter daftar berdasarkan status artikel. --}}
    <section class="admin-article-summary" aria-label="Ringkasan artikel">
        <a href="{{ route('admin.articles.index', ['status' => 'all']) }}" @class(['is-active' => $statusFilter === 'all'])>
            <span>Semua artikel</span><strong>{{ $articleCounts['all'] }}</strong>
        </a>
        <a href="{{ route('admin.articles.index', ['status' => 'published']) }}" @class(['is-active' => $statusFilter === 'published'])>
            <span>Tayang</span><strong>{{ $articleCounts['published'] }}</strong>
        </a>
        <a href="{{ route('admin.articles.index', ['status' => 'draft']) }}" @class(['is-active' => $statusFilter === 'draft'])>
            <span>Draft</span><strong>{{ $articleCounts['draft'] }}</strong>
        </a>
    </section>

    {{-- Kartu artikel dan tombol untuk mengelola tiap artikel. --}}
    <div class="admin-article-list">
        @forelse ($articles as $article)
            <article class="admin-article-card">
                <div class="admin-article-card__image">
                    @if ($article->image)
                        <img src="{{ $article->image }}" alt="{{ $article->image_alt ?: $article->title }}" loading="lazy">
                    @else
                        <span aria-hidden="true">TI</span>
                    @endif
                </div>
                <div class="admin-article-card__body">
                    <div class="admin-article-card__meta">
                        <span>{{ $categories[$article->category] ?? $article->category }}</span>
                        <span
                            class="admin-status {{ $article->is_published ? 'is-published' : '' }}"
                        >{{ $article->is_published ? 'Tayang' : 'Draft' }}</span>
                    </div>
                    <h2>{{ $article->title }}</h2>
                    <p class="admin-article-card__excerpt">{{ $article->excerpt }}</p>
                    <small>Diperbarui {{ $article->updated_at->format('d M Y') }} · {{ $article->reading_time }}</small>
                </div>
                <div class="admin-article-card__actions">
                    <form method="POST" action="{{ route('admin.articles.status', $article) }}">
                        @csrf
                        @method('PATCH')
                        <button class="admin-status-toggle" type="submit">{{ $article->is_published ? 'Jadikan draft' : 'Terbitkan' }}</button>
                    </form>
                    <a class="admin-article-edit" href="{{ route('admin.articles.edit', $article) }}">Edit artikel</a>
                    <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" data-delete-form data-article-title="{{ $article->title }}">
                        @csrf
                        @method('DELETE')
                        <button class="admin-article-delete" type="submit">Hapus</button>
                    </form>
                </div>
            </article>
        @empty
            <div class="admin-article-empty">
                <span aria-hidden="true">✎</span>
                <h2>{{ $statusFilter === 'all' ? 'Belum ada artikel' : 'Belum ada artikel di bagian ini' }}</h2>
                <p>
                    @if ($statusFilter === 'draft')
                        Artikel Draft yang Anda simpan akan muncul di sini.
                    @else
                        Mulai dengan menulis artikel pertama untuk halaman Blog.
                    @endif
                </p>
                @if ($statusFilter !== 'published')
                    <a class="admin-button" href="{{ route('admin.articles.create') }}">Tulis artikel</a>
                @endif
            </div>
        @endforelse
    </div>

    <div class="admin-article-pagination">{{ $articles->links() }}</div>

    {{-- Dialog konfirmasi penghapusan artikel. --}}
    <dialog class="admin-confirm" data-confirm-dialog aria-labelledby="admin-confirm-title">
        <div class="admin-confirm__content">
            <span class="admin-eyebrow">KONFIRMASI</span>
            <h2 id="admin-confirm-title">Hapus artikel?</h2>
            <p data-confirm-message>Artikel yang dihapus tidak dapat dipulihkan.</p>
            <div class="admin-confirm__actions">
                <button class="admin-confirm__cancel" type="button" data-confirm-cancel>Batalkan</button>
                <button class="admin-confirm__accept" type="button" data-confirm-accept>Ya, hapus artikel</button>
            </div>
        </div>
    </dialog>
@endsection

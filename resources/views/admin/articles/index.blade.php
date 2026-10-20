@extends('admin.layout')

@section('title', 'Artikel Blog — Admin Travel Indo')

@section('content')
    <div class="admin-page-heading">
        <div>
            <p class="admin-eyebrow">KONTEN WEBSITE</p>
            <h1>Artikel Blog</h1>
            <p>Artikel yang ditandai tayang akan muncul di halaman Blog.</p>
        </div>
        <a class="admin-button" href="{{ route('admin.articles.create') }}">+ Artikel baru</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr><th>Judul</th><th>Kategori</th><th>Status</th><th></th></tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>
                            <strong>{{ $article->title }}</strong>
                            <small>{{ $article->updated_at->format('d M Y') }}</small>
                        </td>
                        <td>{{ $categories[$article->category] ?? $article->category }}</td>
                        <td><span class="admin-status {{ $article->is_published ? 'is-published' : '' }}">{{ $article->is_published ? 'Tayang' : 'Draft' }}</span></td>
                        <td class="admin-row-actions">
                            <a href="{{ route('admin.articles.edit', $article) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Belum ada artikel. Buat artikel pertama untuk ditampilkan di blog.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $articles->links() }}
@endsection

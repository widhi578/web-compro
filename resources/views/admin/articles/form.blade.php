@extends('admin.layout')

@section('title', ($article->exists ? 'Edit' : 'Tambah').' Artikel — Admin Travel Indo')

@section('content')
    <p class="admin-eyebrow">ARTIKEL BLOG</p>
    <h1>{{ $article->exists ? 'Edit artikel' : 'Tambah artikel' }}</h1>

    <form
        method="POST"
        action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
        enctype="multipart/form-data"
        class="admin-form admin-card"
    >
        @csrf
        @if ($article->exists) @method('PUT') @endif

        <label class="admin-field">
            <span>Judul artikel</span>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" maxlength="180" required>
            @error('title') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-field">
            <span>Kategori</span>
            <select name="category" required>
                @foreach ($categories as $key => $label)
                    <option value="{{ $key }}" @selected(old('category', $article->category) === $key)>{{ $label }}</option>
                @endforeach
            </select>
            @error('category') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-field">
            <span>Ringkasan</span>
            <textarea name="excerpt" rows="3" maxlength="1000" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            @error('excerpt') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-field">
            <span>Isi artikel</span>
            <textarea name="content" rows="9" maxlength="20000" required>{{ old('content', $article->content) }}</textarea>
            @error('content') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        @if ($article->image)
            <img class="admin-image-preview" src="{{ $article->image }}" alt="Pratinjau foto artikel">
        @endif
        <label class="admin-field">
            <span>{{ $article->exists ? 'Ganti foto utama (opsional)' : 'Foto utama' }}</span>
            <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" @required(!$article->exists)>
            <span class="admin-help">JPG, PNG, atau WebP; maksimal 5 MB.</span>
            @error('image') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-field">
            <span>Deskripsi foto (alt)</span>
            <input type="text" name="image_alt" value="{{ old('image_alt', $article->image_alt) }}" maxlength="250">
            @error('image_alt') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-field">
            <span>Waktu baca</span>
            <input type="text" name="reading_time" value="{{ old('reading_time', $article->reading_time) }}" maxlength="40" required>
            @error('reading_time') <span class="admin-error">{{ $message }}</span> @enderror
        </label>
        <label class="admin-checkbox">
            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article->is_published))>
            Tampilkan artikel di website
        </label>
        <input type="hidden" name="is_published" value="0">
        @error('is_published') <span class="admin-error">{{ $message }}</span> @enderror
        <div class="admin-form-actions">
            <button class="admin-button" type="submit">Simpan artikel</button>
            <a class="admin-back-link" href="{{ route('admin.articles.index') }}">Batal</a>
        </div>
    </form>
@endsection

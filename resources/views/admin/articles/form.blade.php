@extends('admin.layout')

@section('title', ($article->exists ? 'Edit' : 'Tambah').' Artikel - Admin Travel Indo')

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
        @if ($article->exists)
            @method('PUT')
        @endif

        {{-- Informasi dasar artikel. --}}
        <label class="admin-field">
            <span>Judul artikel</span>
            <input
                type="text"
                name="title"
                value="{{ old('title', $article->title) }}"
                maxlength="180"
                required
            >
            @error('title')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        <label class="admin-field">
            <span>Kategori</span>
            <select name="category" required>
                @foreach ($categories as $key => $label)
                    <option
                        value="{{ $key }}"
                        @selected(old('category', $article->category) === $key)
                    >{{ $label }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        <label class="admin-field">
            <span>Ringkasan</span>
            <textarea name="excerpt" rows="3" maxlength="1000" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            @error('excerpt')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        {{-- Editor untuk isi artikel dan format teksnya. --}}
        <div class="admin-field">
            <span>Isi artikel</span>
            <div class="admin-editor" data-richtext-editor>
                <div class="admin-editor__toolbar" role="toolbar" aria-label="Format teks">
                    <label class="admin-editor__format-label">
                        Gaya
                        <select data-editor-format aria-label="Gaya paragraf">
                            <option value="P">Paragraf</option>
                            <option value="H2">Judul besar</option>
                            <option value="H3">Subjudul</option>
                        </select>
                    </label>

                    <span aria-hidden="true"></span>
                    <button
                        type="button"
                        data-command="bold"
                        title="Tebalkan (Ctrl+B)"
                        aria-label="Tebalkan"
                    ><strong>Tebal</strong></button>
                    <button
                        type="button"
                        data-command="italic"
                        title="Miring (Ctrl+I)"
                        aria-label="Miring"
                    ><em>Miring</em></button>
                    <button
                        type="button"
                        data-command="underline"
                        title="Garis bawah (Ctrl+U)"
                        aria-label="Garis bawah"
                    ><u>Garis bawah</u></button>

                    <span aria-hidden="true"></span>
                    <button type="button" data-command="justifyLeft" title="Rata kiri" aria-label="Rata kiri">
                        Kiri
                    </button>
                    <button type="button" data-command="justifyCenter" title="Rata tengah" aria-label="Rata tengah">
                        Tengah
                    </button>
                    <button type="button" data-command="justifyRight" title="Rata kanan" aria-label="Rata kanan">
                        Kanan
                    </button>

                    <span aria-hidden="true"></span>
                    <button
                        type="button"
                        data-command="insertUnorderedList"
                        title="Daftar berpoin"
                        aria-label="Buat daftar berpoin"
                    >Daftar berpoin</button>
                    <button
                        type="button"
                        data-command="insertOrderedList"
                        title="Daftar bernomor"
                        aria-label="Buat daftar bernomor"
                    >1. Daftar</button>
                    <button
                        type="button"
                        data-command="normal"
                        title="Kembalikan ke format normal"
                        aria-label="Format normal"
                    >Normal</button>
                </div>

                <div
                    class="admin-editor__surface"
                    contenteditable="true"
                    tabindex="0"
                    role="textbox"
                    aria-label="Isi artikel"
                    aria-multiline="true"
                    spellcheck="false"
                    data-editor-surface
                >{!! \App\Support\RichText::sanitize(old('content', $article->content ?? '')) !!}</div>

                <textarea
                    class="admin-editor__value"
                    name="content"
                    data-editor-value
                    maxlength="20000"
                    hidden
                >{{ old('content', $article->content) }}</textarea>
                <span class="admin-help">
                    Pilih teks untuk memformat. Tekan Enter untuk membuat paragraf baru.
                </span>
            </div>
            @error('content')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- Foto utama dan keterangan aksesibilitasnya. --}}
        <img
            id="article-image-preview"
            class="admin-image-preview"
            src="{{ $article->image }}"
            alt="Pratinjau foto artikel"
            @unless($article->image) hidden @endunless
            data-image-preview
        >

        <label class="admin-field">
            <span>{{ $article->exists ? 'Ganti foto utama (opsional)' : 'Foto utama' }}</span>
            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                data-file-input
                data-preview-target="article-image-preview"
                @required(!$article->exists)
            >
            <span class="admin-help">JPG, PNG, atau WebP; maksimal 10 MB.</span>
            @error('image')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        <label class="admin-field">
            <span>Deskripsi foto (alt)</span>
            <input
                type="text"
                name="image_alt"
                value="{{ old('image_alt', $article->image_alt) }}"
                maxlength="250"
            >
            @error('image_alt')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        <label class="admin-field">
            <span>Waktu baca</span>
            <input
                type="text"
                name="reading_time"
                value="{{ old('reading_time', $article->reading_time) }}"
                maxlength="40"
                required
            >
            @error('reading_time')
                <span class="admin-error">{{ $message }}</span>
            @enderror
        </label>

        {{-- Status menentukan apakah artikel langsung tampil di website. --}}
        <input type="hidden" name="is_published" value="0">
        <label class="admin-checkbox admin-checkbox--publish">
            <input
                type="checkbox"
                name="is_published"
                value="1"
                @checked(old('is_published', $article->is_published))
            >
            <span class="admin-checkbox__copy">
                <strong>Terbitkan artikel</strong>
                <small>Artikel langsung tampil di halaman Blog setelah disimpan.</small>
            </span>
        </label>
        @error('is_published')
            <span class="admin-error">{{ $message }}</span>
        @enderror

        <div class="admin-form-actions">
            <button class="admin-button" type="submit">Simpan artikel</button>
            <a class="admin-back-link" href="{{ route('admin.articles.index') }}">Batal</a>
        </div>
    </form>
@endsection

@extends('admin.layout')

@section('title', 'Edit '.$page['label'].' - Admin Travel Indo')

@section('content')
    {{-- Judul halaman dan tautan kembali ke ringkasan. --}}
    <div class="admin-page-heading">
        <div>
            <p class="admin-eyebrow">KONTEN WEBSITE</p>
            <h1>{{ $page['label'] }}</h1>
            <p>
                Edit isian yang ingin diubah, lalu simpan. Gunakan pencarian jika halaman ini
                memiliki banyak isian.
            </p>
        </div>
        <a class="admin-back-link" href="{{ route('admin.dashboard') }}">
            &#8592; Ringkasan
        </a>
    </div>

    <form
        method="POST"
        action="{{ route('admin.content.update', $pageKey) }}"
        enctype="multipart/form-data"
        class="admin-form"
    >
        @csrf
        @method('PUT')

        {{-- Pencarian cepat untuk halaman dengan banyak isian. --}}
        <div class="admin-content-tools">
            <label for="admin-field-search">Cari isian</label>
            <input
                id="admin-field-search"
                type="search"
                placeholder="Contoh: judul, foto, WhatsApp..."
                data-field-search
            >
            <span data-field-count>
                {{ collect($groups)->sum(fn ($group) => count($group['fields'])) }} isian
            </span>
        </div>

        {{-- Tautan untuk berpindah antarbagian konten. --}}
        <nav class="admin-section-nav" aria-label="Lompat ke bagian">
            @foreach ($groups as $group)
                <a href="#admin-group-{{ $loop->index }}" data-group-link>
                    {{ $group['label'] }}
                    <span>{{ count($group['fields']) }}</span>
                </a>
            @endforeach
        </nav>

        {{-- Tiap kartu berisi satu kelompok isian dari halaman. --}}
        @foreach ($groups as $group)
            <section
                class="admin-card admin-content-group"
                id="admin-group-{{ $loop->index }}"
                data-content-group
            >
                <h2>{{ $group['label'] }}</h2>

                @foreach ($group['fields'] as $field)
                    @php
                        $value = old(
                            'content.'.$field['key'],
                            \App\Models\SiteContent::value($field['key']),
                        );
                    @endphp

                    <div
                        class="admin-field"
                        data-content-field
                        data-search-label="{{ strtolower($field['label'].' '.$group['label']) }}"
                    >
                        <span>{{ $field['label'] }}</span>

                        @if ($field['type'] === 'richtext')
                            {{-- Editor visual untuk teks berformat. --}}
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
                                    aria-label="{{ $field['label'] }}"
                                    aria-multiline="true"
                                    spellcheck="false"
                                    data-editor-surface
                                >{!! \App\Support\RichText::sanitize($value) !!}</div>

                                <textarea
                                    class="admin-editor__value"
                                    name="content[{{ $field['key'] }}]"
                                    data-editor-value
                                    hidden
                                >{{ $value }}</textarea>
                                <span class="admin-help">
                                    Klik area putih lalu langsung ketik. Sorot teks untuk memformatnya.
                                    Enter membuat paragraf baru.
                                </span>
                            </div>
                        @elseif ($field['type'] === 'textarea')
                            <textarea
                                name="content[{{ $field['key'] }}]"
                                aria-label="{{ $field['label'] }}"
                                rows="3"
                                required
                            >{{ $value }}</textarea>
                        @elseif ($field['type'] === 'image')
                            {{-- Isian gambar menerima URL atau berkas lokal. --}}
                            @if ($value)
                                <img
                                    class="admin-image-preview"
                                    src="{{ $value }}"
                                    alt="Pratinjau {{ $field['label'] }}"
                                >
                            @endif
                            <input
                                type="text"
                                name="content[{{ $field['key'] }}]"
                                aria-label="URL {{ $field['label'] }}"
                                value="{{ $value }}"
                                placeholder="URL gambar atau gambar yang diunggah"
                            >
                            <span class="admin-help">
                                Atau unggah gambar JPG, PNG, atau WebP (maksimal 10 MB).
                            </span>
                            <div class="admin-upload">
                                <label
                                    class="admin-upload__button"
                                    for="image-upload-{{ $loop->parent->index }}-{{ $loop->index }}"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 16V4m0 0L7 9m5-5 5 5M5 15v4h14v-4" />
                                    </svg>
                                    {{ $value ? 'Pilih gambar lain' : 'Pilih gambar' }}
                                </label>
                                <span class="admin-upload__name" data-file-name>
                                    Belum ada file dipilih
                                </span>
                                <input
                                    class="admin-upload__input"
                                    id="image-upload-{{ $loop->parent->index }}-{{ $loop->index }}"
                                    type="file"
                                    name="image_uploads[{{ $field['key'] }}]"
                                    aria-label="Unggah {{ $field['label'] }}"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    data-file-input
                                >
                            </div>
                        @elseif ($field['type'] === 'color')
                            <div class="admin-color-input">
                                <input
                                    type="color"
                                    name="content[{{ $field['key'] }}]"
                                    value="{{ $value }}"
                                    aria-label="Pilih {{ $field['label'] }}"
                                >
                                <code>{{ $value }}</code>
                            </div>
                            <span class="admin-help">
                                Pilih warna latar; gunakan warna gelap agar teks putih tetap terbaca.
                            </span>
                        @else
                            <input
                                type="text"
                                name="content[{{ $field['key'] }}]"
                                aria-label="{{ $field['label'] }}"
                                value="{{ $value }}"
                                maxlength="5000"
                                required
                            >
                        @endif

                        @error('content.'.$field['key'])
                            <span class="admin-error">{{ $message }}</span>
                        @enderror
                        @error('image_uploads.'.$field['key'])
                            <span class="admin-error">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach
            </section>
        @endforeach

        {{-- Simpan perubahan atau lihat hasil di website publik. --}}
        <div class="admin-form-actions admin-form-actions--sticky">
            <button class="admin-button" type="submit">Simpan perubahan</button>
            <a
                class="admin-back-link"
                href="{{ route('home') }}"
                target="_blank"
                rel="noopener noreferrer"
            >Lihat website &#8599;</a>
        </div>
    </form>
@endsection

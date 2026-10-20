@extends('admin.layout')

@section('title', 'Edit '.$page['label'].' — Admin Travel Indo')

@section('content')
    <div class="admin-page-heading">
        <div>
            <p class="admin-eyebrow">KONTEN WEBSITE</p>
            <h1>{{ $page['label'] }}</h1>
            <p>Perubahan akan langsung ditampilkan di website setelah disimpan.</p>
        </div>
        <a class="admin-back-link" href="{{ route('admin.dashboard') }}">← Ringkasan</a>
    </div>

    <form
        method="POST"
        action="{{ route('admin.content.update', $pageKey) }}"
        enctype="multipart/form-data"
        class="admin-form"
    >
        @csrf
        @method('PUT')

        @foreach ($groups as $group)
            <section class="admin-card">
                <h2>{{ $group['label'] }}</h2>
                @foreach ($group['fields'] as $field)
                    @php
                        $value = old('content.'.$field['key'], \App\Models\SiteContent::value($field['key']));
                    @endphp
                    <label class="admin-field">
                        <span>{{ $field['label'] }}</span>
                        @if ($field['type'] === 'textarea')
                            <textarea name="content[{{ $field['key'] }}]" rows="3" required>{{ $value }}</textarea>
                        @elseif ($field['type'] === 'image')
                            @if ($value)
                                <img class="admin-image-preview" src="{{ $value }}" alt="Pratinjau {{ $field['label'] }}">
                            @endif
                            <input type="text" name="content[{{ $field['key'] }}]" value="{{ $value }}" placeholder="URL gambar atau gambar yang diunggah">
                            <span class="admin-help">Atau unggah gambar JPG, PNG, atau WebP (maksimal 5 MB).</span>
                            <input type="file" name="image_uploads[{{ $field['key'] }}]" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                        @else
                            <input type="text" name="content[{{ $field['key'] }}]" value="{{ $value }}" maxlength="5000" required>
                        @endif
                        @error('content.'.$field['key']) <span class="admin-error">{{ $message }}</span> @enderror
                        @error('image_uploads.'.$field['key']) <span class="admin-error">{{ $message }}</span> @enderror
                    </label>
                @endforeach
            </section>
        @endforeach

        <div class="admin-form-actions">
            <button class="admin-button" type="submit">Simpan perubahan</button>
            <a class="admin-back-link" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">Lihat website ↗</a>
        </div>
    </form>
@endsection

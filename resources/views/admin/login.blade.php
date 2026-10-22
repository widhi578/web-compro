@extends('admin.layout')

@section('title', 'Login Admin - Travel Indo')

@section('content')
    <section class="admin-login">
        <div class="admin-login__brand" aria-label="Travel Indo Admin">
            <!-- <span class="admin-login__mark" aria-hidden="true">TI</span> -->
            <span>TRAVEL<span>INDO</span><small>ADMIN PANEL</small></span>
        </div>
        <p class="admin-eyebrow">AREA TERBATAS</p>
        <h1>Selamat datang kembali</h1>
        <p>Masuk untuk mengelola konten Travel Indo dengan mudah.</p>
        <form method="POST" action="{{ route('admin.login.store') }}" class="admin-form">
            @csrf
            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="username" required autofocus>
                @error('email') <span class="admin-error">{{ $message }}</span> @enderror
            </label>
            <label>
                Kata sandi
                <span class="admin-password-field">
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                        data-password-input
                        required
                    >
                    <button type="button" data-password-toggle aria-label="Tampilkan kata sandi" aria-pressed="false">
                        <svg class="admin-password-field__eye" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2.5 12s3.3-6 9.5-6 9.5 6 9.5 6-3.3 6-9.5 6-9.5-6-9.5-6Z" />
                            <circle cx="12" cy="12" r="2.8" />
                        </svg>
                        <svg class="admin-password-field__eye-off" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m3 3 18 18M10.6 6.2A10.9 10.9 0 0 1 12 6c6.2 0 9.5 6 9.5 6a17.3 17.3 0 0 1-3.2 3.8M6.1 6.1A17.2 17.2 0 0 0 2.5 12S5.8 18 12 18c1.1 0 2.1-.2 3-.5M9.9 9.9a3 3 0 0 0 4.2 4.2" />
                        </svg>
                    </button>
                </span>
                @error('password') <span class="admin-error">{{ $message }}</span> @enderror
            </label>
            <button class="admin-button" type="submit">Masuk ke panel <span aria-hidden="true">&rarr;</span></button>
        </form>
        <p class="admin-login__note"><span aria-hidden="true">&#9679;</span> Akses ini khusus untuk pengelola Travel Indo.</p>
        <a class="admin-login__back" href="{{ route('home') }}">← Kembali ke website Travel Indo</a>
    </section>
@endsection

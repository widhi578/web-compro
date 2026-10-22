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
                        Lihat
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

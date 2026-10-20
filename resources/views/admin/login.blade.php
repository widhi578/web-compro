@extends('admin.layout')

@section('title', 'Masuk Admin — Travel Indo')

@section('content')
    <section class="admin-login">
        <p class="admin-eyebrow">AREA TERBATAS</p>
        <h1>Masuk ke panel admin</h1>
        <p>Gunakan akun admin Travel Indo untuk mengelola konten website.</p>
        <form method="POST" action="{{ route('admin.login.store') }}" class="admin-form">
            @csrf
            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
                @error('email') <span class="admin-error">{{ $message }}</span> @enderror
            </label>
            <label>
                Kata sandi
                <input type="password" name="password" autocomplete="current-password" required>
                @error('password') <span class="admin-error">{{ $message }}</span> @enderror
            </label>
            <button class="admin-button" type="submit">Masuk</button>
        </form>
    </section>
@endsection

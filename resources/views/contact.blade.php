@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container">
        <h1>Contact Us</h1>
        <p>Silakan isi formulir jika ada pertanyaan.</p>
        <p>Formulir ini belum terhubung ke pengiriman pesan.</p>

        @if (session('status'))
            <p role="status">{{ session('status') }}</p>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>
@endsection
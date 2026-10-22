@php
    $c = $contentValue;
    $whatsAppNumber = preg_replace('/\D+/', '', $c('shared.contact.phone_link'));
    $whatsAppMessage = rawurlencode($c('shared.contact.message'));
@endphp

{{-- Bagian ajakan konsultasi dan informasi kontak. --}}
<section
    class="ad-contact"
    id="konsultasi"
    aria-labelledby="contact-title"
    style="--ad-contact-color: {{ $c('shared.footer.contact_color') }}"
>
    <img
        class="ad-contact__background"
        src="{{ $c('shared.footer.contact_background') }}"
        alt=""
        aria-hidden="true"
    >

    <div class="shell ad-contact__grid">
        <div>
            <p class="ad-index">RENCANAKAN BERSAMA</p>
            <h2 id="contact-title">
                Ke mana pun tujuannya,<br>
                <i>mari cari jalannya.</i>
            </h2>
            <p>
                Ceritakan waktu, jumlah orang, dan bayangan perjalanan Anda.
                Kami akan bantu merangkai rute yang cocok.
            </p>
            <a
                class="ad-button"
                href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppMessage }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                {{ $c('shared.contact.consultation') }}
                <span aria-hidden="true">&#8599;</span>
            </a>
        </div>

        <div class="ad-contact__details">
            <div>
                <span>UNTUK PERENCANAAN</span>
                <a
                    href="https://wa.me/{{ $whatsAppNumber }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    WhatsApp Travel Indo &middot; {{ $c('shared.contact.phone') }}
                </a>
            </div>
            <div>
                <span>EMAIL</span>
                <a href="mailto:{{ $c('shared.contact.email') }}">
                    {{ $c('shared.contact.email') }}
                </a>
            </div>
            <div>
                <span>CAKUPAN PERJALANAN</span>
                <p>
                    Bali &middot; Jawa &middot; Nusa Tenggara &middot; Sulawesi
                    &middot; Sumatra &middot; Maluku &middot; Papua dan rute Indonesia lainnya
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Navigasi footer dan akses login admin. --}}
<footer class="ad-footer" style="--ad-footer-color: {{ $c('shared.footer.footer_color') }}">
    <div class="shell ad-footer__top">
        <div>
            <a class="ad-footer__brand" href="{{ route('home') }}">
                TRAVEL<span>INDO</span>
            </a>
            <p>{{ $c('shared.brand.tagline') }}</p>
        </div>

        <div>
            <p>RUTE POPULER</p>
            <address>{!! nl2br(e($c('shared.footer.popular_routes'))) !!}</address>
        </div>

        <div class="ad-footer__menu">
            <p>MENU</p>
            <a href="{{ route('about') }}">Tentang kami</a>
            <a href="{{ route('home') }}#layanan">Spesialisasi</a>
            <a href="{{ route('home') }}#galeri">Galeri</a>
            <a href="{{ route('home') }}#konsultasi">Konsultasi</a>
            <a href="{{ route('admin.login') }}" target="_blank">Login Admin</a>
        </div>

        <div>
            <p>KONTAK</p>
            <a href="https://wa.me/{{ $whatsAppNumber }}" target="_blank" rel="noopener noreferrer">
                WhatsApp &middot; {{ $c('shared.contact.phone') }}
            </a>
        </div>
    </div>

    <div class="shell ad-footer__bottom">
        <span>&copy; {{ date('Y') }} Travel Indo</span>
        <a href="#top">Kembali ke atas &#8593;</a>
    </div>
</footer>

{{-- Tombol WhatsApp yang tetap tersedia saat halaman digulir. --}}
<a
    class="ad-whatsapp-float"
    href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppMessage }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Hubungi Travel Indo melalui WhatsApp"
>
    <img src="{{ $webResources->url('whatsapp-icon') }}" alt="">
</a>

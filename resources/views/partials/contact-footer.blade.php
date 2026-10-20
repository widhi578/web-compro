@php
    $c = $contentValue;
    $whatsAppNumber = preg_replace('/\D+/', '', $c('shared.contact.phone_link'));
    $whatsAppMessage = rawurlencode($c('shared.contact.message'));
@endphp

<section class="ad-contact" id="konsultasi" aria-labelledby="contact-title">
    <div class="shell ad-contact__grid">
        <div>
            <p class="ad-index">RENCANAKAN BERSAMA</p>
            <h2 id="contact-title">Ke mana pun tujuannya,<br><i>mari cari jalannya.</i></h2>
            <p>Ceritakan waktu, jumlah orang, dan bayangan perjalanan Anda. Kami akan bantu merangkai rute yang cocok.</p>
            <a class="ad-button" href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppMessage }}" target="_blank" rel="noopener noreferrer">{{ $c('shared.contact.consultation') }} <span aria-hidden="true">↗</span></a>
        </div>
        <div class="ad-contact__details">
            <div><span>UNTUK PERENCANAAN</span><a href="https://wa.me/{{ $whatsAppNumber }}" target="_blank" rel="noopener noreferrer">WhatsApp Travel Indo · {{ $c('shared.contact.phone') }}</a></div>
            <div><span>EMAIL</span><a href="mailto:{{ $c('shared.contact.email') }}">{{ $c('shared.contact.email') }}</a></div>
            <div><span>CAKUPAN PERJALANAN</span><p>Bali · Jawa · Nusa Tenggara · Sulawesi · Sumatra · Maluku · Papua dan rute Indonesia lainnya</p></div>
        </div>
    </div>
</section>

<footer class="ad-footer">
    <div class="shell ad-footer__top">
        <div><a class="ad-footer__brand" href="{{ route('home') }}">TRAVEL<span>INDO</span></a><p>{{ $c('shared.brand.tagline') }}</p></div>
        <div><p>RUTE POPULER</p><address>{!! nl2br(e($c('shared.footer.popular_routes'))) !!}</address></div>
        <div class="ad-footer__menu"><p>MENU</p><a href="{{ route('about') }}">Tentang kami</a><a href="{{ route('home') }}#layanan">Spesialisasi</a><a href="{{ route('home') }}#galeri">Galeri</a><a href="{{ route('home') }}#konsultasi">Konsultasi</a></div>
        <div><p>KONTAK</p><a href="https://wa.me/{{ $whatsAppNumber }}" target="_blank" rel="noopener noreferrer">WhatsApp · {{ $c('shared.contact.phone') }}</a></div>
    </div>
    <div class="shell ad-footer__bottom"><span>© {{ date('Y') }} Travel Indo</span><a href="#top">Kembali ke atas ↑</a></div>
</footer>

<a class="ad-whatsapp-float" href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppMessage }}" target="_blank" rel="noopener noreferrer" aria-label="Hubungi Travel Indo melalui WhatsApp"><img src="{{ asset('assets/whatsapp.png') }}" alt=""></a>

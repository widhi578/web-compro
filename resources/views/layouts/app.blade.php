<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Indo')</title>
    <meta name="description" content="Travel Indo — perjalanan Indonesia yang dirancang lebih terasa.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="site-nav shell">
            <a class="brand" href="{{ route('home') }}" aria-label="Travel Indo, beranda">
                <span class="brand__name">travel<span>indo</span></span>
            </a>

            <nav class="site-nav__links" aria-label="Navigasi utama">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    <li><a href="{{ route('services') }}">Layanan</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                </ul>
            </nav>

            <a class="button button--nav" href="{{ route('contact') }}">Konsultasi <span aria-hidden="true">↗</span></a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>

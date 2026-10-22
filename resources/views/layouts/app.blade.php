<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Indo')</title>
    <meta
        name="description"
        content="Travel Indo — perjalanan Indonesia yang dirancang lebih terasa."
    >

    <link rel="icon" href="{{ $webResources->url('site-favicon') }}" type="image/svg+xml">

    {{-- Font dan stylesheet utama website. --}}
    @foreach ($webResources->preconnects() as $preconnect)
        <link rel="preconnect" href="{{ $preconnect['href'] }}" @if ($preconnect['crossorigin']) crossorigin @endif>
    @endforeach
    <link
        href="{{ $webResources->fontStylesheet() }}"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="{{ $webResources->url('public-styles') }}">
</head>
<body>
    {{-- Navigasi utama dan submenu kategori layanan. --}}
    <header class="site-header">
        <div class="site-nav shell">
            <a class="brand" href="{{ route('home') }}" aria-label="Travel Indo, beranda">
                <span class="brand__name">travel<span>indo</span></span>
            </a>

            <button
                class="site-nav__toggle"
                type="button"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="primary-navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav
                class="site-nav__links"
                id="primary-navigation"
                aria-label="Navigasi utama"
            >
                <ul>
                    <li>
                        <a
                            href="{{ route('home') }}"
                            @class(['is-active' => request()->routeIs('home')])
                            @if (request()->routeIs('home')) aria-current="page" @endif
                        >Home</a>
                    </li>
                    <li>
                        <a
                            href="{{ route('about') }}"
                            @class(['is-active' => request()->routeIs('about')])
                            @if (request()->routeIs('about')) aria-current="page" @endif
                        >About Us</a>
                    </li>
                    <li class="site-nav__item--services">
                        <div class="site-nav__services-link">
                            <a
                                href="{{ route('services') }}"
                                @class([
                                    'is-active' => request()->routeIs(
                                        'services',
                                        'blog.nature',
                                        'blog.culture',
                                        'blog.tips',
                                    ),
                                ])
                                @if (request()->routeIs('services', 'blog.nature', 'blog.culture', 'blog.tips'))
                                    aria-current="page"
                                @endif
                            >Our Services</a>
                            <button
                                class="site-nav__submenu-toggle"
                                type="button"
                                aria-label="Tampilkan submenu Our Services"
                                aria-expanded="false"
                                aria-controls="services-submenu"
                            >
                                <span aria-hidden="true"></span>
                            </button>
                        </div>

                        <ul class="site-nav__submenu" id="services-submenu" aria-label="Kategori layanan">
                            <li><a href="{{ route('blog.nature') }}">Alam &amp; Petualangan</a></li>
                            <li><a href="{{ route('blog.culture') }}">Budaya &amp; Rasa Lokal</a></li>
                            <li><a href="{{ route('blog.tips') }}">Tips Perjalanan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a
                            href="{{ route('gallery') }}"
                            @class(['is-active' => request()->routeIs('gallery')])
                            @if (request()->routeIs('gallery')) aria-current="page" @endif
                        >Gallery</a>
                    </li>
                    <li>
                        <a
                            href="{{ route('contact') }}"
                            @class(['is-active' => request()->routeIs('contact')])
                            @if (request()->routeIs('contact')) aria-current="page" @endif
                        >Contact Us</a>
                    </li>
                    <li>
                        <a
                            href="{{ route('blog') }}"
                            @class(['is-active' => request()->routeIs('blog')])
                            @if (request()->routeIs('blog')) aria-current="page" @endif
                        >Blog</a>
                    </li>
                </ul>

                <a class="button button--nav" href="{{ route('contact') }}">
                    Konsultasi <span aria-hidden="true">&#8599;</span>
                </a>
            </nav>
        </div>
    </header>

    {{-- Konten halaman diisi oleh view turunan. --}}
    <main>
        @yield('content')
    </main>

    <script src="{{ $webResources->url('public-scripts') }}"></script>
</body>
</html>

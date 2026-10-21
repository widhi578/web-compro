<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Travel Indo')</title>

    {{-- Font dan stylesheet panel admin. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">
    {{-- Header panel dengan akses ke website publik. --}}
    <header class="admin-header">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
            TRAVEL<span>INDO</span> <small>ADMIN</small>
        </a>

        <div class="admin-header__actions">
            <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                Lihat website &#8599;
            </a>

            @auth
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            @endauth
        </div>

        @auth
            <button
                class="admin-menu-toggle"
                type="button"
                aria-label="Buka menu admin"
                aria-expanded="false"
                aria-controls="admin-sidebar"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
        @endauth
    </header>

    {{-- Sidebar untuk admin yang sudah masuk. --}}
    <div class="admin-shell @guest admin-shell--guest @endguest">
        @auth
            <aside class="admin-sidebar" id="admin-sidebar" aria-label="Menu admin">
                <a
                    href="{{ route('admin.dashboard') }}"
                    @class(['is-active' => request()->routeIs('admin.dashboard')])
                    @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif
                >
                    Ringkasan
                </a>

                <p>KELOLA WEBSITE</p>

                @foreach (config('cms.pages') as $key => $page)
                    <a
                        href="{{ route('admin.content.edit', $key) }}"
                        @class([
                            'is-active' => request()->routeIs('admin.content.edit') && request()->route('page') === $key,
                        ])
                        @if (request()->routeIs('admin.content.edit') && request()->route('page') === $key)
                            aria-current="page"
                        @endif
                    >
                        {{ $page['label'] }}
                    </a>
                @endforeach

                <a
                    href="{{ route('admin.articles.index') }}"
                    @class(['is-active' => request()->routeIs('admin.articles.*')])
                    @if (request()->routeIs('admin.articles.*')) aria-current="page" @endif
                >
                    Artikel Blog
                </a>
            </aside>
        @endauth

        {{-- Pesan status dan isi halaman admin. --}}
        <main class="admin-main @guest admin-main--login @endguest">
            @if (session('status'))
                <div class="admin-alert admin-alert--success" role="status">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/admin-editor.js') }}" defer></script>
</body>
</html>

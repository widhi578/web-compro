<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Travel Indo')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">
    <header class="admin-header">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">TRAVEL<span>INDO</span> <small>ADMIN</small></a>
        <div class="admin-header__actions">
            <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">Lihat website ↗</a>
            @auth
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            @endauth
        </div>
    </header>
    <div class="admin-shell">
        @auth
            <aside class="admin-sidebar" aria-label="Menu admin">
                <a href="{{ route('admin.dashboard') }}">Ringkasan</a>
                <p>KELOLA WEBSITE</p>
                @foreach (config('cms.pages') as $key => $page)
                    <a href="{{ route('admin.content.edit', $key) }}">{{ $page['label'] }}</a>
                @endforeach
                <a href="{{ route('admin.articles.index') }}">Artikel Blog</a>
            </aside>
        @endauth
        <main class="admin-main @guest admin-main--login @endguest">
            @if (session('status'))
                <div class="admin-alert admin-alert--success" role="status">{{ session('status') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>

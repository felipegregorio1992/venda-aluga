<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Painel') — Daisyvane Vieira</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:600|outfit:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="brand" href="{{ route('admin.dashboard') }}">
                <span class="brand-copy">
                    <strong>Daisyvane Vieira</strong>
                    <small>Painel admin</small>
                </span>
            </a>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Visitas</a>
                <a href="{{ route('admin.properties.index') }}" class="{{ request()->routeIs('admin.properties.*') ? 'active' : '' }}">Anuncios</a>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Contatos e redes</a>
                <a href="{{ route('home') }}" target="_blank" rel="noreferrer">Ver site</a>
            </nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-gold" type="submit">Sair</button>
            </form>
        </aside>
        <div class="admin-main">
            <header class="admin-top">
                <h1>@yield('heading', 'Painel')</h1>
                <p>{{ auth()->user()->name }}</p>
            </header>
            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>

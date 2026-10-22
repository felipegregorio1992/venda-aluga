<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription ?? 'Daisyvane Vieira, corretora de imoveis em Parauapebas. Casas e apartamentos para viver bem.' }}">
    <title>@yield('title', 'Daisyvane Vieira — Corretora de Imoveis')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|outfit:400,500,600,700|great-vibes:400" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteudo</a>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}" aria-label="Daisyvane Vieira - inicio">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="Daisyvane Vieira, corretora de imoveis">
            </a>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu" data-nav-toggle>
                <span class="sr-only">Abrir menu</span>
                <span></span><span></span><span></span>
            </button>
            <nav id="menu" class="nav" data-nav>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                <a href="{{ route('properties.index') }}" class="{{ request()->routeIs('properties.*') && !request('offer') ? 'active' : '' }}">Imoveis</a>
                <a href="{{ route('buy') }}" class="{{ request('offer') === 'venda' ? 'active' : '' }}">Comprar</a>
                <a href="{{ route('rent') }}" class="{{ request('offer') === 'aluguel' ? 'active' : '' }}">Alugar</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Sobre</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contato</a>
            </nav>
            <a class="btn btn-outline-gold" href="{{ route('contact') }}">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" fill="none" stroke="currentColor" stroke-width="1.7"/></svg>
                Fale Comigo
            </a>
        </div>
    </header>

    <main id="conteudo">
        @if (session('status'))
            <div class="flash" role="status">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <a class="brand" href="{{ route('home') }}" aria-label="Daisyvane Vieira - inicio">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="Daisyvane Vieira, corretora de imoveis">
            </a>
            <nav class="footer-links">
                <a href="{{ route('home') }}">Inicio</a>
                <a href="{{ route('properties.index') }}">Imoveis</a>
                <a href="{{ route('buy') }}">Comprar</a>
                <a href="{{ route('rent') }}">Alugar</a>
                <a href="{{ route('about') }}">Sobre</a>
                <a href="{{ route('contact') }}">Contato</a>
            </nav>
            <div class="footer-social">
                <a href="{{ $site['instagram'] }}" aria-label="Instagram" target="_blank" rel="noreferrer">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                </a>
                <a href="{{ $site['facebook'] }}" aria-label="Facebook" target="_blank" rel="noreferrer">
                    <svg viewBox="0 0 24 24"><path d="M14 9h3V6h-3c-2.2 0-4 1.8-4 4v2H8v3h2v7h3v-7h3l1-3h-4v-2c0-.6.4-1 1-1z" fill="currentColor"/></svg>
                </a>
                <a href="{{ \App\Models\Setting::whatsappUrl() }}" aria-label="WhatsApp" target="_blank" rel="noreferrer">
                    <svg viewBox="0 0 24 24"><path d="M20 11.5A8.5 8.5 0 0 1 7.4 18.7L4 20l1.4-3.3A8.5 8.5 0 1 1 20 11.5z" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M9.2 8.7c.2-.5.3-.5.6-.5h.5c.2 0 .4.1.5.4l.7 1.7c.1.2 0 .4-.1.6l-.4.5c-.1.1-.1.3 0 .4.3.5.8 1 1.3 1.4.2.1.3.1.5 0l.6-.4c.2-.1.4-.1.5 0l1.6.9c.2.1.3.3.3.5v.4c0 .3-.1.5-.4.6-1.4.6-3.3.2-5.3-1.8-1.8-1.8-2.4-3.6-1.9-5.3z" fill="currentColor"/></svg>
                </a>
                <p>CRECI/PA 14366/PA</p>
            </div>
        </div>
        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} Daisyvane Vieira. Todos os direitos reservados.</p>
            <p>Parauapebas - PA</p>
        </div>
    </footer>
</body>
</html>

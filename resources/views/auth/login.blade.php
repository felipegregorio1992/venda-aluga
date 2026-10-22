<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar — Painel Daisyvane Vieira</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:600|outfit:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-body">
    <main class="login-card">
        <p class="kicker">Area administrativa</p>
        <h1>Entrar no painel</h1>
        <p class="lead">Gerencie anuncios, WhatsApp, redes sociais e acompanhe as visitas do site.</p>
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')<span class="field-error">{{ $message }}</span>@enderror
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required>
            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Manter conectado
            </label>
            <button class="btn btn-navy" type="submit">Entrar</button>
        </form>
        <a class="text-link" href="{{ route('home') }}">Voltar ao site</a>
    </main>
</body>
</html>

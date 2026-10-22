@extends('layouts.app')

@section('title', 'Contato — Daisyvane Vieira')

@section('content')
<section class="page-hero">
    <div class="container">
        <p class="kicker">Contato</p>
        <h1>Fale agora mesmo com a Daisy.</h1>
        <p class="lead">Tire duvidas, agende uma visita ou receba opcoes alinhadas ao seu momento.</p>
    </div>
</section>
<section class="section">
    <div class="container contact-grid">
        <form class="contact-form" method="POST" action="{{ route('contact.store') }}" novalidate>
            @csrf
            <label for="name">Nome</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            @error('name')<span class="field-error">{{ $message }}</span>@enderror

            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')<span class="field-error">{{ $message }}</span>@enderror

            <label for="phone">Telefone</label>
            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}">
            @error('phone')<span class="field-error">{{ $message }}</span>@enderror

            <label for="message">Mensagem</label>
            <textarea id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
            @error('message')<span class="field-error">{{ $message }}</span>@enderror

            <button class="btn btn-navy" type="submit">Enviar mensagem</button>
        </form>
        <aside class="inquiry-card">
            <h2>Canais diretos</h2>
            <p>{{ $site['phone_display'] }}</p>
            <p>{{ $site['email'] }}</p>
            <p>Belem e Ananindeua - PA</p>
            <a class="btn btn-gold" href="{{ \App\Models\Setting::whatsappUrl() }}" target="_blank" rel="noreferrer">WhatsApp</a>
        </aside>
    </div>
</section>
@endsection

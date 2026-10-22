@extends('layouts.app')

@section('title', 'Daisyvane Vieira — Imoveis Premium em Parauapebas')

@section('content')
<section class="hero">
    <div class="hero-media">
        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=2000&q=80" alt="Casa contemporanea com piscina em Parauapebas" width="1920" height="1080">
    </div>
    <div class="container hero-content">
        <p class="eyebrow light">Seu novo comeco esta aqui?</p>
        <h1>Casas e apartamentos<br>para viver bem em <em>Parauapebas.</em></h1>
        <p class="lead">Daisy Vieira conduz com seguranca, agilidade e atendimento personalizado, encontrando o imovel ideal para o seu momento.</p>
        <div class="hero-pills">
            <span>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v6c0 5-3.2 8.4-7 9.8C8.2 20.4 5 17 5 12V6l7-3z" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M9 12l2 2 4-4" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                Compra e venda com seguranca
            </span>
            <span>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 14v3a3 3 0 0 0 3 3h2M20 10V7a3 3 0 0 0-3-3h-2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M8 12a4 4 0 1 1 8 0v7H8v-7z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                Atendimento personalizado
            </span>
        </div>
        @include('partials.search-form', ['filters' => [], 'variant' => 'hero-search'])
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="kicker">Selecao de imoveis</p>
                <h2>Imoveis em destaque</h2>
            </div>
            <a class="text-link" href="{{ route('properties.index') }}">Ver todos os imoveis →</a>
        </div>
        <div class="property-grid">
            @foreach ($properties as $property)
                @include('partials.property-card')
            @endforeach
        </div>
    </div>
</section>

<section class="about-band">
    <div class="container about-grid">
        @include('partials.portrait-carousel')
        <div class="about-copy">
            <p class="kicker gold">A corretora</p>
            <h2>Daisy Vieira</h2>
            <p>Atendimento proximo, discreto e profissional para familias e investidores que buscam o imovel certo em Parauapebas. Da visita, proposta e contrato e conduzido com clareza e cuidado.</p>
            <div class="stat-cards">
                <article>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V10l8-6 8 6v10H14v-6H10v6H4z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                    <span>Imoveis a venda e locacao</span>
                </article>
                <article>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v6c0 5-3.2 8.4-7 9.8C8.2 20.4 5 17 5 12V6l7-3z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                    <span>Suporte completo na negociacao</span>
                </article>
                <article>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 12l3 3 7-7" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                    <span>CRECI F 14366/PA</span>
                </article>
            </div>
            <div class="about-actions">
                <a class="btn btn-gold" href="{{ \App\Models\Setting::whatsappUrl('Ola Daisy, vim pelo site e quero conversar.') }}" target="_blank" rel="noreferrer">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5A8.5 8.5 0 0 1 7.4 18.7L4 20l1.4-3.3A8.5 8.5 0 1 1 20 11.5z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                    Converse com a Daisy
                </a>
                <p class="signature">Daisy Vieira</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="kicker">Por que escolher a Daisyvane Vieira?</p>
        <h2>Do primeiro contato a chave na mao</h2>
        <div class="why-grid">
            <article>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v6c0 5-3.2 8.4-7 9.8C8.2 20.4 5 17 5 12V6l7-3z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                <h3>Seguranca</h3>
                <p>Toda a documentacao e processo com total transparencia.</p>
            </article>
            <article>
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3.2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M5 19c1.2-3.2 3.6-5 7-5s5.8 1.8 7 5" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                <h3>Atendimento personalizado</h3>
                <p>Cada cliente e unico e merece um atendimento exclusivo.</p>
            </article>
            <article>
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 8v4l3 2" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                <h3>Agilidade</h3>
                <p>Facilitamos cada etapa para voce conquistar seu imovel com tranquilidade.</p>
            </article>
            <article>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 14c0-2 1.8-3.5 4-3.5s4 1.5 4 3.5M7 20h10M9 8V5h6v3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M8 11h8v9H8z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                <h3>Experiencia no mercado</h3>
                <p>Conhecimento local e ampla rede de contatos em Parauapebas e regiao.</p>
            </article>
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="cta-media">
        <img src="https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?auto=format&fit=crop&w=1800&q=80" alt="Skyline noturno de Parauapebas" width="1800" height="700">
    </div>
    <div class="container cta-content">
        <p class="kicker gold">Vamos encontrar o seu imovel?</p>
        <h2>Fale agora mesmo com a Daisy!</h2>
        <p>Tire suas duvidas, agende uma visita ou receba as melhores opcoes do mercado.</p>
        <a class="btn btn-gold" href="{{ route('contact') }}">Entrar em contato</a>
        <ul class="cta-contacts">
            <li>{{ $site['phone_display'] }}</li>
            <li>{{ $site['email'] }}</li>
        </ul>
        <p class="signature light">Seu sonho e o nosso compromisso.</p>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Sobre — Daisyvane Vieira')

@section('content')
<section class="page-hero">
    <div class="container">
        <p class="kicker">Sobre</p>
        <h1>Atendimento proximo, discreto e profissional.</h1>
        <p class="lead">Daisy Vieira conduz compra, venda e locacao em Parauapebas com clareza em cada etapa: visita, proposta e contrato.</p>
    </div>
</section>
<section class="about-band compact">
    <div class="container about-grid">
        @include('partials.portrait-carousel')
        <div class="about-copy">
            <p class="kicker gold">A corretora</p>
            <h2>Daisy Vieira</h2>
            <p>Trabalho com familias e investidores que buscam o imovel certo, sem pressa e sem ruído. O processo e conduzido com transparencia, documentacao organizada e negociacao atenta ao que realmente importa para voce.</p>
            <div class="stat-cards">
                <article><span>Imoveis a venda e locacao</span></article>
                <article><span>Suporte completo na negociacao</span></article>
                <article><span>CRECI F 14366/PA</span></article>
            </div>
            <a class="btn btn-gold" href="{{ route('contact') }}">Falar com a Daisy</a>
        </div>
    </div>
</section>
@endsection

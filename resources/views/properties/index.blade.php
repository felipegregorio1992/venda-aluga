@extends('layouts.app')

@section('title', $heading.' — Daisyvane Vieira')

@section('content')
<section class="page-hero">
    <div class="container">
        <p class="kicker">Catalogo</p>
        <h1>{{ $heading }}</h1>
        <p class="lead">Casas, apartamentos e coberturas selecionados em Parauapebas.</p>
        @include('partials.search-form')
    </div>
</section>

<section class="section">
    <div class="container">
        @if ($properties->isEmpty())
            <div class="empty">
                <h2>Nenhum imovel encontrado</h2>
                <p>Ajuste a busca ou fale com a Daisy para receber opcoes personalizadas.</p>
                <a class="btn btn-navy" href="{{ route('contact') }}">Falar com a Daisy</a>
            </div>
        @else
            <div class="property-grid">
                @foreach ($properties as $property)
                    @include('partials.property-card')
                @endforeach
            </div>
            <div class="pagination-wrap">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</section>
@endsection

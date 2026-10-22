@extends('layouts.app')

@section('title', $property->title.' — Daisyvane Vieira')

@section('content')
<section class="property-hero">
    <img src="{{ $property->image }}" alt="{{ $property->title }}" width="1600" height="900">
</section>
<section class="section">
    <div class="container property-detail">
        <div>
            <span class="badge {{ $property->offer }}">{{ $property->offer_label }}</span>
            <p class="price xl">{{ $property->formatted_price }}</p>
            <h1>{{ $property->title }}</h1>
            <p class="location">{{ $property->location }} · Codigo {{ $property->code }}</p>
            <ul class="meta large">
                <li>{{ $property->bedrooms }} quartos</li>
                <li>{{ $property->bathrooms }} banheiros</li>
                <li>{{ $property->area }} m²</li>
                <li>{{ ucfirst($property->type) }}</li>
            </ul>
            <p class="lead">{{ $property->description }}</p>
        </div>
        <aside class="inquiry-card">
            <h2>Tenho interesse</h2>
            <p>A Daisy retorna com agilidade para agendar visita ou enviar mais detalhes.</p>
            <a class="btn btn-gold" href="{{ \App\Models\Setting::whatsappUrl('Ola Daisy, tenho interesse no imovel '.$property->code) }}" target="_blank" rel="noreferrer">WhatsApp</a>
            <a class="btn btn-navy" href="{{ route('contact') }}">Enviar mensagem</a>
        </aside>
    </div>
</section>
@if ($related->isNotEmpty())
<section class="section alt">
    <div class="container">
        <h2>Voce tambem pode gostar</h2>
        <div class="property-grid">
            @foreach ($related as $property)
                @include('partials.property-card')
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

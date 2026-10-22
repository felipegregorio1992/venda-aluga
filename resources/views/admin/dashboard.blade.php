@extends('layouts.admin')

@section('title', 'Visitas')
@section('heading', 'Monitoramento de acessos')

@section('content')
<section class="admin-stats">
    <article>
        <p>Hoje</p>
        <strong>{{ $stats['today'] }}</strong>
        <small>{{ $stats['unique_today'] }} visitantes unicos</small>
    </article>
    <article>
        <p>Ultimos 7 dias</p>
        <strong>{{ $stats['week'] }}</strong>
        <small>{{ $stats['unique_week'] }} visitantes unicos</small>
    </article>
    <article>
        <p>Este mes</p>
        <strong>{{ $stats['month'] }}</strong>
        <small>acessos acumulados</small>
    </article>
    <article>
        <p>Total</p>
        <strong>{{ $stats['total'] }}</strong>
        <small>{{ $stats['unique_total'] }} pessoas distintas</small>
    </article>
</section>

<section class="admin-grid">
    <div class="admin-card">
        <h2>Acessos na semana</h2>
        <ul class="chart">
            @forelse ($stats['daily'] as $day)
                <li>
                    <span>{{ $day['date'] }}</span>
                    <div class="bar" style="--value: {{ max(8, min(100, $day['views'] * 8)) }}%"></div>
                    <strong>{{ $day['views'] }}</strong>
                    <small>{{ $day['visitors'] }} unicos</small>
                </li>
            @empty
                <li>Ainda nao ha visitas registradas.</li>
            @endforelse
        </ul>
    </div>
    <div class="admin-card">
        <h2>Paginas mais visitadas</h2>
        <ul class="plain-list">
            @forelse ($stats['top_pages'] as $page)
                <li><span>{{ $page->path }}</span><strong>{{ $page->views }}</strong></li>
            @empty
                <li>Nenhuma pagina registrada ainda.</li>
            @endforelse
        </ul>
        <p class="muted">Anuncios no ar: {{ $propertiesCount }} · Destaques: {{ $featuredCount }}</p>
    </div>
</section>
@endsection

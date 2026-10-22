<form class="search-bar {{ $variant ?? '' }}" action="{{ route('properties.index') }}" method="GET" role="search">
    <label class="sr-only" for="q">Bairro, codigo ou titulo</label>
    <div class="search-field">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="1.8"/></svg>
        <input id="q" type="search" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Bairro, codigo ou titulo">
    </div>
    <label class="sr-only" for="offer">Comprar ou Alugar</label>
    <select id="offer" name="offer">
        <option value="">Comprar ou Alugar</option>
        <option value="venda" @selected(($filters['offer'] ?? '') === 'venda')>Comprar</option>
        <option value="aluguel" @selected(($filters['offer'] ?? '') === 'aluguel')>Alugar</option>
    </select>
    <label class="sr-only" for="type">Tipo de imovel</label>
    <select id="type" name="type">
        <option value="">Tipo de imovel</option>
        <option value="casa" @selected(($filters['type'] ?? '') === 'casa')>Casa</option>
        <option value="apartamento" @selected(($filters['type'] ?? '') === 'apartamento')>Apartamento</option>
        <option value="cobertura" @selected(($filters['type'] ?? '') === 'cobertura')>Cobertura</option>
    </select>
    <button class="btn btn-navy" type="submit">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="1.8"/></svg>
        Buscar
    </button>
</form>

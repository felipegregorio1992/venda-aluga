@if ($paginator->hasPages())
    <nav class="pager" aria-label="Paginacao">
        @if ($paginator->onFirstPage())
            <span class="disabled">Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">Anterior</a>
        @endif

        <span>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Proxima</a>
        @else
            <span class="disabled">Proxima</span>
        @endif
    </nav>
@endif

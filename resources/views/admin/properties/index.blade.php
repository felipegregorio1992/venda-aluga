@extends('layouts.admin')

@section('title', 'Anuncios')
@section('heading', 'Anuncios de imoveis')

@section('content')
<div class="admin-toolbar">
    <p>{{ $properties->total() }} anuncios cadastrados</p>
    <a class="btn btn-gold" href="{{ route('admin.properties.create') }}">Novo anuncio</a>
</div>
<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Imovel</th>
                <th>Oferta</th>
                <th>Preco</th>
                <th>Destaque</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($properties as $property)
                <tr>
                    <td>
                        <strong>{{ $property->title }}</strong>
                        <small>{{ $property->code }} · {{ $property->location }}</small>
                    </td>
                    <td>{{ $property->offer_label }}</td>
                    <td>{{ $property->formatted_price }}</td>
                    <td>{{ $property->featured ? 'Sim' : 'Nao' }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.properties.edit', $property) }}">Editar</a>
                        <form method="POST" action="{{ route('admin.properties.destroy', $property) }}" onsubmit="return confirm('Remover este anuncio?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum anuncio cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination-wrap">{{ $properties->links() }}</div>
</div>
@endsection

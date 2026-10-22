@extends('layouts.admin')

@section('title', 'Editar anuncio')
@section('heading', 'Editar anuncio')

@section('content')
<div class="admin-card">
    @include('admin.properties.form', [
        'action' => route('admin.properties.update', $property),
        'method' => 'PUT',
        'submit' => 'Salvar alteracoes',
    ])
</div>
@endsection

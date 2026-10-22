@extends('layouts.admin')

@section('title', 'Novo anuncio')
@section('heading', 'Criar anuncio')

@section('content')
<div class="admin-card">
    @include('admin.properties.form', [
        'action' => route('admin.properties.store'),
        'method' => 'POST',
        'submit' => 'Publicar anuncio',
    ])
</div>
@endsection

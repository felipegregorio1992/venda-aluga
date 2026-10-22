@extends('layouts.admin')

@section('title', 'Contatos e redes')
@section('heading', 'WhatsApp e redes sociais')

@section('content')
<div class="admin-card">
    <form class="admin-form" method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')
        <label for="whatsapp">Numero do WhatsApp (com DDI e DDD)</label>
        <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp']) }}" required>
        @error('whatsapp')<span class="field-error">{{ $message }}</span>@enderror
        <p class="help">Exemplo: 5591999999999. Esse numero alimenta todos os botoes do site.</p>

        <label for="phone_display">Telefone exibido no site</label>
        <input id="phone_display" type="text" name="phone_display" value="{{ old('phone_display', $settings['phone_display']) }}" required>

        <label for="email">E-mail de contato</label>
        <input id="email" type="email" name="email" value="{{ old('email', $settings['email']) }}" required>

        <label for="instagram">Link do Instagram</label>
        <input id="instagram" type="url" name="instagram" value="{{ old('instagram', $settings['instagram']) }}" required>
        @error('instagram')<span class="field-error">{{ $message }}</span>@enderror

        <label for="facebook">Link do Facebook</label>
        <input id="facebook" type="url" name="facebook" value="{{ old('facebook', $settings['facebook']) }}" required>
        @error('facebook')<span class="field-error">{{ $message }}</span>@enderror

        <button class="btn btn-navy" type="submit">Salvar configuracoes</button>
    </form>
</div>
@endsection

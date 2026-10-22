<form class="admin-form" method="POST" action="{{ $action }}">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif
    <label for="title">Titulo</label>
    <input id="title" type="text" name="title" value="{{ old('title', $property->title) }}" required>
    @error('title')<span class="field-error">{{ $message }}</span>@enderror

    <div class="form-row">
        <div>
            <label for="code">Codigo</label>
            <input id="code" type="text" name="code" value="{{ old('code', $property->code) }}" placeholder="DV-2411">
        </div>
        <div>
            <label for="offer">Oferta</label>
            <select id="offer" name="offer">
                <option value="venda" @selected(old('offer', $property->offer) === 'venda')>Venda</option>
                <option value="aluguel" @selected(old('offer', $property->offer) === 'aluguel')>Aluguel</option>
            </select>
        </div>
        <div>
            <label for="type">Tipo</label>
            <select id="type" name="type">
                <option value="casa" @selected(old('type', $property->type) === 'casa')>Casa</option>
                <option value="apartamento" @selected(old('type', $property->type) === 'apartamento')>Apartamento</option>
                <option value="cobertura" @selected(old('type', $property->type) === 'cobertura')>Cobertura</option>
            </select>
        </div>
    </div>

    <label for="description">Descricao</label>
    <textarea id="description" name="description" rows="5" required>{{ old('description', $property->description) }}</textarea>
    @error('description')<span class="field-error">{{ $message }}</span>@enderror

    <div class="form-row">
        <div>
            <label for="price">Preco (somente numeros)</label>
            <input id="price" type="number" name="price" min="1" value="{{ old('price', $property->price) }}" required>
        </div>
        <div>
            <label for="area">Area m²</label>
            <input id="area" type="number" name="area" min="1" value="{{ old('area', $property->area) }}" required>
        </div>
        <div>
            <label for="bedrooms">Quartos</label>
            <input id="bedrooms" type="number" name="bedrooms" min="0" value="{{ old('bedrooms', $property->bedrooms) }}" required>
        </div>
        <div>
            <label for="bathrooms">Banheiros</label>
            <input id="bathrooms" type="number" name="bathrooms" min="0" value="{{ old('bathrooms', $property->bathrooms) }}" required>
        </div>
    </div>

    <div class="form-row">
        <div>
            <label for="neighborhood">Bairro</label>
            <input id="neighborhood" type="text" name="neighborhood" value="{{ old('neighborhood', $property->neighborhood) }}" required>
        </div>
        <div>
            <label for="city">Cidade</label>
            <input id="city" type="text" name="city" value="{{ old('city', $property->city) }}" required>
        </div>
        <div>
            <label for="state">UF</label>
            <input id="state" type="text" name="state" maxlength="2" value="{{ old('state', $property->state) }}" required>
        </div>
    </div>

    <label for="image">URL da foto</label>
    <input id="image" type="url" name="image" value="{{ old('image', $property->image) }}" placeholder="https://...">
    @error('image')<span class="field-error">{{ $message }}</span>@enderror

    <label class="remember">
        <input type="checkbox" name="featured" value="1" @checked(old('featured', $property->featured))>
        Mostrar em destaque na home
    </label>

    <div class="form-actions">
        <button class="btn btn-navy" type="submit">{{ $submit }}</button>
        <a class="btn btn-outline-gold" href="{{ route('admin.properties.index') }}">Cancelar</a>
    </div>
</form>

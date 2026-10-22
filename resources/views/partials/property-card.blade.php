<article class="property-card">
    <a class="card-media" href="{{ route('properties.show', $property) }}">
        <img src="{{ $property->image }}" alt="{{ $property->title }}" width="640" height="420" loading="lazy">
        <span class="badge {{ $property->offer }}">{{ $property->offer_label }}</span>
        <span class="fav" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M12 20s-7-4.4-9.5-8.2C.6 8.8 2.2 5 6 5c2 0 3.4 1.1 4 2.1C10.6 6.1 12 5 14 5c3.8 0 5.4 3.8 3.5 6.8C19 15.6 12 20 12 20z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </span>
    </a>
    <div class="card-body">
        <p class="price">{{ $property->formatted_price }}</p>
        <h3><a href="{{ route('properties.show', $property) }}">{{ $property->title }}</a></h3>
        <p class="location">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.2" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
            {{ $property->location }}
        </p>
        <ul class="meta">
            <li>{{ $property->bedrooms }} quartos</li>
            <li>{{ $property->bathrooms }} banheiros</li>
            <li>{{ $property->area }} m²</li>
        </ul>
    </div>
</article>

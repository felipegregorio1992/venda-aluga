<div class="portrait" data-carousel>
    <div class="carousel-track">
        <figure class="carousel-slide is-active">
            <img src="{{ asset('images/daisy-1.jpg') }}" alt="Daisy Vieira em retrato profissional" width="640" height="800">
        </figure>
        <figure class="carousel-slide">
            <img src="{{ asset('images/daisy-2.jpg') }}" alt="Daisy Vieira entregando a chave do imovel" width="640" height="800">
        </figure>
    </div>
    <button class="carousel-btn prev" type="button" data-carousel-prev aria-label="Foto anterior">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="1.8"/></svg>
    </button>
    <button class="carousel-btn next" type="button" data-carousel-next aria-label="Proxima foto">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="1.8"/></svg>
    </button>
    <div class="carousel-dots" role="tablist" aria-label="Fotos da Daisy">
        <button type="button" class="is-active" data-carousel-dot="0" aria-label="Foto 1"></button>
        <button type="button" data-carousel-dot="1" aria-label="Foto 2"></button>
    </div>
</div>

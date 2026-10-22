import './bootstrap';

const toggle = document.querySelector('[data-nav-toggle]');
const nav = document.querySelector('[data-nav]');

if (toggle && nav) {
    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('open');
        toggle.setAttribute('aria-expanded', String(open));
    });
}

document.querySelectorAll('[data-carousel]').forEach((carousel) => {
    const slides = [...carousel.querySelectorAll('.carousel-slide')];
    const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let index = 0;
    let timer;

    const show = (next) => {
        index = (next + slides.length) % slides.length;
        slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index));
        dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
    };

    const start = () => {
        if (reduceMotion) {
            return;
        }
        stop();
        timer = window.setInterval(() => show(index + 1), 4500);
    };

    const stop = () => window.clearInterval(timer);

    carousel.querySelector('[data-carousel-prev]')?.addEventListener('click', () => {
        show(index - 1);
        start();
    });
    carousel.querySelector('[data-carousel-next]')?.addEventListener('click', () => {
        show(index + 1);
        start();
    });
    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            show(Number(dot.dataset.carouselDot));
            start();
        });
    });

    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);
    start();
});

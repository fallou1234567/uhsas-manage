document.addEventListener('DOMContentLoaded', () => {
    const slides = [...document.querySelectorAll('.hero-slide')];
    const dots = [...document.querySelectorAll('.slider-dot')];
    const progress = document.querySelector('.hero-progress span');
    const previous = document.querySelector('.slider-prev');
    const next = document.querySelector('.slider-next');
    const slider = document.querySelector('.hero-slider');
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-nav');

    let current = 0;
    let interval;
    const delay = 6000;

    function showSlide(index) {
        if (!slides.length) return;

        current = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === current);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);
        });

        if (progress) {
            progress.classList.remove('running');
            void progress.offsetWidth;
            progress.classList.add('running');
        }
    }

    function startAutoplay() {
        clearInterval(interval);
        if (slides.length > 1) {
            interval = setInterval(() => showSlide(current + 1), delay);
        }
    }

    if (slides.length) {
        showSlide(0);
        startAutoplay();

        next?.addEventListener('click', () => {
            showSlide(current + 1);
            startAutoplay();
        });

        previous?.addEventListener('click', () => {
            showSlide(current - 1);
            startAutoplay();
        });

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                showSlide(i);
                startAutoplay();
            });
        });

        slider?.addEventListener('mouseenter', () => clearInterval(interval));
        slider?.addEventListener('mouseleave', startAutoplay);
    }

    menuToggle?.addEventListener('click', () => {
        const isOpen = navigation.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', String(isOpen));
        menuToggle.setAttribute(
            'aria-label',
            isOpen ? 'Fermer le menu' : 'Ouvrir le menu'
        );
    });

    navigation?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navigation.classList.remove('open');
            menuToggle?.setAttribute('aria-expanded', 'false');
        });
    });
});
import './bootstrap';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function initRevealAnimations() {
    const elements = document.querySelectorAll('.reveal');

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        elements.forEach((element) => element.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.16 });

    elements.forEach((element) => observer.observe(element));
}

function initCounters() {
    const counters = document.querySelectorAll('.counter');

    const animateCounter = (counter) => {
        const target = Number(counter.dataset.count || 0);
        const duration = 1300;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            counter.textContent = Math.round(target * eased).toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    };

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        counters.forEach((counter) => {
            counter.textContent = Number(counter.dataset.count || 0).toLocaleString();
        });
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.7 });

    counters.forEach((counter) => observer.observe(counter));
}

function initPremiumMotion() {
    const header = document.querySelector('.site-header');
    const progress = document.querySelector('.scroll-progress');
    let ticking = false;

    const updateScrollEffects = () => {
        const scrollTop = window.scrollY;
        const scrollRange = document.documentElement.scrollHeight - window.innerHeight;
        header?.classList.toggle('is-scrolled', scrollTop > 24);
        if (progress) progress.style.transform = `scaleX(${scrollRange > 0 ? scrollTop / scrollRange : 0})`;
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }, { passive: true });
    updateScrollEffects();

    if (!prefersReducedMotion && window.matchMedia('(pointer: fine)').matches) {
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach((button) => {
            button.addEventListener('pointermove', (event) => {
                const rect = button.getBoundingClientRect();
                button.style.setProperty('--mx', `${(event.clientX - rect.left) / rect.width * 100}%`);
                button.style.setProperty('--my', `${(event.clientY - rect.top) / rect.height * 100}%`);
            });
        });

        document.querySelectorAll('.home-service-card, .pricing-card, .project-card, .testimonial-card, .process-card').forEach((card) => {
            card.classList.add('premium-card');
            card.addEventListener('pointermove', (event) => {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--spot-x', `${event.clientX - rect.left}px`);
                card.style.setProperty('--spot-y', `${event.clientY - rect.top}px`);
            });
        });
    }
}

function initCarousels() {
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const id = carousel.dataset.carousel;
        const track = carousel.querySelector('.carousel-track');
        const cards = [...carousel.querySelectorAll('.carousel-card')];
        const dotsRoot = document.querySelector(`[data-carousel-dots="${id}"]`);
        const controls = document.querySelector(`[data-carousel-controls="${id}"]`);
        let index = 0;
        let maxIndex = 0;
        let timer;

        if (!track || cards.length === 0) {
            return;
        }

        const getPerView = () => {
            if (window.innerWidth < 641) return 1;
            if (window.innerWidth < 1025) return 2;
            return 4;
        };

        const getGap = () => Number.parseFloat(getComputedStyle(track).gap) || 0;

        const renderDots = () => {
            if (!dotsRoot) return;
            dotsRoot.innerHTML = '';

            for (let dotIndex = 0; dotIndex <= maxIndex; dotIndex += 1) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.setAttribute('aria-label', `Go to slide ${dotIndex + 1}`);
                dot.addEventListener('click', () => {
                    goTo(dotIndex);
                    restartAutoplay();
                });
                dotsRoot.appendChild(dot);
            }
        };

        const update = () => {
            const cardWidth = cards[0].getBoundingClientRect().width;
            const offset = index * (cardWidth + getGap());
            track.style.transform = `translateX(-${offset}px)`;

            if (dotsRoot) {
                [...dotsRoot.children].forEach((dot, dotIndex) => {
                    dot.classList.toggle('is-active', dotIndex === index);
                });
            }
        };

        const refresh = () => {
            maxIndex = Math.max(cards.length - getPerView(), 0);
            index = Math.min(index, maxIndex);
            renderDots();
            update();

            const shouldShowControls = maxIndex > 0;
            if (controls) controls.style.display = shouldShowControls ? 'flex' : 'none';
            if (dotsRoot) dotsRoot.style.display = shouldShowControls ? 'flex' : 'none';
        };

        const goTo = (nextIndex) => {
            index = nextIndex < 0 ? maxIndex : nextIndex > maxIndex ? 0 : nextIndex;
            update();
        };

        const restartAutoplay = () => {
            window.clearInterval(timer);
            if (!prefersReducedMotion && maxIndex > 0) {
                timer = window.setInterval(() => goTo(index + 1), 4200);
            }
        };

        controls?.querySelectorAll('[data-dir]').forEach((button) => {
            button.addEventListener('click', () => {
                goTo(index + Number(button.dataset.dir));
                restartAutoplay();
            });
        });

        carousel.addEventListener('mouseenter', () => window.clearInterval(timer));
        carousel.addEventListener('mouseleave', restartAutoplay);
        window.addEventListener('resize', refresh);

        refresh();
        restartAutoplay();
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initPremiumMotion();
    initRevealAnimations();
    initCounters();
    initCarousels();

    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('#mobile-menu');

    mobileMenuToggle?.addEventListener('click', () => {
        const isOpen = mobileMenu?.classList.toggle('is-open') ?? false;
        mobileMenuToggle.setAttribute('aria-expanded', String(isOpen));
    });

    mobileMenu?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('is-open');
            mobileMenuToggle?.setAttribute('aria-expanded', 'false');
        });
    });

    document.querySelectorAll('.rich-editor').forEach((editor) => {
        const source = editor.previousElementSibling;
        const toolbar = source?.previousElementSibling;

        toolbar?.querySelectorAll('[data-command]').forEach((button) => {
            button.addEventListener('click', () => {
                document.execCommand(button.dataset.command, false, button.dataset.value || null);
                source.value = editor.innerHTML;
                editor.focus();
            });
        });

        editor.addEventListener('input', () => {
            source.value = editor.innerHTML;
        });

        editor.closest('form')?.addEventListener('submit', () => {
            source.value = editor.innerHTML;
        });
    });
});

window.addEventListener('load', () => {
    window.setTimeout(() => document.querySelector('.page-loader')?.classList.add('is-hidden'), 260);
});

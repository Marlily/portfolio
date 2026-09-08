import '../css/app.css';
import Glide from '@glidejs/glide';
import AOS from 'aos/dist/aos.js';

document.addEventListener('DOMContentLoaded', () => {

    // animation AOS global settings
    AOS.init({
        once: true,
        duration: 600,
        offset: 70
    });

    // Wyłącz natywny drag obrazków w slajdach – na Safari/macOS przerywa on drag Glide
    document.querySelectorAll('.glide__slide img').forEach(img => {
        img.setAttribute('draggable', 'false');
    });

    // Drag-to-scroll dla elementów .drag-scroll
    document.querySelectorAll('.drag-scroll').forEach(el => {
        let startX, startScrollLeft, isDragging = false;

        el.addEventListener('mousedown', e => {
            isDragging = true;
            startX = e.pageX - el.offsetLeft;
            startScrollLeft = el.scrollLeft;
            el.classList.add('cursor-grabbing');
        });

        el.addEventListener('mousemove', e => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - el.offsetLeft;
            el.scrollLeft = startScrollLeft - (x - startX);
        });

        const stopDrag = () => {
            isDragging = false;
            el.classList.remove('cursor-grabbing');
        };
        el.addEventListener('mouseup', stopDrag);
        el.addEventListener('mouseleave', stopDrag);
    });

    // Kadra / Zespół – „Czytaj więcej” dla bio
    function setupBioToggle(text) {
        if (text.dataset.bioInit) return;
        text.dataset.bioInit = '1';
        const btn = text.nextElementSibling;
        if (!btn || !btn.classList.contains('bio-toggle-btn')) return;

        btn.addEventListener('click', () => {
            const isExpanding = text.classList.contains('line-clamp-6');
            text.classList.toggle('line-clamp-6');
            btn.textContent = isExpanding ? 'Zwiń' : 'Czytaj więcej';
        });
    }

    function refreshBioOverflow(root = document) {
        root.querySelectorAll('.bio-text').forEach(text => {
            setupBioToggle(text);
            const btn = text.nextElementSibling;
            if (!btn || !btn.classList.contains('bio-toggle-btn')) return;
            if (text.classList.contains('line-clamp-6')) {
                btn.classList.toggle('hidden', text.scrollHeight <= text.clientHeight + 1);
            }
        });
    }

    refreshBioOverflow();

    let bioResizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(bioResizeTimeout);
        bioResizeTimeout = setTimeout(() => refreshBioOverflow(), 150);
    });

    // Obsługa gestów trackpada (Mac) dla sliderów Glide
    function addTrackpadSupport(glide, el) {
        let locked = false;
        el.addEventListener('wheel', e => {
            if (Math.abs(e.deltaX) < Math.abs(e.deltaY)) return;
            e.preventDefault();
            if (locked || Math.abs(e.deltaX) < 15) return;
            locked = true;
            glide.go(e.deltaX > 0 ? '>' : '<');
            setTimeout(() => { locked = false; }, 600);
        }, { passive: false });
    }

    // Kadra – zakładki + Glide (homepage) / scroll anchors (team page)
    const kadraBtns   = document.querySelectorAll('.kadra-tab-btn');
    const kadraPanels = document.querySelectorAll('.kadra-tab-panel');
    const kadraGlides = {};

    function initKadraGlide(index, panel) {
        if (kadraGlides[index]) return;
        const el = panel.querySelector('.kadra-slider');
        if (!el) return;
        const glide = new Glide(el, {
            type: 'slider',
            rewind: true,
            perView: 2,
            gap: 32,
            touchAngle: 30,
            swipeThreshold: 80,
            dragThreshold: 120,
            breakpoints: { 768: { perView: 1, gap: 16 } },
        });
        glide.mount();
        addTrackpadSupport(glide, el);
        kadraGlides[index] = glide;
        refreshBioOverflow(panel);
    }

    function showKadraPanel(index) {
        const panels  = [...kadraPanels];
        const curIndex = panels.findIndex(p => !p.classList.contains('hidden'));
        if (curIndex === index) return;

        kadraBtns.forEach((btn, i) => {
            const active = i === index;
            btn.classList.toggle('text-orange-500', active);
            btn.classList.toggle('border-orange-500', active);
            btn.classList.toggle('text-white', !active);
            btn.classList.toggle('border-transparent', !active);
        });

        const cur  = panels[curIndex >= 0 ? curIndex : 0];
        const next = panels[index];

        cur.style.transition = 'opacity 200ms';
        cur.style.opacity    = '0';

        setTimeout(() => {
            cur.classList.add('hidden');
            cur.style.cssText = '';

            next.classList.remove('hidden');
            next.style.opacity = '0';

            requestAnimationFrame(() => requestAnimationFrame(() => {
                next.style.transition = 'opacity 200ms';
                next.style.opacity    = '1';
                setTimeout(() => {
                    next.style.cssText = '';
                    initKadraGlide(index, next);
                    refreshBioOverflow(next);
                }, 200);
            }));
        }, 200);
    }

    if (kadraBtns.length) {
        const scrollMode = !!document.querySelector('[data-kadra-mode="scroll"]');

        if (scrollMode) {
            const getStickyOffset = () =>
                (document.querySelector('header')?.offsetHeight ?? 80) +
                (document.querySelector('[data-kadra-tabs]')?.offsetHeight ?? 48) + 8;

            // Team page: kliknięcie zakładki → smooth scroll do sekcji
            kadraBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = document.getElementById(btn.dataset.target);
                    if (!target) return;
                    const top = target.getBoundingClientRect().top + window.scrollY - getStickyOffset();
                    window.scrollTo({ top, behavior: 'smooth' });
                });
            });

            // Podświetlanie aktywnej zakładki – scroll spy
            const setActiveTab = (id) => {
                kadraBtns.forEach(btn => {
                    const active = btn.dataset.target === id;
                    btn.classList.toggle('text-orange-500', active);
                    btn.classList.toggle('border-orange-500', active);
                    btn.classList.toggle('text-white', !active);
                    btn.classList.toggle('border-transparent', !active);
                });
            };

            const updateActiveTab = () => {
                const offset = getStickyOffset() + 10;
                let activeId = null;
                kadraPanels.forEach(panel => {
                    if (panel.getBoundingClientRect().top <= offset) activeId = panel.id;
                });
                if (activeId) setActiveTab(activeId);
            };

            window.addEventListener('scroll', updateActiveTab, { passive: true });
            updateActiveTab();

            refreshBioOverflow();

        } else {
            // Homepage: zakładki przełączają panele + Glide
            kadraBtns.forEach((btn, i) => btn.addEventListener('click', () => showKadraPanel(i)));
            if (kadraPanels[0]) initKadraGlide(0, kadraPanels[0]);
        }
    }


    // Infrastruktura – slider zdjęć
    const infraEl = document.querySelector('.infrastruktura-slider');
    if (infraEl) {
        const infraGlide = new Glide(infraEl, {
            type: 'carousel',
            perView: 1.3,
            gap: 32,
            autoplay: 3000,
            hoverpause: false,
            animationDuration: 1200,
            animationTimingFunc: 'ease-in-out',
            touchAngle: 30,
            swipeThreshold: 80,
            dragThreshold: 120,
            breakpoints: {
                1024: { perView: 1.2, gap: 24 },
                640:  { perView: 1.1, gap: 16 },
            },
        });
        infraGlide.mount();
        addTrackpadSupport(infraGlide, infraEl);
    }

    // Wizja – slider 4 filary
    const wizjaEl = document.querySelector('.wizja-slider');
    if (wizjaEl) {
        const wizjaGlide = new Glide(wizjaEl, {
            type: 'slider',
            rewind: true,
            perView: 1,
            gap: 0,
            touchAngle: 30,
            swipeThreshold: 80,
            dragThreshold: 120,
            animationDuration: 200,
            animationTimingFunc: 'ease',
        });
        wizjaGlide.mount();
        addTrackpadSupport(wizjaGlide, wizjaEl);
    }

    // Program – slider kart U10/U12/U14/U16
    const programEl = document.querySelector('.program-slider');
    if (programEl) {
        const programGlide = new Glide(programEl, {
            type: 'slider',
            rewind: false,
            perView: 4,
            perMove: 1,
            gap: 24,
            touchAngle: 30,
            swipeThreshold: 80,
            dragThreshold: 120,
            animationDuration: 300,
            animationTimingFunc: 'ease',
            breakpoints: {
                1279: { perView: 2.3, gap: 24 },
                1023: { perView: 1.5, gap: 16 },
                639:  { perView: 1.1, gap: 16 },
            },
        });
        programGlide.mount();
        addTrackpadSupport(programGlide, programEl);
    }

    // Foto – slider zdjęć (blok Gutenberga)
    document.querySelectorAll('.foto-slider .glide').forEach(el => {
        const fotoGlide = new Glide(el, {
            type: 'slider',
            rewind: true,
            perView: 2,
            perMove: 1,
            gap: 32,
            autoplay: 5000,
            hoverpause: true,
            draggable: true,
            swipeThreshold: 60,
            dragThreshold: 80,
            breakpoints: {
                768: { perView: 1, gap: 16 },
            },
        });
        fotoGlide.mount();
        addTrackpadSupport(fotoGlide, el);
    });

    // Rekrutacja – slider kroków
    const rekEl = document.querySelector('.rekrutacja-slider');
    if (rekEl) {
        const rekGlide = new Glide(rekEl, {
            type: 'slider',
            rewind: true,
            perView: 3,
            gap: 32,
            touchAngle: 30,
            swipeThreshold: 80,
            dragThreshold: 120,
            peek: { before: 0, after: 80 },
            breakpoints: {
                1024: { perView: 2, gap: 24, peek: { before: 0, after: 60 } },
                640:  { perView: 1, gap: 16, peek: { before: 0, after: 48 } },
            },
        });
        rekGlide.mount();
        addTrackpadSupport(rekGlide, rekEl);
    }

    // Etapy (Miejsce) – linia postępu wypełnia się przy wejściu w viewport
    document.querySelectorAll('.etapy-progress').forEach(bar => {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    bar.style.width = `${bar.dataset.progress}%`;
                    obs.disconnect();
                }
            });
        }, { threshold: 0.4 });
        observer.observe(bar.closest('.etapy-timeline'));
    });

    // Modal: Plan treningowy
    const modalProgram = document.getElementById('modal-program');
    if (modalProgram) {
        const schedule = modalProgram.querySelector('.modal-schedule');

        const renderSchedule = (plan) => {
            if (!plan || !plan.length) {
                schedule.innerHTML = '<p class="font-inter text-white/40 text-sm">Brak danych</p>';
                return;
            }
            schedule.innerHTML = plan.map(row => {
                const godziny = (row.godziny || '').split('\n').filter(Boolean);
                const jednostki = (row.jednostki || '').split('\n').filter(Boolean);
                return `<div class="flex gap-4 min-w-[32rem]">
                    <p class="flex-1 font-inter font-semibold text-[1.0625rem]/[1.5] text-white tracking-[-0.02125rem]">${row.dzien || ''}</p>
                    <div class="flex flex-col gap-2 w-40">${godziny.map(g => `<p class="font-inter font-semibold text-[1.0625rem]/[1.5] text-white tracking-[-0.02125rem]">${g}</p>`).join('')}</div>
                    <div class="flex flex-col gap-2 w-40">${jednostki.map(j => `<p class="font-inter font-semibold text-[1.0625rem]/[1.5] text-white tracking-[-0.02125rem]">${j}</p>`).join('')}</div>
                </div>`;
            }).join('');
        };

        const openModal = (trigger) => {
            const plan = JSON.parse(trigger.dataset.plan || '[]');
            renderSchedule(plan);
            modalProgram.classList.remove('hidden');
        };
        const closeModal = () => {
            modalProgram.classList.add('hidden');
        };

        document.querySelectorAll('[data-modal-trigger="modal-program"]').forEach(trigger => {
            trigger.addEventListener('click', () => openModal(trigger));
        });

        modalProgram.querySelectorAll('.modal-close').forEach(btn => {
            btn.addEventListener('click', closeModal);
        });

        document.getElementById('modal-backdrop').addEventListener('click', e => {
            if (e.target === e.currentTarget) closeModal();
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeModal();
        });
    }

    const stickyMenu = document.querySelector('.header-menu');

    //Animation
    AOS.init({
        duration: 600
    });

})

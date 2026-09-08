import '../css/app.css';
import Glide from '@glidejs/glide'
import { initScrollReveal } from './scroll-reveal.js';

document.addEventListener('DOMContentLoaded', () => {

    initScrollReveal();

    // hamburger nav
    const navToggle = document.getElementById('nav-toggle');
    const navMenu   = document.getElementById('mobile-nav');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            const isOpen = !navMenu.classList.contains('hidden');
            navMenu.classList.toggle('hidden');
            navToggle.setAttribute('aria-expanded', String(!isOpen));
        });
    }

    // mobile submenu accordion
    document.querySelectorAll('[data-mobile-submenu-toggle]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const panel  = btn.nextElementSibling;
            const isOpen = btn.getAttribute('aria-expanded') === 'true';

            btn.setAttribute('aria-expanded', String(!isOpen));
            panel.classList.toggle('hidden');
            panel.classList.toggle('flex');
            btn.querySelector('svg')?.classList.toggle('-scale-y-100');
        });
    });

    const stickyMenu = document.querySelector('.header-menu')

    if(stickyMenu) {

        let scrollPosition;

        window.addEventListener('scroll', () => {
            scrollPosition = window.scrollY;

            if(scrollPosition > 50) {
                if(!stickyMenu.classList.contains('scrolled')) {
                    stickyMenu.classList.add('scrolled');
                }
            } else {
                stickyMenu.classList.remove('scrolled')
            }
        })
    }

    // hero slider
    if (document.querySelector('.hero-slider')) {
        new Glide('.hero-slider', {
            type: 'carousel',
            startAt: 0,
            perView: 1,
            gap: 20,
            peek: { before: 0, after: 150 },
            breakpoints: {
                1024: {
                    peek: { before: 0, after: 0 },
                },
            },
        }).mount()
    }

    // steps accordion
    document.querySelectorAll('[data-steps]').forEach((group) => {
        const steps = group.querySelectorAll('[data-step]');

        const openStep = (step) => {
            steps.forEach((s) => {
                s.removeAttribute('data-open');
                s.setAttribute('aria-expanded', 'false');
            });
            step.setAttribute('data-open', '');
            step.setAttribute('aria-expanded', 'true');
        };

        steps.forEach((step) => {
            step.addEventListener('click', () => {
                openStep(step);
            });
        });
    });

    // case studies slider
    if (document.querySelector('.casestudies-slider')) {
        new Glide('.casestudies-slider', {
            type: 'carousel',
            startAt: 0,
            perView: 2.9,
            gap: 32,
            breakpoints: {
                1024: {
                    perView: 1,
                    gap: 16,
                    peek: { before: 0, after: 40 },
                },
            },
        }).mount()
    }

    // related posts slider
    if (document.querySelector('.related-posts-slider')) {
        new Glide('.related-posts-slider', {
            type: 'carousel',
            startAt: 0,
            perView: 3,
            gap: 32,
            breakpoints: {
                1024: {
                    perView: 1,
                    gap: 16,
                },
            },
        }).mount()
    }

    // blog slider
    if (document.querySelector('.blog-slider')) {
        new Glide('.blog-slider', {
            type: 'carousel',
            startAt: 0,
            perView: 2.9,
            gap: 32,
            breakpoints: {
                1024: {
                    perView: 1,
                    gap: 16,
                },
            },
        }).mount()
    }

    // testimony slider
    if (document.querySelector('.testimony-slider')) {
        new Glide('.testimony-slider', {
            type: 'carousel',
            startAt: 0,
            perView: 3,
            gap: 32,
            autoplay: 5000,
            breakpoints: {
                1024: {
                    perView: 1,
                    gap: 16,
                },
            },
        }).mount()
    }

    // quote form: repeatable link inputs + file dropzone
    document.querySelectorAll('[data-quote-form]').forEach((form) => {
        const linksCard = form.querySelector('[data-links-card]');

        if (linksCard) {
            const rows = linksCard.querySelector('[data-links-rows]');
            const hiddenTextarea = linksCard.querySelector('textarea[name="your-links"]');
            const addButton = linksCard.querySelector('[data-add-link]');

            const syncLinks = () => {
                if (!hiddenTextarea) return;
                const values = [...rows.querySelectorAll('[data-link-input]')]
                    .map((input) => input.value.trim())
                    .filter(Boolean);
                hiddenTextarea.value = values.join('\n');
            };

            rows.addEventListener('input', syncLinks);

            addButton?.addEventListener('click', () => {
                const row = rows.querySelector('[data-link-row]').cloneNode(true);
                const input = row.querySelector('[data-link-input]');
                input.value = '';

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'absolute top-1/2 right-4 -translate-y-1/2 text-blue-gray-200 transition hover:text-orange-700';
                removeButton.setAttribute('aria-label', 'Usuń link');
                removeButton.textContent = '×';
                removeButton.addEventListener('click', () => {
                    row.remove();
                    syncLinks();
                });
                row.appendChild(removeButton);

                rows.appendChild(row);
                input.focus();
            });
        }

        const dropzone  = form.querySelector('[data-dropzone]');
        if (dropzone) {
            const fileInput  = dropzone.querySelector('input[type="file"]');
            const thumbsWrap = form.querySelector('[data-dropzone-thumbnails]');
            let dragCounter  = 0;

            const trashIcon = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 4h12M5.333 4V2.667A1.333 1.333 0 016.667 1.333h2.666A1.333 1.333 0 0110.667 2.667V4m2 0v9.333A1.333 1.333 0 0111.333 14.667H4.667A1.333 1.333 0 013.333 13.333V4h9.334z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`;

            const renderThumbnails = () => {
                if (!thumbsWrap) return;

                thumbsWrap.querySelectorAll('img').forEach(img => {
                    if (img.src.startsWith('blob:')) URL.revokeObjectURL(img.src);
                });
                thumbsWrap.innerHTML = '';

                if (!fileInput?.files.length) {
                    thumbsWrap.classList.add('hidden');
                    thumbsWrap.classList.remove('flex');
                    return;
                }

                thumbsWrap.classList.remove('hidden');
                thumbsWrap.classList.add('flex');

                [...fileInput.files].forEach((file, idx) => {
                    const item = document.createElement('div');
                    item.className = 'dropzone-thumb-item';

                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = file.name;

                    const overlay = document.createElement('div');
                    overlay.className = 'dropzone-thumb-overlay';

                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'dropzone-thumb-btn';
                    btn.setAttribute('aria-label', 'Usuń zdjęcie');
                    btn.innerHTML = trashIcon;
                    btn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        URL.revokeObjectURL(img.src);
                        const dt = new DataTransfer();
                        [...fileInput.files].forEach((f, i) => { if (i !== idx) dt.items.add(f); });
                        fileInput.files = dt.files;
                        renderThumbnails();
                    });

                    overlay.appendChild(btn);
                    item.appendChild(img);
                    item.appendChild(overlay);
                    thumbsWrap.appendChild(item);
                });
            };

            let previousFiles = [];

            dropzone.addEventListener('click', () => {
                previousFiles = fileInput?.files ? [...fileInput.files] : [];
                fileInput?.click();
            });

            fileInput?.addEventListener('change', () => {
                const dt = new DataTransfer();
                [...previousFiles, ...fileInput.files].forEach(f => dt.items.add(f));
                fileInput.files = dt.files;
                renderThumbnails();
            });

            dropzone.addEventListener('dragenter', (e) => {
                e.preventDefault();
                if (++dragCounter === 1) dropzone.dataset.dragging = '';
            });

            dropzone.addEventListener('dragover', (e) => e.preventDefault());

            dropzone.addEventListener('dragleave', () => {
                if (--dragCounter <= 0) {
                    dragCounter = 0;
                    delete dropzone.dataset.dragging;
                }
            });

            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dragCounter = 0;
                delete dropzone.dataset.dragging;

                if (!fileInput || !e.dataTransfer.files.length) return;
                const dt = new DataTransfer();
                [...(fileInput.files ?? []), ...e.dataTransfer.files].forEach(f => dt.items.add(f));
                fileInput.files = dt.files;
                renderThumbnails();
            });
        }
    });

})

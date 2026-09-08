document.addEventListener('DOMContentLoaded', () => {

    const navToggle  = document.getElementById('nav-toggle');
    const navOverlay = document.getElementById('nav-overlay');
    const iconOpen   = document.getElementById('nav-icon-open');
    const iconClose  = document.getElementById('nav-icon-close');

    let menuOpen = false;

    function openMobileMenu() {
        menuOpen = true;
        navOverlay.classList.remove('hidden');
        navOverlay.classList.add('flex');
        requestAnimationFrame(() => navOverlay.classList.remove('opacity-0'));
        iconOpen.classList.add('hidden');
        iconClose.classList.remove('hidden');
        navToggle.setAttribute('aria-expanded', 'true');
        navOverlay.setAttribute('aria-hidden', 'false');
        document.body.classList.add('overflow-hidden');
    }

    function closeMobileMenu() {
        menuOpen = false;
        navOverlay.classList.add('opacity-0');
        iconOpen.classList.remove('hidden');
        iconClose.classList.add('hidden');
        navToggle.setAttribute('aria-expanded', 'false');
        navOverlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
        setTimeout(() => {
            if (!menuOpen) {
                navOverlay.classList.remove('flex');
                navOverlay.classList.add('hidden');
            }
        }, 300);
    }

    if (navToggle && navOverlay) {
        navToggle.addEventListener('click', () => menuOpen ? closeMobileMenu() : openMobileMenu());
        navOverlay.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMobileMenu));
    }

});

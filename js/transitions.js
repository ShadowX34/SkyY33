(function () {
    'use strict';

    /* ── Page transition on link click ── */
    document.addEventListener('click', function (e) {
        var a = e.target.closest('a[href]');
        if (!a) return;
        var href = a.getAttribute('href');
        if (
            !href ||
            href.charAt(0) === '#' ||
            href.indexOf('mailto:') === 0 ||
            href.indexOf('tel:') === 0 ||
            a.target === '_blank' ||
            (href.indexOf('://') > -1 && a.hostname !== location.hostname)
        ) return;

        e.preventDefault();
        var dest = a.href;
        document.body.classList.add('page-leaving');
        setTimeout(function () { location.href = dest; }, 300);
    });

    /* ── Scroll reveal ── */
    if (!window.IntersectionObserver) return;

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            var el = entry.target;
            var delay = parseFloat(el.dataset.srDelay || 0) * 1000;

            setTimeout(function () {
                el.style.transition = 'opacity 0.55s ease, transform 0.55s ease';
                el.style.opacity    = '1';
                el.style.transform  = 'translateY(0)';
            }, delay);

            io.unobserve(el);

            el.addEventListener('transitionend', function onEnd(e) {
                if (e.propertyName !== 'opacity') return;
                el.style.transition      = '';
                el.style.opacity         = '';
                el.style.transform       = '';
                el.dataset.srDelay       = '';
                el.classList.remove('sr');
                el.removeEventListener('transitionend', onEnd);
            });
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });

    function initReveal() {
        var groups = [
            '.service-card', '.promo-card', '.news-card',
            '.team-member', '.review-card', '.faq-item',
            '.certificate-card', '.stock-card',
            '.section-header', '.about-block', '.contact-block',
            '.payment-methods', '.info-card', '.benefit-item',
            '.price-table', '.note', '.special-offer'
        ];

        groups.forEach(function (sel) {
            document.querySelectorAll(sel).forEach(function (el, i) {
                el.classList.add('sr');
                el.dataset.srDelay = String((i % 4) * 0.1);
                io.observe(el);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initReveal);
    } else {
        initReveal();
    }
})();

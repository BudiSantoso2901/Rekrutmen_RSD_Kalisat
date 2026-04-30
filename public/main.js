// ===== PRELOADER =====
window.addEventListener('load', () => {
    setTimeout(() => {
        document.getElementById('preloader')?.classList.add('hidden');
    }, 1200);
});

// ===== NAVBAR SCROLL =====
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 40) navbar?.classList.add('scrolled');
    else navbar?.classList.remove('scrolled');
    // Back to top
    const btn = document.getElementById('backToTop');
    if (window.scrollY > 300) btn?.classList.add('show');
    else btn?.classList.remove('show');
});

// ===== HAMBURGER MENU =====
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');
hamburger?.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    navLinks?.classList.toggle('open');
});
navLinks?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    hamburger?.classList.remove('open');
    navLinks?.classList.remove('open');
}));

// ===== BACK TO TOP =====
document.getElementById('backToTop')?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ===== PARTICLES =====
function createParticles() {
    const container = document.getElementById('particles');
    if (!container) return;
    for (let i = 0; i < 18; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 4 + 2;
        p.style.cssText = `
      width:${size}px; height:${size}px;
      left:${Math.random() * 100}%;
      animation-duration:${Math.random() * 10 + 8}s;
      animation-delay:${Math.random() * 8}s;
      opacity:${Math.random() * 0.5 + 0.1};
    `;
        container.appendChild(p);
    }
}
createParticles();

// ===== COUNTER ANIMATION =====
function animateCounters() {
    document.querySelectorAll('.stat-num').forEach(el => {
        const target = parseInt(el.dataset.target);
        let current = 0;
        const step = target / 60;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) { el.textContent = target; clearInterval(timer); }
            else el.textContent = Math.floor(current);
        }, 16);
    });
}

// ===== SCROLL REVEAL =====
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, idx) => {
        if (entry.isIntersecting) {
            const el = entry.target;
            const delay = el.dataset.delay ? parseInt(el.dataset.delay) * 120 : 0;
            setTimeout(() => el.classList.add('visible'), delay);
            revealObserver.unobserve(el);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// Trigger counters when hero stats visible
const statsEl = document.querySelector('.hero-stats');
if (statsEl) {
    const statsObserver = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting) { animateCounters(); statsObserver.disconnect(); }
    }, { threshold: 0.5 });
    statsObserver.observe(statsEl);
}

// ===== SWIPER (Testimonials) =====
if (typeof Swiper !== 'undefined') {
    new Swiper('.testimonial-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });
}

// ===== FAQ ACCORDION =====
document.querySelectorAll('.faq-q').forEach(q => {
    q.addEventListener('click', () => {
        const item = q.closest('.faq-item');
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    });
});

// ===== FILTER LOWONGAN =====
const searchInput = document.getElementById('searchJob');
const filterDept = document.getElementById('filterDept');
const filterType = document.getElementById('filterType');
const jobCards = document.querySelectorAll('.job-card-full');

function filterJobs() {
    const search = searchInput?.value.toLowerCase() || '';
    const dept = filterDept?.value || '';
    const type = filterType?.value || '';
    jobCards.forEach(card => {
        const title = card.dataset.title?.toLowerCase() || '';
        const department = card.dataset.dept || '';
        const jobType = card.dataset.type || '';
        const match =
            (!search || title.includes(search)) &&
            (!dept || department === dept) &&
            (!type || jobType === type);
        card.style.display = match ? '' : 'none';
    });
}

searchInput?.addEventListener('input', filterJobs);
filterDept?.addEventListener('change', filterJobs);
filterType?.addEventListener('change', filterJobs);

// ===== CONTACT FORM =====
const contactForm = document.getElementById('contactForm');
contactForm?.addEventListener('submit', e => {
    e.preventDefault();
    const btn = contactForm.querySelector('button[type=submit]');
    const original = btn.innerHTML;
    btn.innerHTML = '<i class="fa-solid fa-circle-check"></i> Terkirim!';
    btn.style.background = 'linear-gradient(135deg, #22c55e, #16a34a)';
    btn.disabled = true;
    setTimeout(() => {
        btn.innerHTML = original;
        btn.style.background = '';
        btn.disabled = false;
        contactForm.reset();
    }, 3000);
});

// ===== SMOOTH ACTIVE NAV =====
function setActiveNav() {
    const path = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-links a').forEach(a => {
        const href = a.getAttribute('href');
        if (href === path || (path === '' && href === 'index.html')) {
            a.classList.add('active');
        } else {
            a.classList.remove('active');
        }
    });
}
setActiveNav();

// ===== TOOLTIP / RIPPLE ON BUTTONS =====
document.querySelectorAll('.btn-primary, .btn-sm, .btn-apply-nav').forEach(btn => {
    btn.addEventListener('click', function (e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        ripple.style.cssText = `
      position:absolute;width:6px;height:6px;border-radius:50%;
      background:rgba(255,255,255,0.4);
      left:${e.clientX - rect.left - 3}px;top:${e.clientY - rect.top - 3}px;
      transform:scale(0);animation:rippleAnim 0.5s ease;pointer-events:none;
    `;
        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);
        ripple.addEventListener('animationend', () => ripple.remove());
    });
});

const style = document.createElement('style');
style.textContent = `@keyframes rippleAnim{to{transform:scale(40);opacity:0}}`;
document.head.appendChild(style);

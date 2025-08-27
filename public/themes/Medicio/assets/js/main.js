/**
* Template Name: Medicio (cleaned)
* Bootstrap v5.x
*/
(function () {
  "use strict";

  /* =========================
   * Helpers
   * ========================= */
  const select = (el, all = false) => {
    el = el.trim();
    if (all) return [...document.querySelectorAll(el)];
    return document.querySelector(el);
  };

  const on = (type, el, listener, all = false) => {
    const sel = select(el, all);
    if (!sel) return;
    if (all) sel.forEach(e => e.addEventListener(type, listener));
    else sel.addEventListener(type, listener);
  };

  // helper scroll listener
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener);
  };

  /* =========================
   * Scrollto (single source of truth)
   * ========================= */
  const scrollto = (hash) => {
    const target = select(hash);
    if (!target) return;
    const header = select('#header');
    const offset = header ? header.offsetHeight : 0;
    const top = target.offsetTop - offset;
    window.scrollTo({ top, behavior: 'smooth' });
  };

  /* =========================
   * Navbar links active state on scroll
   * ========================= */
  const navbarlinks = select('#navbar .scrollto', true);
  const navbarlinksActive = () => {
    const position = window.scrollY + 200;
    navbarlinks.forEach(link => {
      if (!link.hash) return;
      const section = select(link.hash);
      if (!section) return;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  };
  window.addEventListener('load', navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /* =========================
   * Mobile nav toggle & dropdown (Medicio)
   * ========================= */
  on('click', '.mobile-nav-toggle', function () {
    const navbar = select('#navbar');
    navbar.classList.toggle('navbar-mobile');
    this.classList.toggle('bi-list');
    this.classList.toggle('bi-x');
  });

  // dropdown only intercept on mobile
  on('click', '.navbar .dropdown > a', function (e) {
    const navbar = select('#navbar');
    if (navbar && navbar.classList.contains('navbar-mobile')) {
      e.preventDefault();
      this.nextElementSibling?.classList.toggle('dropdown-active');
    }
  }, true);

  /* =========================
   * Smooth scroll for .scrollto links
   * ========================= */
  on('click', '.scrollto', function (e) {
    if (this.hash && select(this.hash)) {
      e.preventDefault();
      const navbar = select('#navbar');
      if (navbar && navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile');
        const toggler = select('.mobile-nav-toggle');
        if (toggler) {
          toggler.classList.toggle('bi-list');
          toggler.classList.toggle('bi-x');
        }
      }
      scrollto(this.hash);
    }
  }, true);

  // Scroll to hash on page load
  window.addEventListener('load', () => {
    if (window.location.hash && select(window.location.hash)) {
      scrollto(window.location.hash);
    }
  });

  /* =========================
   * Header scrolled state
   * ========================= */
  const selectHeader = select('#header');
  const selectTopbar = select('#topbar');
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled');
        if (selectTopbar) selectTopbar.classList.add('topbar-scrolled');
      } else {
        selectHeader.classList.remove('header-scrolled');
        if (selectTopbar) selectTopbar.classList.remove('topbar-scrolled');
      }
    };
    window.addEventListener('load', headerScrolled);
    onscroll(document, headerScrolled);
  }

  /* =========================
   * Back to top button
   * ========================= */
  const backtotop = select('.back-to-top');
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) backtotop.classList.add('active');
      else backtotop.classList.remove('active');
    };
    window.addEventListener('load', toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  /* =========================
   * Preloader
   * ========================= */
  const preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => preloader.remove());
  }

  /* =========================
   * Hero carousel indicators
   * ========================= */
  const heroCarouselIndicators = select('#hero-carousel-indicators');
  const heroCarouselItems = select('#heroCarousel .carousel-item', true);
  if (heroCarouselIndicators && heroCarouselItems.length) {
    heroCarouselItems.forEach((_, index) => {
      heroCarouselIndicators.innerHTML +=
        `<li data-bs-target="#heroCarousel" data-bs-slide-to="${index}" class="${index === 0 ? 'active' : ''}"></li>`;
    });
  }

  /* =========================
   * Swiper sliders (init ONCE)
   * ========================= */
  if (typeof Swiper !== 'undefined') {
  // Testimonials (rapih & stabil)
const testiSwiper = new Swiper('.testimonials-slider', {
  speed: 600,
  loop: true,
  spaceBetween: 24,
  slidesPerView: 1,
  centeredSlides: false,
  grabCursor: true,

  // target pagination yg di section ini saja
  pagination: {
    el: '#testimonials .swiper-pagination',
    type: 'bullets',
    clickable: true
  },

  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },

  // jumlah slide per layar
  breakpoints: {
    768:  { slidesPerView: 2, spaceBetween: 24 },
    1200: { slidesPerView: 3, spaceBetween: 24 }
  },

  // perbaiki ukuran saat gambar/AOS/resize
  observer: true,
  observeParents: true,
  resizeObserver: true,
  on: {
    init(sw)       { sw.update(); },
    imagesReady(sw){ sw.update(); },
    resize(sw)     { sw.update(); }
  }
});



    // Gallery
    new Swiper('.gallery-slider', {
      speed: 400,
      loop: true,
      centeredSlides: true,
      autoplay: { delay: 5000, disableOnInteraction: false },
      slidesPerView: 'auto',
      pagination: { el: '.swiper-pagination', type: 'bullets', clickable: true },
      breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 20 },
        640: { slidesPerView: 3, spaceBetween: 20 },
        992: { slidesPerView: 5, spaceBetween: 20 }
      }
    });
  }

  /* =========================
   * Lightbox
   * ========================= */
  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.gallery-lightbox' });
  }

  /* =========================
   * AOS (Animate on Scroll)
   * ========================= */
  window.addEventListener('load', () => {
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 1000, easing: 'ease-in-out', once: true, mirror: false });
    }
  });

  /* =========================
   * Pure Counter
   * ========================= */
  if (typeof PureCounter !== 'undefined') new PureCounter();

})(); 

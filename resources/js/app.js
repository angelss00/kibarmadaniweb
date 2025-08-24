import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

Swiper.use([Navigation, Pagination, Autoplay]);

window.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('.slider-hero .swiper');
  if (el) {
    new Swiper(el, {
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      pagination: { el: '.swiper-pagination', clickable: true },
    });
  }
});

jQuery(window).on('load', function () {
    jQuery('.wjportal-jobs-list-wrapper').addClass('owl-carousel');
    jQuery('.brand-section .owl-carousel.wjportal-jobs-list-wrapper').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    items: 4,
    autoplay: true,
    autoplaySpeed: 200,
    smartSpeed: 600,
    navText: [
      '<i class="fas fa-chevron-left"></i>',
      '<i class="fas fa-chevron-right"></i>'
    ],
    responsive: {
      0: {
        items: 1,
      },
      767: {
        items: 2,
      },
      1200: {
        items: 3,
      },
      1400: {
        items: 4,
      }
    }
  });
});
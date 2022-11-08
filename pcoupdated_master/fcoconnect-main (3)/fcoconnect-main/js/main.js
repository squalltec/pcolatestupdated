$(document).ready(function () {
  var owl = $('.highlightside');
  var event = $('.eventsides');
  var preslides = $('.preeventslides');
  var footerslides = $('.footerslides');
  var card = $('.cardslider');
  var searchInnerBoxPillsTab = $('.nav-pills.slidrss');
  var featuredSlides = $('.featured-slider');
  var placesSlides = $('.placesSlides');
  var restSlides = $('.rest-slider');

  owl.owlCarousel({
    // items change number for slider display on desktop
    loop: true,
    autoplay: false,
    dots: false,
    nav: true,
    items: 1,
    margin: 10,
    smartSpeed: 1000,
    navText: [
      "<div class='nav-btn prev-slide'><i class='bi bi-arrow-left'></i></div>",
      "<div class='nav-btn next-slide'><i class='bi bi-arrow-right'></i></div>",
    ],
  });
  event.owlCarousel({
    // items change number for slider display on desktop
    loop: true,
    autoplay: false,
    nav: true,
    dots: false,
    items: 1,
    margin: 10,
    smartSpeed: 1000,
    navText: [
      "<div class='nav-btn prev-slide'><i class='bi bi-arrow-left'></i></div>",
      "<div class='nav-btn next-slide'><i class='bi bi-arrow-right'></i></div>",
    ],
  });
  preslides.owlCarousel({
    items: 4,
    // items change number for slider display on desktop
    loop: true,
    autoplay: false,
    nav: true,
    smartSpeed: 1000,
    margin: 15,
	responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      },
      1200:{
        items:4
    }
  }
  });
  card.owlCarousel({
    // items change number for slider display on desktop
    loop: true,
    autoplay: false,
    dots: false,
    stagePadding: 22,
    nav: true,
    smartSpeed: 1000,
    margin: 30,
    navText: [
      "<div class='nav-btn prev-slide'><i class='bi bi-chevron-left'></i></div>",
      "<div class='nav-btn next-slide'><i class='bi bi-chevron-right'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      800: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });
  footerslides.owlCarousel({
    items: 1,
    // items change number for slider display on desktop
    loop: true,
    nav: false,
    dots: true,
    smartSpeed: 1000,
    margin: 15,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
  });

  featuredSlides.owlCarousel({
    items: 1,
    loop: true,
    nav: false,
    dots: true,
    smartSpeed: 1000,
    margin: 15,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
  });

  placesSlides.owlCarousel({
    items: 4,
    // items change number for slider display on desktop
    loop: true,
    autoplay: false,
    nav: true,
    smartSpeed: 1000,
    margin: 15,
	  responsive:{
      0:{
          items:1
      },
      800:{
          items:2
      },
      1000:{
          items:3
      },
    }
  });

  restSlides.owlCarousel({
    items: 4,
    loop: true,
    autoplay: false,
    nav: true,
    smartSpeed: 1000,
    margin: 10,
	  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      },
      1200:{
        items:4
      }
    }
  });
});

(function($) {
  "use strict";

  // Css Function Js
  const bgSelector = $("[data-bg-img]");
  bgSelector.each(function (index, elem) {
    let element = $(elem),
      bgSource = element.data('bg-img');
    element.css('background-image', 'url(' + bgSource + ')');
  });

  const Bgcolorcl = $("[data-bg-color]");
  Bgcolorcl.each(function (index, elem) {
    let element = $(elem),
      Bgcolor = element.data('bg-color');
    element.css('background-color', Bgcolor);
  });

  // Responsive Menu
  var $offcanvasNav = $("#offcanvasNav a");
  $offcanvasNav.on("click", function () {
    var link = $(this);
    var closestUl = link.closest("ul");
    var activeLinks = closestUl.find(".active");
    var closestLi = link.closest("li");
    var linkStatus = closestLi.hasClass("active");
    var count = 0;

    closestUl.find("ul").slideUp(function () {
      if (++count == closestUl.find("ul").length)
        activeLinks.removeClass("active");
    });

    if (!linkStatus) {
      closestLi.children("ul").slideDown();
      closestLi.addClass("active");
    }
  });


  var $offcanvasNav2 = $("#offcanvasNav2 a");
  $offcanvasNav2.on("click", function () {
    var link = $(this);
    var closestUl = link.closest("ul");
    var activeLinks = closestUl.find(".active");
    var closestLi = link.closest("li");
    var linkStatus = closestLi.hasClass("active");
    var count = 0;

    closestUl.find("ul").slideUp(function () {
      if (++count == closestUl.find("ul").length)
        activeLinks.removeClass("active");
    });

    if (!linkStatus) {
      closestLi.children("ul").slideDown();
      closestLi.addClass("active");
    }
  });

  // Menu Activeion Js
  var cururl = window.location.pathname;
  var curpage = cururl.substr(cururl.lastIndexOf('/') + 1);
  var hash = window.location.hash.substr(1);
  if((curpage === "" || curpage === "/" || curpage === "admin") && hash === "")
    {
    } else {
      $(".header-navigation li").each(function()
    {
      $(this).removeClass("active");
    });
    if(hash != "")
      $(".header-navigation li a[href='"+hash+"']").parents("li").addClass("active");
    else
    $(".header-navigation li a[href='"+curpage+"']").parents("li").addClass("active");
  }

  // Swiper Hero Slider One JS
  var mainlSlider = new Swiper('.hero-slider-container', {
    slidesPerView : 1,
    slidesPerGroup: 1,
    loop: true,
    speed: 700,
    spaceBetween: 0,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    pagination: {
      el: '.hero-slide-one-pagination',
      clickable: 'true',
    },
    navigation: {
      nextEl: '.hero-slider-container .swiper-button-next',
      prevEl: '.hero-slider-container .swiper-button-prev',
    }
  });

  // Product Slider Js
  var productSlider = new Swiper('.product-slider-container', {
    autoplay: false,
    slidesPerView : 4,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 4,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 2,
      },
      0: {
        slidesPerView : 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-nav14 .swiper-button-next',
      prevEl: '.swiper-button-nav14 .swiper-button-prev',
    },
  });

  // Product Slider Js
  var productSlider = new Swiper('.product-slider-two-container', {
    autoplay: false,
    slidesPerView : 3,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 3,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 2,
      },
      0: {
        slidesPerView : 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-nav15 .swiper-button-next',
      prevEl: '.swiper-button-nav15 .swiper-button-prev',
    },
  });  

  // Product Slider Grid
  var productSliderGrid1 = new Swiper('.product-three-grid-slider', {
    slidesPerView: 4,
    grid: {rows: 2},
    spaceBetween : 30,
    speed: 1300,
    navigation: {
      nextEl: '.swiper-button-nav9 .swiper-button-next',
      prevEl: '.swiper-button-nav9 .swiper-button-prev',
    },
    breakpoints: {
      1200:{
        slidesPerView : 4,
        grid: {rows: 2}
      },
      992:{
        slidesPerView : 3,
        grid: {rows: 2}
      },
      768:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      576:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      480:{
        slidesPerView : 1,
        grid: {rows: 2}
      },
      0:{
        slidesPerView : 1,
        grid: {rows: 2}
      }
    }
  });

  // Product Tab Slider Js
  var productSlider = new Swiper('.product-tab-one-slider', {
    autoplay: false,
    slidesPerView : 4,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 4,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 2,
      },
      0: {
        slidesPerView : 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-nav6 .swiper-button-next',
      prevEl: '.swiper-button-nav6 .swiper-button-prev',
    },
  });

  // Product Tab Slider Js
  var productSlider = new Swiper('.product-tab-two-slider', {
    autoplay: false,
    slidesPerView : 4,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 4,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 2,
      },
      0: {
        slidesPerView : 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-nav7 .swiper-button-next',
      prevEl: '.swiper-button-nav7 .swiper-button-prev',
    },
  });

  // Product Tab Slider Js
  var productSlider = new Swiper('.product-tab-three-slider', {
    autoplay: false,
    slidesPerView : 4,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 4,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 2,
      },
      0: {
        slidesPerView : 1,
      },
    },
    navigation: {
      nextEl: '.swiper-button-nav8 .swiper-button-next',
      prevEl: '.swiper-button-nav8 .swiper-button-prev',
    },
  });

  // Product Tab Grid Slider Js
  var productSliderTabGrid1 = new Swiper('.product-tab-four-grid-slider', {
    slidesPerView: 4,
    grid: {rows: 2},
    spaceBetween : 30,
    speed: 700,
    navigation: {
      nextEl: '.swiper-button-nav10 .swiper-button-next',
      prevEl: '.swiper-button-nav10 .swiper-button-prev',
    },
    breakpoints: {
      1200:{
        slidesPerView : 4,
        grid: {rows: 2}
      },
      992:{
        slidesPerView : 3,
        grid: {rows: 2}
      },
      768:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      576:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      480:{
        slidesPerView : 1,
        grid: {rows: 2}
      },
      320:{
        slidesPerView : 1,
        grid: {rows: 2}
      }
    }
  });

  // Product Tab Grid Slider Js
  var productSliderTabGrid1 = new Swiper('.product-tab-five-grid-slider', {
    slidesPerView: 4,
    grid: {rows: 2},
    spaceBetween : 30,
    speed: 700,
    navigation: {
      nextEl: '.swiper-button-nav11 .swiper-button-next',
      prevEl: '.swiper-button-nav11 .swiper-button-prev',
    },
    breakpoints: {
      1200:{
        slidesPerView : 4,
        grid: {rows: 2}
      },
      992:{
        slidesPerView : 3,
        grid: {rows: 2}
      },
      768:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      576:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      480:{
        slidesPerView : 1,
        grid: {rows: 2}
      },
      320:{
        slidesPerView : 1,
        grid: {rows: 2}
      }
    }
  });

  // Product Tab Grid Slider Js
  var productSliderTabGrid1 = new Swiper('.product-tab-six-grid-slider', {
    slidesPerView: 4,
    grid: {rows: 2},
    spaceBetween : 30,
    speed: 700,
    navigation: {
      nextEl: '.swiper-button-nav12 .swiper-button-next',
      prevEl: '.swiper-button-nav12 .swiper-button-prev',
    },
    breakpoints: {
      1200:{
        slidesPerView : 4,
        grid: {rows: 2}
      },
      992:{
        slidesPerView : 3,
        grid: {rows: 2}
      },
      768:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      576:{
        slidesPerView : 2,
        grid: {rows: 2}
      },
      480:{
        slidesPerView : 1,
        grid: {rows: 2}
      },
      320:{
        slidesPerView : 1,
        grid: {rows: 2}
      }
    }
  });

  // Product Banner Slider Js
  var productBannerSlider = new Swiper('.product-banner-slider', {
    autoplay: false,
    slidesPerView : 3,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-nav1 .swiper-button-next',
      prevEl: '.swiper-button-nav1 .swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView : 3,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 1,
      },
      0: {
        slidesPerView : 1,
      },
    },
  });

  // Product Banner Slider Js
  var productBannerSlider = new Swiper('.product-banner-two-slider', {
    autoplay: false,
    slidesPerView : 5,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-nav13 .swiper-button-next',
      prevEl: '.swiper-button-nav13 .swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView : 5,
      },
      768: {
        slidesPerView : 3,
      },
      576: {
        slidesPerView : 2,
      },
      480: {
        slidesPerView : 1,
      },
      0: {
        slidesPerView : 1,
      },
    },
  });

  // Product Categories Slider Js
  var productSlider = new Swiper('.product-categories-slider', {
    autoplay: false,
    slidesPerView : 6,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    breakpoints: {
      1200: {
        slidesPerView : 6,
      },
      768: {
        slidesPerView : 4,
      },
      576: {
        slidesPerView : 3,
      },
      480: {
        slidesPerView : 3,
      },
      0: {
        slidesPerView : 2,
      },
    },
  });

  // Product Slider Grid
  var productSliderGrid1 = new Swiper('.product-list-grid-slider', {
    slidesPerView: 1,
    grid: {rows: 4},
    spaceBetween : 0,
    speed: 1300,
    navigation: {
      nextEl: '.swiper-button-nav3 .swiper-button-next',
      prevEl: '.swiper-button-nav3 .swiper-button-prev',
    }
  });

  // Product Slider Grid
  var productSliderGrid1 = new Swiper('.product-list-two-grid-slider', {
    slidesPerView: 1,
    grid: {rows: 4},
    spaceBetween : 0,
    speed: 1300,
    navigation: {
      nextEl: '.swiper-button-nav4 .swiper-button-next',
      prevEl: '.swiper-button-nav4 .swiper-button-prev',
    }
  });



  // Single Product Thumbnail Carousel
  var productThumbCarousel = new Swiper('.product-thumb-carousel', {
    slidesPerView: 4,
    spaceBetween: 10,
    pagination: {
      el: '.product-thumb-carousel .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.product-thumb-carousel .swiper-button-next',
      prevEl: '.product-thumb-carousel .swiper-button-prev',
    }
  });

  // Single Product Image Slider
  var productImageSlider = new Swiper('.product-image-slider', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.product-image-slider .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.product-image-slider .swiper-button-next',
      prevEl: '.product-image-slider .swiper-button-prev',
    },
    thumbs: {
      swiper: productThumbCarousel,
    },
  });

  // Single Product Thumbnail Carousel Vertical
  var productThumbCarouselVertical = new Swiper('.product-thumb-carousel-vertical', {
    direction: 'vertical',
    slidesPerView: 4,
    spaceBetween: 10,
    pagination: {
      el: '.product-thumb-carousel-vertical .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.product-thumb-carousel-vertical .swiper-button-next',
      prevEl: '.product-thumb-carousel-vertical .swiper-button-prev',
    }
  });

  // Single Product Image Slider Vertical
  var productImageSliderVertical = new Swiper('.product-image-slider-vertical', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.product-image-slider-vertical .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.product-image-slider-vertical .swiper-button-next',
      prevEl: '.product-image-slider-vertical .swiper-button-prev',
    },
    thumbs: {
      swiper: productThumbCarouselVertical,
    },
  });



  // Product Details Slider Nav
  var productNav = new Swiper('.single-product-nav-slider', {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-style11 .swiper-button-next',
      prevEl: '.swiper-button-style11 .swiper-button-prev',
    },
  });

  // Product Details Slider Thumb
  var productThumb = new Swiper('.single-product-thumb-slider', {
    slidesPerView: 1,
    centeredSlides: true,
    navigation: {
      nextEl: '.swiper-button-style11 .swiper-button-next',
      prevEl: '.swiper-button-style11 .swiper-button-prev',
    },
    thumbs: {
      swiper: productNav
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
  });

  // Product Modal Slider
  var ProductThumb = new Swiper('.single-product-quick-view-slider', {
    slidesPerView : 1,
    loop: true,
    speed: 1000,
    spaceBetween : 0,
    autoplay: false,
    navigation: {
      nextEl: '.single-product-quick-view-slider .swiper-button-next',
      prevEl: '.single-product-quick-view-slider .swiper-button-prev',
    },
    freeMode: true,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    }
  });

  // Testimonial Slider Js
  var testimonialSlider = new Swiper('.testimonial-slider-container', {
    autoplay: false,
    slidesPerView : 1,
    spaceBetween: 0,
    loop: true,
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-nav2 .swiper-button-next',
      prevEl: '.swiper-button-nav2 .swiper-button-prev',
    },
  });

  /* Tram Carousel */
  var teamCarousel = new Swiper('.team-carousel', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 15,
    pagination: {
      el: '.team-carousel .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.team-carousel-nav .swiper-button-next',
      prevEl: '.team-carousel-nav .swiper-button-prev',
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 30
      }
    }
  });

  // Blog Slider Js
  var postSlider = new Swiper('.post-items-slider', {
    autoplay: false,
    slidesPerView : 3,
    spaceBetween: 30,
    loop: true,
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-nav5 .swiper-button-next',
      prevEl: '.swiper-button-nav5 .swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView : 3,
      },
      992: {
        slidesPerView : 3,
      },
      768: {
        slidesPerView : 2,
      },
      576: {
        slidesPerView : 1,
      },
      0: {
        slidesPerView : 1,
      },
    },
  });

  // Countdown Js
  $('[data-countdown]').each(function () {
    var $this = $(this),
    $finalDate = $this.data('countdown');
    $this.countdown($finalDate, function (event) {
      $this.html(event.strftime('<div class="count"><span class="amount">%-D</span><span class="period">D<span class="period-desc">ays</span></span></div><div class="count"><span class="amount">%-H</span><span class="period">H<span class="period-desc">ours</span></span></div><div class="count"><span class="amount">%-M</span><span class="period">M<span class="period-desc">in</span></span></div><div class="count"><span class="amount">%-S</span><span class="period">S<span class="period-desc">ec</span></span></div>'));
    });
  });

  // Checkout Toggle Active
  $('.checkout-coupon-active').on('click', function(e) {
    e.preventDefault();
    $('.checkout-coupon-content').slideToggle(1000);
  });

  //Checkout Page Checkbox Accordion
  $("#create_pwd").on("change", function() {
    $(".account-create").slideToggle("100");
  });

  $("#ship_to_different").on("change", function() {
    $(".ship-to-different").slideToggle("100");
  });

  $('.checkout-toggle').on('click', function() {
    $('.open-toggle').slideToggle(1000);
  });

  var checked = $( '.sin-payment input:checked' )
  if(checked){
    $(checked).siblings( '.payment-box' ).slideDown(900);
  };
  $( '.sin-payment input' ).on('change', function() {
    $( '.payment-box' ).slideUp(900);
    $(this).siblings( '.payment-box' ).slideToggle(900);
  });

  // Nice Select JS
  $('select').niceSelect();

  // Product Quantity JS
  var proQty = $(".pro-qty");
  proQty.append('<div class= "dec qty-btn">-</div>');
  proQty.append('<div class="inc qty-btn">+</div>');
  $('.qty-btn').on('click', function (e) {
    e.preventDefault();
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    $button.parent().find('input').val(newVal);
  });

  // Ajax Contact Form JS
  var form = $('#contact-form');
  var formMessages = $('.form-message');

  $(form).submit(function(e) {
    e.preventDefault();
    var formData = form.serialize();
    $.ajax({
      type: 'POST',
      url: form.attr('action'),
      data: formData
    }).done(function(response) {
      // Make sure that the formMessages div has the 'success' class.
      $(formMessages).removeClass('alert alert-danger');
      $(formMessages).addClass('alert alert-success fade show');

      // Set the message text.
      formMessages.html("<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>");
      formMessages.append(response);

      // Clear the form.
      $('#contact-form input,#contact-form textarea').val('');
    }).fail(function(data) {
      // Make sure that the formMessages div has the 'error' class.
      $(formMessages).removeClass('alert alert-success');
      $(formMessages).addClass('alert alert-danger fade show');

      // Set the message text.
      if (data.responseText === '') {
        formMessages.html("<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>");
        formMessages.append(data.responseText);
      } else {
        $(formMessages).text('Oops! An error occurred and your message could not be sent.');
      }
    });
  });

  // Scroll Top Hide Show
  var varWindow = $(window);
  varWindow.on('scroll', function(){
    if ($(this).scrollTop() > 250) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  //Scroll To Top Animate
  $('.scroll-to-top').on('click', function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });

  /* Image Zoom */
  var $window = $(window);
  function imageZoom () {
      const $elem = $('.image-zoom'),
          $zoomImage = $('.image-zoom .zoomImg');
      if($window.outerWidth() < 992) {
          if($zoomImage.length !== 0) {
              $elem.trigger('zoom.destroy');
          }
      } else {
          if($zoomImage.length === 0) {
              $elem.zoom();
          }
      }
  }
  imageZoom();

  $('.sidebar').stickySidebar({
      topSpacing: 50,
      bottomSpacing: 60
  });

  /* Resize Event */
  $window.on('resize', function() {
      imageZoom()
  })

})(window.jQuery);
jQuery(function ($) {
  /* -----------------------------------------
      Preloader
      ----------------------------------------- */
  $("#preloader").delay(1000).fadeOut();
  $("#loader").delay(1000).fadeOut("slow");

  /* -----------------------------------------
      rtl
      ----------------------------------------- */
  var isRTL = $("html").attr("dir") === "rtl";

  /* -----------------------------------------
      Main Slider
      ----------------------------------------- */
  $(".banner-slider").slick({
    dots: true,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: false,
    arrows: true,
    rtl: isRTL,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    appendArrows : ".banner-section .banner-slider-navigation",
    responsive: [
      {
        breakpoint: 1500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
    ],
  });

  /* -----------------------------------------
 marquee Ticker
  ----------------------------------------- */
function configureMarqueeDirection() {
  const isRtl = $("body").hasClass("rtl");
  const direction = isRtl ? "right" : "left";

  $(".marquee").marquee({
    speed: 30,
    duration: 15000,
    gap: 0,
    delayBeforeStart: 0,
    direction: direction,
    duplicated: true,
    pauseOnHover: true,
    startVisible: true,
    easing: "linear",
  });
}
// Call the function to configure the marquee direction
configureMarqueeDirection();

  /* -----------------------------------------
  sticky-topbar-flashnewews
  ----------------------------------------- */
  if ($("body").hasClass("sticky-news")) {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $(".sticky-topbar").addClass("show");
      } else {
        $(".sticky-topbar").removeClass("show");
      }
    });
  }

  /* -----------------------------------------
  widget carousel post
  ----------------------------------------- */
  $(".primary-widgets-area .carousel-post").slick({
    dots: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
    ],
  });

  $(".above-footer-widgets-area .carousel-post").slick({
    dots: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
    ],
  });

  $(".secondary-widgets-area .carousel-post").slick({
    dots: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
  });

  $("aside .carousel-post").slick({
    dots: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
  });

  $(".site-footer .carousel-post").slick({
    dots: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    infinite: true,
    rtl: isRTL,
  });

  /* -----------------------------------------
    toggle-button
    ----------------------------------------- */
  $(".menu-toggle").click(function () {
    $(this).toggleClass("show");
  });

  /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
  $(window).on("load resize", function () {
    if ($(window).width() < 992) {
      $(".main-navigation")
        .find("li")
        .last()
        .bind("keydown", function (e) {
          if (e.which === 9) {
            e.preventDefault();
            $("#masthead").find(".menu-toggle").focus();
          }
        });
    } else {
      $(".main-navigation").find("li").unbind("keydown");
    }
  });

  var primary_menu_toggle = $("#masthead .menu-toggle");
  primary_menu_toggle.on("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if (primary_menu_toggle.hasClass("show")) {
      if (shiftKey && tabKey) {
        e.preventDefault();
        $(".main-navigation").toggleClass("toggled");
        primary_menu_toggle.removeClass("show");
      }
    }
  });

  $(".header-search-wrap")
    .find(".search-submit")
    .bind("keydown", function (e) {
      var tabKey = e.keyCode === 9;
      if (tabKey) {
        e.preventDefault();
        $(".search-icon").focus();
      }
    });

  $(".search-icon").on("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;
    if ($(".header-search-wrap").hasClass("show")) {
      if (shiftKey && tabKey) {
        e.preventDefault();
        $(".header-search-wrap").removeClass("show");
        $(".search-icon").focus();
      }
    }
  });

  /* -----------------------------------------
  header-search-bar
  ----------------------------------------- */
  var searchWrap = $(".header-search-wrap");
  $(".search-icon").click(function (e) {
    e.preventDefault();
    searchWrap.toggleClass("show");
    searchWrap.find("input.search-field").focus();
  });
  $(document).click(function (e) {
    if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
      $(".header-search-wrap").removeClass("show");
    }
  });

  /* -----------------------------------------
  ace-news-scroll-to-top-button
  ----------------------------------------- */

  var ace_news_scroll_btn = $(".scroll-to-top");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      ace_news_scroll_btn.addClass("show");
    } else {
      ace_news_scroll_btn.removeClass("show");
    }
  });

  ace_news_scroll_btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      "300"
    );
  });
});

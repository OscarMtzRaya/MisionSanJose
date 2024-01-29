/**
    * headerFixed
    * btnmenu
    * topSearch
    * video
    * counter
    * flatAccordion
    * tabs 
    * rangeslider
    * styleshop
    * btnQuantity
    * gotop
    * cursor
    * buttonHeart
    * dropdown
    * curvedtext
    * sticky
    * clock
    * retinaLogos
    * preloader
*/

; (function ($) {

  "use strict";

  var headerFixed = function () {
    if ($("header").hasClass("header-fixed")) {
      var nav = $("#header_main");
      var nav1 = $(".header-inner");

      if (nav.length) {
        var offsetTop = nav.offset().top,
          headerHeight = nav.height(),
          headerHeight1 = nav1.height(),
          injectSpace = $("<div>", {
            height: headerHeight1,
          });
        injectSpace.hide();

        if ($("header").hasClass("style-absolute")) {
          injectSpace.hide();
        } else {
          injectSpace.insertAfter(nav);
        }

        $(window).on("load scroll", function () {
          if ($(window).scrollTop() > offsetTop + headerHeight) {
            nav.addClass("is-fixed");
            injectSpace.show();
          } else {
            nav.removeClass("is-fixed");
            injectSpace.hide();
          }

          if ($(window).scrollTop() > 500) {
            nav.addClass("is-small");
          } else {
            nav.removeClass("is-small");
          }
        });
      }
    }
  };

  var btnmenu = function() {
      if ($('header').hasClass('header')) {

        $('.canvas-button').on('click',function(){
          $('.wg-welcom').toggleClass('active');
        });
        $('.button-close').on('click',function(event){
          $('.wg-welcom').toggleClass('active');
            event.preventDefault();
        });

        $('.mobile-button').on('click', function () {
          $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
        });
        $('.mobile-nav-close').on('click', function () {
            $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
        });
        $('.mobile-nav-wrap .overlay-mobile-nav').on('click', function () {
            $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
        });

        $(document).on("click", ".menu-item-has-children-mobile", function () {
            var args = { duration: 600 };
            if ($(this).hasClass("active")) {
              $(this).children(".sub-menu-mobile").slideUp(args);
              $(this).removeClass("active");
            } else {
              $(".sub-menu-mobile").slideUp(args);
              $(this).children(".sub-menu-mobile").slideDown(args);
              $(".menu-item-has-children-mobile").removeClass("active");
              $(this).addClass("active");
            }
        });
          
      }
  }

  var topSearch=function(){
      
    $(document).on('click',function(e){
        var clickID=e.target.id;if((clickID!=='s')){
            $('.top-search').removeClass('active');
        }});
    $(document).on('click',function(e){
        var clickID=e.target.class;if((clickID!=='a111')){
            $('.show-search').removeClass('active');
    }});
        
    $('.show-search').on('click',function(event){
        event.stopPropagation();});
    $('.search-form').on('click',function(event){
        event.stopPropagation();});
    $('.show-search').on('click',function(event){
        if(!$('.top-search').hasClass("active")){
            $('.top-search').addClass('active');
                event.preventDefault();
            }
        else
            $('.top-search').removeClass('active');
            event.preventDefault();
            if(!$('.show-search').hasClass("active"))
                $('.show-search').addClass('active');
            else
                $('.show-search').removeClass('active'); 
    })
  ;}

  var video = function(){
      if ($('div').hasClass('video-wrap')) {
        $('.popup-youtube').magnificPopup({
          type: 'iframe'
        });
      }
  };

  var counter = function () {
    if ($(document.body).hasClass("counter-scroll")) {
      var a = 0;
      $(window).scroll(function () {
        var oTop = $(".counter").offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
          if ($().countTo) {
            $(".counter")
              .find(".number")
              .each(function () {
                var to = $(this).data("to"),
                  speed = $(this).data("speed");
                $(this).countTo({
                  to: to,
                  speed: speed,
                });
              });
          }
          a = 1;
        }
      });
    }
  };

  var flatAccordion = function (class1,class2) {
    var args = { duration: 600 };

    $(class2 + ' .toggle-title.active').siblings('.toggle-content').show();
    $(class1 +' .toggle-title').on('click', function () {
        $(class1 + ' ' + class2).removeClass('active');
        $(this).closest(class2).toggleClass('active');

        if( !$(this).is('.active') ) {
            $(this).closest(class1).find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
            $(this).toggleClass('active');
            $(this).next().slideToggle(args);
        } else {
            $(class1 + ' ' + class2).removeClass('active');
            $(this).toggleClass('active');
            $(this).next().slideToggle(args);
        }     
    });
  };

  var tabs = function(){
    $('.widget-tabs').each(function(){
        $(this).find('.widget-content-tab').children().hide();
        $(this).find('.widget-content-tab').children(".active").show();
        $(this).find('.widget-menu-tab').children('li').on('click',function(){
            var liActive = $(this).index();
            var contentActive=$(this).siblings().removeClass('active').parents('.widget-tabs').find('.widget-content-tab').children().eq(liActive);
            contentActive.addClass('active').fadeIn("slow");
            contentActive.siblings().removeClass('active');
            $(this).addClass('active').parents('.widget-tabs').find('.widget-content-tab').children().eq(liActive).siblings().hide();
        });
    });
  };

  var rangeslider = function () {
    if ($("#range-two-val").length > 0) {
      var skipSlider = document.getElementById("range-two-val");
      var skipValues = [
        document.getElementById("skip-value-lower"),
        document.getElementById("skip-value-upper")
      ];

      noUiSlider.create(skipSlider, {
        start: [20, 99],
        connect: true,
        behaviour: "drag",
        step: 1,
        range: {
          min: 20,
          max: 120
        },
      });

      skipSlider.noUiSlider.on("update", function (values, handle) {
        skipValues[handle].innerHTML = "$" + values[handle];
      });
    }
  };

  var styleshop = function() {
    if ($('div').hasClass('wg-shop')) {
      $('.button-list').on('click',function() {
          $('.wg-shop-content').find('.col-md-6').removeClass('col-md-6').addClass('col-xl-12');
          $('.wg-shop-content').find('.shop-item').addClass('style-list');
        })
      $('.button-grid').on('click',function() {
          $('.wg-shop-content').find('.col-xl-12').removeClass('col-xl-12').addClass('col-md-6');
          $('.wg-shop-content').find('.shop-item').removeClass('style-list');
      })
    }
  };

  var btnQuantity = function () {
    $(".minus-btn").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());

      if (value > 1) {
        value = value - 1;
      }

      $input.val(value);
    });

    $(".plus-btn").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());

      if (value > 0) {
        value = value + 1;
      }

      $input.val(value);
    });
  };


  var gotop = function() {
    if ($('div').hasClass('progress-wrap')) {
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateprogress = function() {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateprogress();
    $(window).scroll(updateprogress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });
    jQuery('.progress-wrap').on('click', function(event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    })
  }}

  const cursor = function () {
    var myCursor = jQuery(".tf-mouse");
    if (myCursor.length) {
      if ($("body")) {
        const e = document.querySelector(".tf-mouse-inner"),
          t = document.querySelector(".tf-mouse-outer");
        let n,
          i = 0,
          o = !1;
        (window.onmousemove = function (s) {
          o ||
            (t.style.transform =
              "translate(" + s.clientX + "px, " + s.clientY + "px)"),
            (e.style.transform =
              "translate(" + s.clientX + "px, " + s.clientY + "px)"),
            (n = s.clientY),
            (i = s.clientX);
        }),
          $("body").on(
            "mouseenter",
            "a, .canvas-button, .progress-wrap",
            function () {
              e.classList.add("mouse-hover"), t.classList.add("mouse-hover");
            }
          ),
          $("body").on(
            "mouseleave",
            "a, .canvas-button, .progress-wrap",
            function () {
              ($(this).is("a") && $(this).closest(".canvas-button").length) ||
                (e.classList.remove("mouse-hover"),
                t.classList.remove("mouse-hover"));
            }
          ),
          (e.style.visibility = "visible"),
          (t.style.visibility = "visible");
      }
    }
  };

  var buttonHeart = function () { 
    $(".button-wishlist").on("click", function() {
        var iteration = $(this).data('iteration') || 1;
        
        switch (iteration) {
            case 1:
                $(this).addClass("active");
                break;
            case 2:
                $(this).removeClass("active");
                break;
        }
        iteration++;
        if (iteration > 2) iteration = 1;
        $(this).data('iteration', iteration);
    });
  }

  var dropdown = function(id){
    if ($('span').hasClass('dropdown')) {
    var obj = $(id+'.dropdown');
    var btn = obj.find('.btn-selector');
    var dd = obj.find('ul');
    var opt = dd.find('li');
        dd.hide();
        obj.on("mouseenter", function() {
            dd.show();
            dd.addClass('show');
            $(this).css("z-index",1000);
        }).on("mouseleave", function() {
            dd.hide();
             $(this).css("z-index","auto")
             dd.removeClass('show');
        })
        
        opt.on("click", function() {
            dd.hide();
            var txt = $(this).text();
            opt.removeClass("active");
            $(this).addClass("active");
            btn.text(txt);
        });
  }}


  var curvedtext = function () {
    if ($('div').hasClass('curved-text')) {
      var demo = new CircleType(document.getElementById('curved-text')).radius(180);
    }
  }
  
  var sticky = function() {
    if ($('body').hasClass('sticky-scroll')) {
      new StickySidebar('#sidebar-sticky', {
        topSpacing: 0,
        bottomSpacing: 0,
        containerSelector: '.page-menu1-wrap',
        innerWrapperSelector: '.po-sticky'
      });
    }
  }

  var clock = function(){
    $(document).ready(function() {
      setInterval( function() {
      var hours = new Date().getHours();
      $(".hours").html(( hours < 10 ? "0" : "" ) + hours);
      }, 1000);
      setInterval( function() {
      var minutes = new Date().getMinutes();
      $(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
      },1000);
      setInterval( function() {
      var seconds = new Date().getSeconds();
      $(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
      },1000);
    });
  }

  var retinaLogos = function() {
    var retina = window.devicePixelRatio > 1 ? true : false;
      if(retina) {
        var tfheader =$('#logo_header').data('retina');
        $('#site-logo-inner').find('img').attr({src:tfheader,width:'51px',height:'91px'});

        var tfmobile =$('#mobile-logo_header').data('retina');
        $('.mobile-nav-wrap').find('img').attr({src:tfmobile,width:'51px',height:'91px'});

        var tffooter =$('#logo_footer').data('retina');
        $('#logo-footer').find('img').attr({src:tffooter,width:'121px',height:'126px'});
      }
  };  

  var preloader = function () {
    setTimeout(function () {
      $(".preload-container").fadeOut("slow", function () {
          $(this).remove();
      });
    }, 1000);
  };


  // Dom Ready
  $(function () {
    headerFixed();
    btnmenu();
    topSearch();
    video();
    counter();
    flatAccordion('.flat-accordion','.flat-toggle');
    tabs(); 
    rangeslider();
    styleshop();
    btnQuantity();
    gotop();
    cursor();
    buttonHeart();
    dropdown('#select-language');
    curvedtext();
    sticky();
    clock();
    retinaLogos();
    preloader();
  });

})(jQuery);

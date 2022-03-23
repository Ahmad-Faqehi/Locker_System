// -----------------------------

//   js index
/* =================== */
/*  
    ## preloader
    ## Counter Up
    ## sticky
    ## SmartMenu Nav
    ## scroll-up
    ## Countdown 
    ## Smooth scroll
    ## WOW
    ## AOS
    ## Search Box JS
    ## Sidepanel JS
    ## Quantity Increment Decrement JS
    ## owl carousel
    ## Youtube Player JS
    ## Contact Form
    ## Cart Box
    ## Shuffle JS
    ## Skill Bar
    ## Product Gallery
    

*/
// -----------------------------
(function($) {
    "use strict";



    /*---------------------
        preloader
    --------------------- */

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
            // Counter Up
            $('.counter-up').counterUp();
        });

    });


    /*-----------------
    sticky
    -----------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 85) {
            $('header').addClass('navbar-fixed-top');
        } else {
            $('header').removeClass('navbar-fixed-top');
        }
    });

    
    /*----------------------------
     SmartMenu Nav
    ------------------------------ */
    $('#QnikoMenu').smartmenus({
        subMenusSubOffsetX: 6,
        subMenusSubOffsetY: -8
    });

    $(function() {
        var $mainMenuState = $('#QnikoMenu-state');
        if ($mainMenuState.length) {
            // animate mobile menu
            $mainMenuState.change(function(e) {
                var $menu = $('#QnikoMenu');
                if (this.checked) {
                    $menu.hide().slideDown(250, function() {
                        $menu.css('display', '');
                    });
                } else {
                    $menu.show().slideUp(250, function() {
                        $menu.css('display', '');
                    });
                }
            });
            // hide mobile menu beforeunload
            $(window).on('beforeunload unload', function() {
                if ($mainMenuState[0].checked) {
                    $mainMenuState[0].click();
                }
            });
        }
    });

    
    
    /*-----------------
    scroll-up
    -----------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up" aria-hidden="true"></i>',
        easingType: 'linear',
        scrollSpeed: 1500,
        animation: 'fade'
    });


    
    /**================================ 
    Countdown 
    ================================**/
    $('.countdown').countdown('2020/12/1', function(event) {
        $('#cday').html(event.strftime('%D <span id="clabel"><br>Days</span>'));
        $('#chour').html(event.strftime('%-H <span id="clabel"><br>Hours</span>'));
        $('#cminute').html(event.strftime('%M <span id="clabel"><br>Minutes</span>'));
        $('#csec').html(event.strftime('%S <span id="clabel"><br>Seconds</span>'));
    });

    /*---------------------
    Smooth scroll
    --------------------- */
    $('.smoothscroll').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - 80
        }, 1200);
    });
    
    /*---------------------
    WOW
    --------------------- */
    if ($('.wow').length > 0) {
        var wowSel = 'wow';
        var wow = new WOW({
            boxClass: wowSel,
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true,
            callback: function(box) {

            },
            scrollContainer: null
        });
        wow.init();
    }
    /*---------------------
    AOS
    --------------------- */
    // AOS.init();
    if ($('[data-aos]').length > 0) {

        AOS.init({
            //Global settings:
            // debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
          
            //Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            // once: false, // whether animation should happen only once - while scrolling down
            mirror: true, // whether elements should animate out while scrolling past them
          
         });

    }
    
 /*---------------------
    Search Box JS
    --------------------- */
   

    $('.searchIcon').on('click', function() {
        $('.hSearchBox').removeClass('hide');
        $('.hSearchBox').toggleClass('active');
    });

    
    $(document).on('click', function (e) {
        if ($(e.target).closest(".hSearchBox.active").length === 0) {
            if ($(e.target).closest(".searchIcon").length === 0) {
                $('.hSearchBox').addClass('hide');
            }
        }
    });
 
    /*---------------------
    Sidepanel JS
    --------------------- */
    $('.sidebar-btn').on('click', function() {
        $('.side-panel').removeClass('hide');
    });
    $('.close-sp').on('click', function() {
        $('.side-panel').addClass('hide');
    });
    

    /*-----------------
    Quantity Increment Decrement JS
    -----------------*/
  
    var incrementPlus;
    var incrementMinus;

    var buttonPlus = $(".cart-qty-plus");
    var buttonMinus = $(".cart-qty-minus");

    var incrementPlus = buttonPlus.click(function() {
        var $n = $(this)
            .parent(".button-inc-dec")
            .parent(".cartinc-dec")
            .find(".qty");
        $n.val(Number($n.val()) + 1);
    });

    var incrementMinus = buttonMinus.click(function() {
        var $n = $(this)
            .parent(".button-inc-dec")
            .parent(".cartinc-dec")
            .find(".qty");
        var amount = Number($n.val());
        if (amount > 0) {
            $n.val(amount - 1);
        }
    });
    

    /*---------------------
    owl carousel
    --------------------- */

    // Recent Work Carousel
    function rw_carousel() {
        var owl = $(".rw-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: false,
            items: 5,
            smartSpeed: 2000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 4
                }
            }
        });
    }
    rw_carousel();


    // Testimonial Carousel
    function testimonial_carousel() {
        var owl = $(".testimonial-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: true,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    testimonial_carousel();


    // Testimonial Carousel
    function testimonialV2_carousel() {
        var owl = $(".testimonial-carouselV2");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: true,
            autoplay: false,
            autoplayTimeout: 4000,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    testimonialV2_carousel();


    //  Testimonial 3 Sync Slider
    $(window).on('load', function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 1; //globaly define number of elements per page
        var syncedSecondary = true;
      
        sync1.owlCarousel({
          items : 1,
          slideSpeed : 2000,
          nav: false,
          autoplay: true,
          dots: true,
          loop: true,
          responsiveRefreshRate : 200,
          navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        }).on('changed.owl.carousel', syncPosition);
      
        sync2
          .on('initialized.owl.carousel', function () {
            sync2.find(".owl-item").eq(0).addClass("current");
          })
          .owlCarousel({
          items : slidesPerPage,
          dots: false,
          nav: false,
          smartSpeed: 200,
          slideSpeed : 2000,
          slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
          responsiveRefreshRate : 100
        }).on('changed.owl.carousel', syncPosition2);
      
        function syncPosition(el) {
          //if you set loop to false, you have to restore this next line
          //var current = el.item.index;
          
          //if you disable loop you have to comment this block
          var count = el.item.count-1;
          var current = Math.round(el.item.index - (el.item.count/2) - .5);
          
          if(current < 0) {
            current = count;
          }
          if(current > count) {
            current = 0;
          }
          
          //end block
      
          sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
          var onscreen = sync2.find('.owl-item.active').length - 1;
          var start = sync2.find('.owl-item.active').first().index();
          var end = sync2.find('.owl-item.active').last().index();
          
          if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
          }
          if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
          }
        }
        
        function syncPosition2(el) {
          if(syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
          }
        }
        
        sync2.on("click", ".owl-item", function(e){
          e.preventDefault();
          var number = $(this).index();
          sync1.data('owl.carousel').to(number, 300, true);
        });
      });
    
    // Testimonial 3 Flip Slider
    $(window).on('load', function () {
        if ($('.gallery').length > 0) {
            $(".gallery").flipping_gallery({
                enableScroll: true,
                direction: "forward",
                flipDirection: "top",
                spacing: 0,
                autoplay: false

            });

            $(".next").on('click', function () {
                $(".gallery").flipForward();
                return false;
            });
            $(".prev").on('click', function () {
                $(".gallery").flipBackward();
                return false;
            });
        }
    });

    
    
    function recentProject_carousel() {
        var owl = $(".recentProject-carouselV1");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: true,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 4
                }
            }
        });
    }
    recentProject_carousel();

    $('#rp-next-slide').on('click', function(e) {
        $('.recentProject-carouselV1').trigger('next.owl.carousel');
    });

    $('#rp-prev-slide').on('click', function(e) {
        $('.recentProject-carouselV1').trigger('prev.owl.carousel');
    });
    

    // Testimonial V5
    function testimonialV5_carousel() {
        var owl = $(".testimonial-carouselV5");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    testimonialV5_carousel();

    // Company Work With Us Logo Carousel
    function cwa_logo_carousel() {
        var owl = $(".cwa-logo-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: false,
            items: 5,
            smartSpeed: 2000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 5
                }
            }
        });
    }
    cwa_logo_carousel();

    /*---------------------
        Youtube Player JS
    --------------------- */
    $(window).on('load', function() {
        if ($('.play-1, .play-2').length > 0) {
            $(".play-1, .play-2").yu2fvl();
        }
    });
    
 
     /*---------------------
    Contact Form
    --------------------- */
    $('.cf-msg').hide();
    $('form#cf button#submit').on('click', function() {

        var firstName = $('#firstName').val();
        var email = $('#email').val();
        var subjectName = $('#subjectName').val();
        var msg = $('#msg').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        firstName = $.trim(firstName);
        subjectName = $.trim(subjectName);
        email = $.trim(email);
        msg = $.trim(msg);

        if (firstName != '' && email != '' && msg != '') {
            var values = "firstName=" + firstName + "&subjectName=" + subjectName + "&email=" + email + " &msg=" + msg;
            $.ajax({
                type: "POST",
                url: "assets/php/mail.php",
                data: values,
                success: function() {
                    $('#firstName').val('');
                    $('#subjectName').val('');
                    $('#email').val('');
                    $('#msg').val('');

                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function() {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
        }
        return false;
    });

  
    /*---------------------
    // Cart Box
    --------------------- */
    
    (function() {
        $(document).on('click', function() {
          var $item = $(".shopping-cart");
          if ($item.hasClass("active")) {
            $item.removeClass("active");
          }
        });
      
        $(".shopping-cart").each(function() {
          var delay = $(this).index() * 50 + "ms";
          $(this).css({
            "-webkit-transition-delay": delay,
            "-moz-transition-delay": delay,
            "-o-transition-delay": delay,
            "transition-delay": delay
          });
        });
        $("#cart").on('click',function(e) {
          e.stopPropagation();
          $(".shopping-cart").toggleClass("active");
        });
      
        $("#addtocart").on('click',function(e) {
          e.stopPropagation();
          $(".shopping-cart").toggleClass("active");
        });
      })();
      
    /*---------------------
    Shuffle JS
    --------------------- */
    // Portfolio Style 1 
    if ($('.shuffle-box').length > 0) {
        var Shuffle = window.Shuffle;
        var myShuffle = new Shuffle(document.querySelector('.shuffle-box'), {
        itemSelector: '.single-shuffle',
        sizer: '.my-sizer-element',
        buffer: 1,
        });

        $('input[name="shuffle-filter"]').on('change', function (evt) {
        var input = evt.currentTarget;
        if (input.checked) {
            myShuffle.filter(input.value);
        }
        });
    }

    // Portfolio Style 1 
    if ($('.shuffle2-box').length > 0) {
        var Shuffle2 = window.Shuffle;
        var myShuffle2 = new Shuffle2(document.querySelector('.shuffle2-box'), {
        itemSelector: '.single-shuffle2',
        sizer: '.my-sizer2-element',
        buffer: 1,
        });

        $('input[name="shuffle2-filter"]').on('change', function (evt) {
        var input = evt.currentTarget;
        if (input.checked) {
            myShuffle2.filter(input.value);
        }
        });
    }

  

     /*---------------------
    ## Skill Bar
    --------------------- */

    if ($(".profoSkill").length > 0) {
        $(".bar").each(function () {

            var $bar = $(this),
                $pct = $bar.find(".pct"),
                data = $bar.data("bar");

            setTimeout(function () {

                $bar
                    .animate({
                        "width": $pct.html()
                    }, data.speed || 2000, function () {

                        $pct.css({
                            "opacity": 1
                        });

                    });

            }, data.delay || 0);

        });
    }


     /*---------------------
    ## Product Gallery
    --------------------- */

    if ($(".xzoom3").length > 0) {
        $(window).on('load', function () {
            
            var xZoomFirstImgSrc = $('.xzoom3').attr('src');
            $('.xzoom3').attr("xoriginal", xZoomFirstImgSrc);

            $('.xzoom3, .xzoom-gallery3').xzoom({
                position: 'lens',
                lensShape: 'circle',
                bg: true,
                sourceClass: 'xzoom-hidden',
                loadingClass: false
            });


        });
    }

}(jQuery));












    
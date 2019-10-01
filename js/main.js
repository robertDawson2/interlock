$(function () {
    $("nav .nav-item a").on('click', function () {
        $("section[data-scroll-index=" + $(this).data('scroll-nav') + "]").removeClass('hide-on-mobile');
    });
    var screenWidth = $(window).width();
    if (screenWidth >= 800) {
        $('.video-background').attr('autoplay', 'autoplay');
    }
    "use strict";
    /* smooth scroll
     -------------------------------------------------------*/
    $.scrollIt({

        easing: 'swing', // the easing function for animation
        scrollTime: 900, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -70,
        upKey: 38, // key code to navigate to the next section
        downKey: 40          // key code to navigate to the previous section

    });

    var win = $(window);


    /* close navbar-collapse when a  clicked */
    $(".navbar-nav a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });

    /* scroll-top-btn */
    var scrollButton = $('.scroll-top-btn .fa');
    win.on('scroll', function () {
        if ($(this).scrollTop() >= 700) {
            scrollButton.show();
        } else {
            scrollButton.hide();
        }
    });

    /* Click On scroll-top-btn */
    scrollButton.on('click', function () {
        $('html,body').animate({scrollTop: 0}, 1200);
    });

    /* counter */
    $('.count').counterUp({
        delay: 20,
        time: 1500
    });

    // faqs section
    $('.faqs .text-box .box h6').on("click", function () {
        $(this).toggleClass('black orange').siblings().removeClass('orange').addClass('black');
        $(this).next().slideToggle(500);
        $(".faqs .text-box .box p").not($(this).next()).slideUp(500);
    });


    /* welcome-slider slider */
    $('.welcome-slider .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 2800,
        autoplayHoverPause: true,
        smartSpeed: 650,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ]
    });

    $('.photo-owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
	    center: true,
        lazyLoad: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-left color-fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>",
                    "<i class='fa fa-chevron-right color-fff'></i>"
                ]
            },
            767: {
                items: 3,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-left color-fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>",
                    "<i class='fa fa-chevron-right color-fff'></i>"
                ]
            },
            1000: {
                items: 5,
                nav: true,
                loop: true,
                navText: [
                    "<i class='fa fa-chevron-left color-fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>",
                    "<i class='fa fa-chevron-right color-fff'></i>"
                ]
            }
        }
    });

    

    /* team-area slider */
    $('.team-area .owl-carousel').owlCarousel({
        items: 4,
        loop: true,
        margin: 30,
	lazyLoad: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        smartSpeed: 650,
        responsiveClass: true,
        responsive: {
            992: {
                items: 4
            },

            768: {
                items: 3
            },

            576: {
                items: 2
            },

            0: {
                items: 1
            }
        }
    });

    /* why-area slider */
    $('.why-area .owl-carousel').owlCarousel({
        items: 1,
        loop: false,
        margin: 30,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        mouseDrag: false,
        smartSpeed: 650,
        animateIn: 'fadeIn',
        dotsContainer: '.why-dots'
    });

    /* testimonials slider */
    $('.testimonials .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 2800,
        autoplayHoverPause: true,
        smartSpeed: 650,
        mouseDrag: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });

    /*  skills-area section  */
    win.on('scroll', function () {
        $(".skills-progress span").each(function () {
            var bottom_of_object =
                    $(this).offset().top + $(this).outerHeight();
            var bottom_of_window =
                    $(window).scrollTop() + $(window).height();
            var myVal = $(this).attr('data-value');
            if (bottom_of_window > bottom_of_object) {
                $(this).css({
                    width: myVal
                });
            }
        });
    });



});



$(window).on("load", function () {

    $('.load-wrapp').fadeOut(100);
    var urlHash = window.location.href.split("#")[1];
    if (urlHash &&  $('#' + urlHash).length ){
        $('html,body').animate({
            scrollTop: $('#' + urlHash).offset().top
        }, 4000);
        console.log('#' + urlHash);
    }
});


$(function () {
    var screenWidth = $(window).width();
    if (screenWidth >= 768) {
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
        $('html,body').animate({
            scrollTop: 0}, 1200);
    });
    /* Click On scroll-top-btn */
    $('.navbar-brand').on('click', function () {
        $('html,body').animate({
            scrollTop: 0}, 1200);
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
                    "<i class='fa fa-chevron-left pr-4'></i>",
                    "<i class='fa fa-chevron-right pl-4'></i>"
                ]
            },
            767: {
                items: 3,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-left pr-4'></i>",
                    "<i class='fa fa-chevron-right pl-4'></i>"
                ]
            },
            1000: {
                items: 5,
                nav: true,
                loop: true,
                navText: [
                    "<i class='fa fa-chevron-left pr-4'></i>",
                    "<i class='fa fa-chevron-right pl-4'></i>"
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
            scrollTop: $('#' + urlHash).offset().top -60
        }, 1000);
    }

    $('.scroll').click(function (e) {
        e.preventDefault();
        urlHash = $(this).attr('href').split('#')[1];
        if (urlHash && $('#' + urlHash).length) {
            $('html,body').animate({
                scrollTop: $('#' + urlHash).offset().top -60
            }, 1000);
        }
    });

    if ($(document).width() >= 768) {
        $(".owl-item > img").each(function () {
            //var filename = $(this).attr('src').split('/');
            $(this).click(function () {
                var previewNumber = $('#enlarged').data('number');
                if (previewNumber > 0) {
                    $('#enlarged').removeClass('pic-'+previewNumber);
                }
                var picNumber = $(this).data('number');
                $('#enlarged').data('number', picNumber)
                
                $("#enlarged").addClass('pic-'+picNumber);
                $("#imagePreview").removeClass('d-none');
                
                $('html, body').animate({
                    scrollTop: $('#imagePreview').offset().top - 40
                }, 1000);
            })
        });

        $('#enlarged').click(function(){
            $('html, body').animate({
                scrollTop: $('#ourWork').offset().top - 60
            }, 1000);
            $('#imagePreview').addClass('d-none');
        });

    
    }
   
    $('button.close').click(function(){
        if (!$(this).parent().hasClass('d-none')) {
            $(this).parent().addClass('d-none');
        }
    });

    $('#quote-modal').on('shown.bs.modal', function () {
        $('#firstName').trigger('focus');
    });

    $('#quote-form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: 'post',
            dataType: 'json',
            url: './mailer.php',
            data: formData,
            processData: false,
            contentType: false,
            success: (function (msg) {
                if ('success' in msg) {
                    $("#quote-modal input").val('');
                    $("#state").val('');
                    $("#message").val('');
                    $('.mail-success-msg').empty()
                    $('.mail-success-msg').append('Your request for a quote has been sent.');
                    $('.alert-success').removeClass('d-none');
                    $('#quote-modal').modal('toggle');
                    window.scrollTo(0, 0);
                } else if ('error' in msg) {
                    $('.mail-error-msg').empty();
                    $('.mail-error-msg').append(msg['error']);
                    $('.alert-danger').removeClass('d-none');
                    $('#quote-modal').modal('toggle');

                } else {
                    // hide all the error spans
                    $.each($('#quoteForm span.error'), function () {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    });
                    // clear any old msg
                    $('.error').html();
                    $.each(msg, function (key, value) {
                        // show new msg
                        $('.' + key + '-error').removeClass('d-none').html(value);
                    });

                }
            }),
        });
    });
});

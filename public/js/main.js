jQuery(document).ready(function ($) {

    // Header fixed and Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
            $('#header').addClass('header-fixed');
            $('#logo-img').css('width', '150px');
        } else {
            $('.back-to-top').fadeOut('slow');
            $('#header').removeClass('header-fixed');
            $('#logo-img').css('width', '200px');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // Initiate the wowjs
    new WOW().init();

    // Initiate superfish on nav menu
    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    // Mobile Navigation
    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function (e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("fa-chevron-up fa-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
            $('#mobile-body-overly').toggle();
        });

        $(document).click(function (e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    // Smoth scroll on page hash links
    $('a[href*="#"]:not([href="#"])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();

                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space - 20;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Porfolio filter
    $("#portfolio-flters li").click(function () {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        var selectedFilter = $(this).data("filter");
        $("#portfolio-wrapper").fadeTo(100, 0);

        $(".portfolio-item").fadeOut().css('transform', 'scale(0)');

        setTimeout(function () {
            $(selectedFilter).fadeIn(100).css('transform', 'scale(1)');
            $("#portfolio-wrapper").fadeTo(300, 1);
        }, 300);
    });

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

});

<<<<<<< HEAD
function searchLostPets() {
    var type = $('#lost_pet_types').find(":selected:enabled").val();
    var size = $('#lost_pet_sizes').find(":selected:enabled").val();
    var color = $('#lost_pet_colors').find(":selected:enabled").val();
    var location = $('#locations').find(":selected:enabled").val();

    includeCsrfInAjaxHeader();

    $.ajax({
        url: API.url.search_lost_pets,
        type: 'GET',
        data: {
            type: type,
            size: size,
            color: color,
            location: location
        },
        success: function(pets) {
            $.each(pets, function(key, pet) {
                var box = getOnePetBox(pet.name, pet.picture, pet.description);

                $('#lost-pets-portfolio #portfolio-wrapper').prepend(box);
            });


            // console.log(pets[data]);




            $('#lost-pets-portfolio').removeAttr('hidden');

            $([document.documentElement, document.body]).animate({
                scrollTop: $("#lost-pets-portfolio").offset().top
            }, 2000);
        }
    });
}

// get one box with pet sumary info
function getOnePetBox(name, picture, description) {
    return '<div class="col-lg-3 col-md-6 portfolio-item filter-app">' +
        '<a href="">' +
        '<img src="' + PATH.public + picture + '" alt="" class="portfolio-img">' +
        '<div class="details">' +
        '<h4>' + name + '</h4>' +
        '<span>' + description + '</span>' +
        '</div>' +
        '</a>' +
        '</div>';
}

// include csrf token in ajax headers
function includeCsrfInAjaxHeader() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

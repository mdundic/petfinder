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

/* -------------------------------------------- CUSTOM JS -------------------------------------------- */

// SHOW UPLOADED IMAGE
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

// SHOW UPLOADED IMAGE NAME
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

// Search lost pet
function searchLostPets() {
    var type = $('#lost_pet_types').find(":selected:enabled").val();
    var size = $('#lost_pet_sizes').find(":selected:enabled").val();
    var color = $('#lost_pet_colors').find(":selected:enabled").val();
    var location = $('#lost_locations').find(":selected:enabled").val();

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
            $('#lost-pets-portfolio #portfolio-wrapper').html('');
            $('#lost-pets-portfolio').removeAttr('hidden');
            $('#lost-pets-portfolio #portfolio-no-results').attr("hidden",true);
            $('#lost-pets-portfolio #portfolio-found').attr("hidden",true);

            $([document.documentElement, document.body]).animate({
                scrollTop: $("#lost-pets-portfolio").offset().top
            }, 1000);

            if (jQuery.isEmptyObject(pets)) {
                $('#lost-pets-portfolio #portfolio-no-results').removeAttr('hidden');

                return;
            }

            $.each(pets, function(key, pet) {
                var box = getOnePetBox(pet);

                $('#lost-pets-portfolio #portfolio-wrapper').append(box);
            });

            $('#lost-pets-portfolio #portfolio-found').removeAttr('hidden');
        }
    });
}

// Search found pet
function searchFoundPets() {
    var type = $('#found_pet_types').find(":selected:enabled").val();
    var size = $('#found_pet_sizes').find(":selected:enabled").val();
    var color = $('#found_pet_colors').find(":selected:enabled").val();
    var location = $('#found_locations').find(":selected:enabled").val();

    includeCsrfInAjaxHeader();

    $.ajax({
        url: API.url.search_found_pets,
        type: 'GET',
        data: {
            type: type,
            size: size,
            color: color,
            location: location
        },
        success: function(pets) {
            $('#found-pets-portfolio #portfolio-wrapper').html('');
            $('#found-pets-portfolio').removeAttr('hidden');
            $('#found-pets-portfolio #portfolio-no-results').attr("hidden",true);
            $('#found-pets-portfolio #portfolio-found').attr("hidden",true);
            $('#lost-pets-portfolio #portfolio-lost-pet-added').attr("hidden",true);

            $([document.documentElement, document.body]).animate({
                scrollTop: $("#found-pets-portfolio").offset().top
            }, 1000);

            if (jQuery.isEmptyObject(pets)) {
                $('#found-pets-portfolio #portfolio-no-results').removeAttr('hidden');

                return;
            }

            $.each(pets, function(key, pet) {
                var box = getOnePetBox(pet);

                $('#found-pets-portfolio #portfolio-wrapper').append(box);
            });

            $('#found-pets-portfolio #portfolio-found').removeAttr('hidden');
        }
    });
}

// Include csrf token in ajax headers
function includeCsrfInAjaxHeader() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

// Reset search results list
function resetSearch() {
    $('#lost_pet_types').val("default");
    $('#lost_pet_sizes').val("default");
    $('#lost_pet_colors').val("default");
    $('#lost_locations').val("default");
    $('#found_pet_types').val("default");
    $('#found_pet_sizes').val("default");
    $('#found_pet_colors').val("default");
    $('#found_locations').val("default");
}

// Get one box with pet sumary info
function getOnePetBox(pet) {
    return '<div class="col-lg-3 col-md-6 portfolio-item filter-app">' +
        '<a href="" data-toggle="modal" data-target="#preview-pet-details" style="height: 100%;" ' +
        'data-name="' + pet.name + '"' +
        'data-breed="' + pet.breed + '"' +
        'data-color="' + pet.color + '"' +
        'data-phone="' + pet.contact_phone + '"' +
        'data-description="' + pet.description + '"' +
        'data-location="' + pet.location + '"' +
        'data-date="' + pet.lost_at + '"' +
        'data-picture="' + PATH.public + '/' + pet.picture + '"' +
        'data-size="' + pet.size + '"' +
        'data-type="' + pet.type + '"' +
        '>' +
        '<img src="' + PATH.public + '/' + pet.picture + '" alt="" class="portfolio-img">' +
        '<div class="details">' +
        '<h4>' + pet.name + '</h4>' +
        '<span>' + pet.description + '</span>' +
        '</div>' +
        '</a>' +
        '</div>';
}

// Preview pet details - populate field's data
$('#preview-pet-details').on('show.bs.modal', function (e) {
    $('#preview-pet-details #preview-name').html($(e.relatedTarget).data('name'));
    $('#preview-pet-details #preview-breed').html($(e.relatedTarget).data('breed'));
    $('#preview-pet-details #preview-color').html($(e.relatedTarget).data('color'));
    $('#preview-pet-details #preview-phone').html($(e.relatedTarget).data('phone'));
    $('#preview-pet-details #preview-description').html($(e.relatedTarget).data('description'));
    $('#preview-pet-details #preview-location').html($(e.relatedTarget).data('location'));
    $('#preview-pet-details #preview-date').html($(e.relatedTarget).data('date'));
    $('#preview-pet-details #preview-picture').attr("src", $(e.relatedTarget).data('picture'));
    $('#preview-pet-details #preview-size').html($(e.relatedTarget).data('size'));
    $('#preview-pet-details #preview-type').html($(e.relatedTarget).data('type'));
})

// Add lost pet
function addLostPet() {
    $('#add-lost-pet-errors').html('');
    $('#add-lost-pet-errors').attr("hidden",true);

    var type = $('#add_lost_pet_types').find(":selected:enabled").val();
    var size = $('#add_lost_pet_sizes').find(":selected:enabled").val();
    var color = $('#add_lost_pet_colors').find(":selected:enabled").val();
    var location = $('#add_lost_locations').find(":selected:enabled").val();
    var lost_at = $('#add_lost_at').val();
    var name = $('#add_lost_name').val();
    var breed = $('#add_lost_breed').val();
    var contact_phone = $('#add_lost_contact_phone').val();
    var description = $('#add_lost_description').val();
    var picture = $('#upload')[0].files[0];

    formData = new FormData();

    formData.append('type', type);
    formData.append('size', size);
    formData.append('color', color);
    formData.append('location', location);
    formData.append('lost_at', lost_at);
    formData.append('name', name);
    formData.append('breed', breed);
    formData.append('contact_phone', contact_phone);
    formData.append('description', description);
    formData.append('picture', picture);

    includeCsrfInAjaxHeader();

    $.ajax({
        url: API.url.add_lost_pet,
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: formData,
        success: function() {
            $('#add-lost-pet').modal('hide');

            resetAddLostPetModal();

            $('#lost-pets-portfolio #portfolio-lost-pet-added').removeAttr('hidden');
            $('#lost-pets-portfolio #portfolio-no-results').attr("hidden",true);
            $('#lost-pets-portfolio #portfolio-found').attr("hidden",true);
        },
        error: function(response) {
            var errors = handleErrorResponse(response);

            $('#add-lost-pet-errors').html(errors);
            $('#add-lost-pet-errors').removeAttr('hidden');
        }
    });
}

// handle error response
function handleErrorResponse(response) {
    response = JSON.parse(response.responseText);

    var errors = '';
    if (response.errors) {
        $.each(response.errors, function(key, error) {
            errors += error + '<br>';
        });
    } else {
        errors = Translate.global.message_error
    }

    return errors;
}

// Reset search results list
function resetAddLostPetModal() {
    $('#add_lost_pet_types').val("default");
    $('#add_lost_pet_sizes').val("default");
    $('#add_lost_pet_colors').val("default");
    $('#add_lost_locations').val("default");
    $('#add_lost_at').val('');
    $('#add_lost_name').val('');
    $('#add_lost_breed').val('');
    $('#add_lost_contact_phone').val('');
    $('#add_lost_description').val('');
    $('#upload-label').text('File name:');
    $("#upload").val(null);
}

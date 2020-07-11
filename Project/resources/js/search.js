$(document).ready(function () {
    var registerButton = $('.register-button');
    var scrolledButton = $('#scrolled-button');
    // header scroll
    $(document).scroll(function () {
        var scrollDocument = $(document).scrollTop();
        if (scrollDocument != 0) {
            $('.logobnb').attr('src', 'img/LOGO_UNO_MOD.png');
            $('header').css({
                'background-color': 'white',
                'box-shadow': '1px 1px 15px 5px grey'
            });
            $('.header-dx ul li a').css({
                'color': 'rgb(225, 60, 60)'
            });
            registerButton.addClass('scrolled');
        } else {
            $('.logobnb').attr('src', 'img/LOGO_UNO_MOD_BA.png');
            registerButton.removeClass('scrolled');
            $('header').css({
                'background-color': 'transparent',
                'box-shadow': 'none'
            });
            $('.header-dx ul a').css({
                'color': 'white'
            });
        }
        
    });
    // click sul scrolled-Button
    scrolledButton.click(function () {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        })
    });
    // hover register-button
    registerButton.mouseenter(function(){
        registerButton.css({
            'background-color': 'rgb(225, 60, 60)',
        });
        $('.register-button a').css({
        'color': 'white',
        });
    });
    // hover register-button
    registerButton.mouseleave(function(){
        registerButton.css({
            'background-color': 'transparent'
        });
        if (registerButton.hasClass('scrolled')) {
            $('.register-button a').css({
                'color': 'rgb(225, 60, 60)',
            });
        } else {
            $('.register-button a').css({
                'color': 'white',
            });
        }
    });

    // filtro
    var optionals = [];

    $('.filter').change(function (e) {

        e.preventDefault();
        optionals = [];

        $('input[name="optionals[]"]:checked').each(function () {

            optionals.push($(this).val());
        })

        var radius = $('#distance').val();
        var rooms = $('#rooms').val();
        var beds = $('#beds').val();
        var lat = $('#search-lat').val();
        var lon = $('#search-lon').val();
        $.ajax({
            method: "GET",
            url: "http://localhost:8000/api/search/filter",
            data: {
                optionals: optionals,
                latitude: lat,
                longitude: lon,
                distance: radius,
                beds: beds,
                rooms: rooms
            },
            dataType: "json",
            success: function (response) {
               console.log(response)
            }
        });
    });
});

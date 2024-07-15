(function ($) {
    'use strict';

    var $window = $(window);
    var notiData = $('.notifications-data');
    var messageData = $('.message--data');
    var langData = $('.language-data');
    var profileData = $('.profile-data');

    // Menu General Active Code

    if ($.fn.classyNav) {
        $('#classyNav').classyNav({
            theme: 'dark',
            sideMenu: true,
            openCloseSpeed: 500
        });
    }

    // General Active Code
    $('#classytwo').classyNav({
        sideMenu: false,
        theme: 'light'
    });


    //
    //    // Tooltip Active Code
    //    if ($.fn.tooltip) {
    //        $('[data-toggle="tooltip"]').tooltip();
    //    }

    //    // Tooltip Active Code
    //    if ($.fn.countdown) {
    //        // :: Countdown Active Code
    //        $('#clock').countdown('2026/11/10', function (event) {
    //            $(this).html(event.strftime('<div>%D <span>Days</span></div> <div>%H <span>Hours</span></div> <div>%M <span>Minutes</span></div> <div>%S <span>Seconds</span></div>'));
    //        });
    //    }

    //    // Popover Active Code
    //    if ($.fn.popover) {
    //        $('[data-toggle="popover"]').popover();
    //    }

    // Top Active Code
    $('.top-trigger').on('click', function () {
        $('body').toggleClass('side-menu-off')
    });

    $('.noti--icon').on('click', function () {
        notiData.toggleClass('active');
        messageData.removeClass('active');
        langData.removeClass('active');
        profileData.removeClass('active');
    });

    $('.messag--icon').on('click', function () {
        messageData.toggleClass('active');
        notiData.removeClass('active');
        langData.removeClass('active');
        profileData.removeClass('active');
    });

    $('.language--icon').on('click', function () {
        langData.toggleClass('active');
        messageData.removeClass('active');
        notiData.removeClass('active');
        profileData.removeClass('active');
    });

    $('.user---thumb').on('click', function () {
        profileData.toggleClass('active');
        langData.removeClass('active');
        notiData.removeClass('active');
        messageData.removeClass('active');
    });

    //    // :: 1. Accordian Active Code
    //    (function () {
    //        var dd = $('dd');
    //        dd.filter(':nth-child(n+3)').hide();
    //        $('dl').on('click', 'dt', function () {
    //            $(this).next().slideDown(700).siblings('dd').slideUp(700);
    //        })
    //    })();


    //    // :: 2. FooTable JS Code
    //    if ($.fn.footable) {
    //        $('.footable').footable();
    //    }

    //    // Dropdown Active Code
    //    if ($.fn.dropdown) {
    //        $('dropdown-toggle').dropdown();
    //    }

    // :: onePageNav Active Code
    if ($.fn.onePageNav) {
        $('#nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 1500,
            easing: 'easeOutQuad'
        });
    }


    // :: PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });


})(jQuery);
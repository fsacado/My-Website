require('bootstrap-sass');
require('jquery-scrollify');
let $ = require('jquery');

// $(document).ready(function () {

    if ("ontouchstart" in document.documentElement) {
        $.scrollify.disable();
        $('.home').prop("href", '#identity');
        $('.projects').prop("href", '#project1');
        $('.contact').prop("href", '#contact');
    } else {
        $(function () {
            $('a').css("cursor", "pointer");
            $.scrollify({
                section: ".sectionScroll"
            });
            $('.home').click(function () {
                $.scrollify.move("#identity");
            });

            $('.projects').click(function () {
                $.scrollify.move("#project1");
            });

            $('.contact').click(function () {
                $.scrollify.move("#contact");
            });
        });
    }

    let navbarCollapse = function () {
        if ($(".navbar").offset().top > 100) {
            $(".navbar").addClass("navbar-shrink");
        } else {
            $(".navbar").removeClass("navbar-shrink");
        }
    };

    navbarCollapse();
    $(window).scroll(navbarCollapse);

// });

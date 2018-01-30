require('bootstrap-sass');
require('jquery-scrollify');
let $ = require('jquery');

$(document).ready(function () {

    if ("ontouchstart" in document.documentElement) {
        $.scrollify.disable();
    } else {
        $(function () {
            $.scrollify({
                section: ".section"
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

    $('.home').click(function () {
        $.scrollify.move("#identity");
    });

    $('.projects').click(function () {
        $.scrollify.move("#project1");
    });

});
require('bootstrap-sass');
require('jquery-scrollify');
let $ = require('jquery');

if ("ontouchstart" in document.documentElement) {
    $.scrollify.disable();
} else {
    $(function () {
        $.scrollify({
            section: ".section"
        });
    });
}

// $(".nav a").on("click", function(e){
//     $.scrollify("move", $(this).find("href").find("id"));
// });
// $('body').scrollspy({target: ".navbar"});
// $(".nav a").on("click", function(){
//    if (this.hash !== "") {
//        event.preventDefault();
//        let hash = this.hash;
//        $('html, body').animate({
//            scrollTop: $(hash).offset().top
//        }, 800, function() {
//            window.location.hash = hash;
//        });
//    }
// });

let navbarCollapse = function() {
    if ($(".navbar").offset().top > 100) {
        $(".navbar").addClass("navbar-shrink");
    } else {
        $(".navbar").removeClass("navbar-shrink");
    }
};

// navbarCollapse();
$(window).scroll(navbarCollapse);


require('bootstrap-sass');

$(function() {
    $.scrollify({
       section: ".section"
    });
});

$("#identity").click(function() {
   $.scrollify.move("#project1");
});
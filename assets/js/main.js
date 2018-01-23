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
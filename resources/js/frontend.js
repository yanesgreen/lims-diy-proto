try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {
}

$(document).ready(function () {

    $(window).scroll(function () {
        $('.topnav').toggleClass('bg-white navbar-light shadow-sm scrollednav py-0', $(this).scrollTop() > 50);
    });

});

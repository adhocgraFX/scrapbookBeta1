//  Avoid `console` errors in browsers that lack a console.
(function () {
    var method;
    var noop = function () {
    };
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// sticky nav
jQuery(document).ready(function () {
    var stickyNavTop = jQuery('.app-bar').offset().top;

    var stickyNav = function () {
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            jQuery('.app-bar').addClass('sticky');
            jQuery('.layout').addClass('sticked');
        } else {
            jQuery('.app-bar').removeClass('sticky');
            jQuery('.layout').removeClass('sticked');
        }
    };

    stickyNav();

    jQuery(window).scroll(function () {
        stickyNav();
    });
});

// go to top
jQuery(document).ready(function () {
    var offset = 240;
    var duration = 500;

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.go-top').fadeIn(duration);
        } else {
            jQuery('.go-top').fadeOut(duration);
        }
    });

    jQuery('.go-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
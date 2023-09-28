jQuery(document).ready(function ($) {
    $.fn.disableScroll = function () {
        window.oldScrollPos = $(window).scrollTop();
        $(window).on('scroll.scrolldisabler', function (event) {
            $(window).scrollTop(window.oldScrollPos);
            event.preventDefault();
        });
    };

    $.fn.enableScroll = function () {
        $(window).off('scroll.scrolldisabler');
    };

    // hide menu on scroll
    function navHide () {
        let didScroll;
        let lastScrollTop = 0;
        const delta = 5;
        const navbarHeight = $('.site__header').outerHeight();

        $(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled () {
            const st = $(this).scrollTop();
            // Make sure they scroll more than delta

            if (Math.abs(lastScrollTop - st) <= delta) return;
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.

            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                $('.site__header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if (st + $(window).height() < $(document).height()) {
                    $('.site__header').removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    }

    navHide();

    $('body').css('padding-top', $('.site__header').outerHeight());
});

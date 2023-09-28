jQuery(document).ready(function ($) {
    /**
     * Add the scrollbar width as a CSS variable for width calculations
     */
    document.body.style.setProperty('--scroll-bar-w', window.innerWidth - document.body.clientWidth + 'px');

    const docWidth = document.documentElement.offsetWidth;

    [].forEach.call(
        document.querySelectorAll('*'),
        function (el) {
            if (el.offsetWidth > docWidth) {
                console.log(el);
            }
        }
    );

    /**
     * Hero
     * Scroll to next section
     */
    $('.scroll-to-next-section').on('click', function () {
        const nextSection = $(this).parents('.hero').next()[0];
        let yOffset = 0;

        if (nextSection) {
            if (!nextSection.classList.contains('different-background')) {
                yOffset = parseInt(window.getComputedStyle(nextSection).marginTop);

                if (yOffset > 0) {
                    yOffset = yOffset * -1;
                }
            }

            const whereTo = nextSection.getBoundingClientRect().top + window.pageYOffset + yOffset;

            window.scrollTo({
                top: whereTo,
                behavior: 'smooth'
            });
        }
    });

    /**
     * Search
     */
    function toggleSearchModal (e) {
        $('.modal--search').toggleClass('visible');
        $('body, html').toggleClass('menu-opened');
    }

    function removeSearchModal (e) {
        $('.modal--search').removeClass('visible');
        $('body, html').removeClass('menu-opened');
    }

    function addSearchEvents () {
        $('.menu-item--search-trigger').click(toggleSearchModal);
        $('#modal-close').click(removeSearchModal);
    }

    if (window.matchMedia('screen and (max-width: 640px)').matches) {
        $('.search-form__button .visually-hidden').removeClass('visually-hidden');
    }

    $('[data-href]').on('click', function () {
        window.location.href = $(this).data('href');
    });

    addSearchEvents();

    /**
     * Header
     * Adjust height
     */
    let resizetimer = null;

    function adjustHeaderHeight () {
        const navbarHeight = $('.site__header')[0].offsetHeight;
        const subMenuOffset = $('nav.nav').offset().left + parseInt($('nav.nav').css('padding-left').replace(/\D/g, ''));
        $('body').css('padding-top', navbarHeight);
        $('body').css('--header-h', navbarHeight + 'px');
        $('body').css('--sub-menu-offset', (subMenuOffset * -1) + 'px');
    }

    $(window).on('resize', function () {
        clearTimeout(resizetimer);
        resizetimer = window.setTimeout(function () {
            adjustHeaderHeight();
        }, 250);
    });

    adjustHeaderHeight();

    /**
     * Header
     * Mobile menu
     */
    $('#menu-toggler').click(function () {
        $('header .nav').toggleClass('nav--mobile-opened');
        $('body, html').toggleClass('menu-opened');
        $('.hamburger-menu').toggleClass('hamburger-menu--active');
        $('header .nav').removeClass('nav--sub-menu-opened');

        // wait to hide the whole drawer then move the sub menu
        window.setTimeout(function () {
            $('.nav__main .menu > .menu-item-has-children').removeClass('menu-item--show-sub-menu');
        }, 480);
    });

    if (window.matchMedia('screen and (max-width: 1024px)').matches) {
        adjustDOMForMobileNav();
        addNavEvents();
    }

    function adjustDOMForMobileNav () {
        moveSearchTrigger();
        addFooterLinksToNav();
        addBackButtonToSecondLevel();

        // make sure all the dom adjustments are done before updtating he header height
        window.setTimeout(function () {
            adjustHeaderHeight();
        }, 10);
    }

    function moveSearchTrigger () {
        const $searchTrigger = $('.menu-item--search-trigger');
        const $triggerLink = $searchTrigger.find('a').first();
        const id = $searchTrigger.attr('id');
        const classes = $searchTrigger.attr('class');
        const $newTrigger = $('<span class="' + classes + '" id="' + id + '"></span>');

        $triggerLink.appendTo($newTrigger);
        $newTrigger.prependTo('.hamburger-menu');
        $searchTrigger.remove();
    }

    function addFooterLinksToNav () {
        const $usefulLinks = $('.menu--useful-links').clone();
        const $credits = $('footer .credits').clone();

        $usefulLinks.addClass('nav__useful-links');
        $usefulLinks.attr('class', removeFooterClasses);
        $credits.addClass('nav__credits');
        $credits.attr('class', removeFooterClasses);

        $usefulLinks.appendTo('.nav__wrapper');
        $credits.appendTo('.nav__wrapper');
    }

    function addBackButtonToSecondLevel () {
        const $secondLevels = $('.nav__main > .menu > .menu-item-has-children > .sub-menu');
        const $backButton = $('<li class="menu-item--back-button"><a href="javascript:void(0)">' + $('.site__header').data('back-button-text') + '</a></li>');
        $backButton.prependTo($secondLevels);
    }

    function removeFooterClasses (i, value) {
        const newClasses = value.replace(/(^|\s)col-\S+/g, '');
        return newClasses.replace(/(^|\s)footer-\S+/g, '');
    }

    function addNavEvents () {
        $('.nav__main > .menu > .menu-item-has-children').click(function (e) {
            if (e.target.classList.contains('theme-impacts') || e.target.classList.contains('theme-process')) {
                e.preventDefault();
                $(this).addClass('menu-item--show-sub-menu');
                $('header .nav').addClass('nav--sub-menu-opened');
            }
        });

        $('.nav__main .sub-menu .menu-item--back-button').click(function (e) {
            e.preventDefault();
            $(this).closest('.menu-item--show-sub-menu').removeClass('menu-item--show-sub-menu');
            $('header .nav').removeClass('nav--sub-menu-opened');
        });

        addSearchEvents();
    }

    /**
     * Tooltips
     */
    const tooltips = document.querySelectorAll('.tooltip');
    let scrollTimer = null;

    if (window.matchMedia('screen and (max-width: 800px)').matches) {
        // Mobile tooltips
        $('.tooltip').fancybox();
    }
    else {
        // Desktop tooltips
        for (let i = 0; i < tooltips.length; i++) {
            tooltips[i].addEventListener('click', onTooltipClick);
        }

        function onTooltipClick (e) {
            const classList = e.currentTarget.classList;

            if (classList.contains('active')) {
                e.currentTarget.classList.remove('active');
            }
            else {
                e.currentTarget.classList.add('active');
            }
        }

        // Hide tooltips on scroll
        $(window).on('scroll', function () {
            window.clearTimeout(scrollTimer);
            scrollTimer = window.setTimeout(function () {
                const activeTooltips = document.querySelectorAll('.tooltip.active');

                for (let i = 0; i < activeTooltips.length; i++) {
                    activeTooltips[i].classList.remove('active');
                }
            }, 100);
        });
    }

    /**
     * Adding span tag to last word of the button and adding class "last word"
     * It helps to add arrow to last word of the button so they never separetes and it prevents arrow from changing the line alone
     */
    function addTagToLastWord () {
        $('.cta--main, .cta--secondary, .cta--external, .menu-pied-de-page-contexte-container li a, .menu-pied-de-page-donnees-container li a, .menu-pied-de-page-historique-container li a, a[target="_blank"]').html(function () {
            const counter = document.getElementsByClassName('glossaries-counter');

            if (!this.contains(counter['1'])) {
                const text = $(this).text().split(' ');

                if (text.length === 1) {
                    return ('<span class="last-word">' + text[0] + '</span>');
                }
                else {
                    const last = text.pop();
                    return text.join(' ') + (text.length > 0 ? ' <span class="last-word">' + last + '</span>' : last);
                }
            }
            else {
                const glossaire = document.querySelectorAll('.menu-pied-de-page-contexte-container .menu-item--glossaries a')[0].innerHTML;
                return '<span class="last-word">' + glossaire + '</span>';
            }
        });
    }

    addTagToLastWord();
});

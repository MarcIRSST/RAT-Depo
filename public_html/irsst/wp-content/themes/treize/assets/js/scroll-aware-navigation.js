/* global IntersectionObserver */

/**
 * Treize: Anchor Navigation
 *
 * Steps to use this.
 * 1. Add contextual ids `scroll-aware-navigation` and `scroll-aware-content` to the nav and it's content
 * 2. Add the `scroll-aware-section` class to the content section
 * 3. Add the `scroll-aware-link` class to the navigation links
 * 4. Style active links with the `scroll-aware-links--active` class
 * 5. ENJOY :)
 *
 * Optional: Add prev and next buttons
 * 1. Add the `.scroll-aware-button` on your buttons
 * 2. Add the `data-action` attribute tot the links with either `prev` or `next` (you can even add action in the code)
 * 3. ENJOY :)
 *
 * Notes:
 * Depending on the length of the content, you might want to adjusts the threshold
 */
document.addEventListener('DOMContentLoaded', (e) => {
    let scrollTimeout = null;
    const sacConfig = {
        threshold: [0.1, 0.2, 0.3, 0.5, 0.8],
        ratio: 0.8,
        rootMargin: '0'
    };

    // Custom configuration
    if (document.body.classList.contains('post-type-archive')) {
        sacConfig.threshold = [];
        let increment = 0.5;

        if (document.body.classList.contains('post-type-archive-bibliographies')) {
            increment = 0.2;
        }

        for (let i = 0; i < 1; i += increment) {
            sacConfig.threshold.push(i);
        }

        sacConfig.ratio = 0.1;
    }

    function initScrollawareNavigation () {
        const menu = document.getElementById('scroll-aware-navigation');
        const content = document.getElementById('scroll-aware-content');

        if (!menu || !content) {
            return;
        }

        setupIntersectionObserver(menu, content);
    }

    function initButtonNavigation () {
        const buttons = document.querySelectorAll('.scroll-aware-button');

        if (buttons.length === 0) {
            return;
        }

        setupButtonNavigation(buttons);
    }

    /**
     * Setup the observer
     */
    function setupIntersectionObserver (menu, content) {
        const sections = content.querySelectorAll('.scroll-aware-section');
        const observerOptions = {
            root: null,
            rootMargin: content.dataset.rootMargin || '0px',
            threshold: sacConfig.threshold
        };
        const observer = new IntersectionObserver(observerCallback, observerOptions);

        for (let i = 0; i < sections.length; i++) {
            observer.observe(sections[i]);
        }

        /**
         * Small addon to prevent scrollElementIntoViewport from hijacking the scroll
         * when clicking on an anchor outside the current view.
         */
        const navItems = menu.querySelectorAll('.scroll-aware-link');
        window.stopScrollAfterClick = false;

        for (let i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener('click', function (e) {
                window.stopScrollAfterClick = true;
                window.addEventListener('scroll', function () {
                    window.clearInterval(scrollTimeout);
                    scrollTimeout = window.setTimeout(function () {
                        window.stopScrollAfterClick = false;
                    }, 500);
                });
            });
        }
    }

    /**
     * Logic for when the observer triggers
     */
    function observerCallback (entries, observer) {
        entries.forEach((entry) => {
            if (entry.target.id.length > 0) {
                const navItem = document.querySelector(`.scroll-aware-link[href="#${entry.target.id}"]`);

                if (entry.isIntersecting) {
                    const ratio = sacConfig.ratio;
                    const targetBiggerThanViewport = entry.intersectionRatio < ratio && entry.target.offsetHeight > window.innerHeight;
                    const targetFullyInViewport = entry.intersectionRatio >= ratio;

                    if (!navItem.classList.contains('in-viewport') && !window.stopScrollAfterClick) {
                        scrollElementIntoViewport(navItem);
                    }

                    navItem.classList.add('in-viewport');

                    if (targetBiggerThanViewport || targetFullyInViewport) {
                        const activeItems = document.querySelectorAll('.scroll-aware-link--active');

                        for (let i = 0; i < activeItems.length; i++) {
                            activeItems[i].classList.remove('scroll-aware-link--active');
                        }

                        navItem.classList.add('scroll-aware-link--active');
                    }
                } else {
                    navItem.classList.remove('in-viewport');
                }
            } else {
                console.warn('Some scroll aware sections don\'t have a proper ID attribute.', entry.target);
            }
        });
    }

    /**
     * Add events for the navigation
     */
    function setupButtonNavigation (buttons) {
        const links = document.querySelectorAll('.scroll-aware-link');

        for (let i = 0; i < links.length; i++) {
            links[i].dataset.scrollAwarePosition = i;
        }

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', onButtonClick);
        }
    }

    /**
     * On nav button click move in the correct direction
     */
    function onButtonClick (e) {
        const activeLinks = document.querySelectorAll('.in-viewport');

        if (activeLinks.length > 0) {
            const action = e.currentTarget.dataset.action;
            let goToLink = null;
            let positionIncrement = 1;
            let goToPosition = parseInt(activeLinks[activeLinks.length - 1].dataset.scrollAwarePosition) + 1;

            if (action === 'prev') {
                goToPosition = parseInt(activeLinks[0].dataset.scrollAwarePosition) - 1;
                positionIncrement = -1;
            }

            while (goToLink === null && goToPosition >= 0 && goToPosition < 33) {
                goToLink = document.querySelector('[data-scroll-aware-position="' + goToPosition + '"]');
                goToPosition += positionIncrement;
            }

            if (goToLink) {
                const goToElement = document.getElementById(goToLink.href.split('#')[1]);
                goToElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    }

    function scrollElementIntoViewport (elem) {
        const parent = elem.closest('#scroll-aware-navigation');
        const rect = elem.getBoundingClientRect();
        const config = {
            behavior: 'smooth'
        };
        let scrollToPosition = null;
        let direction = 'left';

        if (rect.left < 0) {
            // item hidden on the left
            scrollToPosition = elem.offsetLeft;
        } else if (rect.right > window.innerWidth) {
            // item hidden on the right
            scrollToPosition = elem.offsetLeft - window.innerWidth + elem.offsetWidth + 44;
        } else if (rect.top > window.innerHeight) {
            // item hidden below
            direction = 'top';

            if (elem.parentNode === elem.parentNode.parentNode.lastElementChild) {
                scrollToPosition = parent.offsetHeight;
            } else {
                scrollToPosition = rect.top - window.innerHeight + parent.scrollTop + elem.offsetHeight * 3;
            }
        } else if (rect.bottom < 0) {
            // item hidden above
            direction = 'top';

            if (elem.parentNode === elem.parentNode.parentNode.firstElementChild) {
                scrollToPosition = 0;
            } else {
                scrollToPosition = elem.offsetTop;
            }
        }

        if (scrollToPosition !== null) {
            config[direction] = scrollToPosition;
            parent.scrollTo(config);
        }
    }

    initScrollawareNavigation();
    initButtonNavigation();
});

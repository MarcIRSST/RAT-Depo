/* global history */

/**
 * Javascript to handle the different archives
 */
document.addEventListener('DOMContentLoaded', (e) => {
    const archiveConfig = {
        hero: null,
        nav: null
    };

    /**
     * Initialize the config and the functions
     */
    function archiveConstructor () {
        const hero = document.querySelector('.archive-hero');
        const nav = document.querySelector('.archive__nav');
        const search = document.querySelector('#archive-search');

        archiveConfig.hero = hero;
        archiveConfig.nav = nav;

        calculateStickyPosition();

        if (search) {
            initializeSearch();
        }

        if (archiveConfig.nav) {
            initializeArchiveNav();
        }

        if (archiveConfig.hero) {
            addCloseButton();
        }
    }

    /**
     * Make sure elements stick at the right positions
     */
    function calculateStickyPosition () {
        const index = document.querySelectorAll('.archive__index');
        let offset = archiveConfig.hero.offsetHeight;

        if (archiveConfig.nav) {
            archiveConfig.nav.setAttribute('style', '--sticky-top:' + archiveConfig.hero.offsetHeight + 'px');
            offset += archiveConfig.nav.offsetHeight;
        }

        for (let i = 0; i < index.length; i++) {
            index[i].setAttribute('style', '--sticky-top:' + offset + 'px');
        }
    }

    /**
     * Register events for the archive navigation
     */
    function initializeArchiveNav () {
        const navLinks = document.querySelectorAll('.archive__nav-item');
        const resetFilterLink = document.getElementById('archive-reset-filter');

        for (let i = 0; i < navLinks.length; i++) {
            navLinks[i].addEventListener('click', onArchiveNavItemClick);
        }

        resetFilterLink.addEventListener('click', resetFilter);
    }

    function addCloseButton () {
        const closeButton = document.getElementById('archive-close');
        closeButton.addEventListener('click', closeArchive);
    }

    /**
     * On archive nav item click
     *
     * Scroll to the right position considering the sticky elements
     */
    function onArchiveNavItemClick (e) {
        if (e.preventDefault) {
            e.preventDefault();
        }

        const offset = archiveConfig.hero.offsetHeight + archiveConfig.nav.offsetHeight;
        let element = null;

        if (e.currentTarget.href) {
            const anchor = e.currentTarget.href.split('#');
            element = document.getElementById(anchor[anchor.length - 1]);
        } else {
            element = e.currentTarget;
        }

        const scrollToTop = element.getBoundingClientRect().top + window.pageYOffset - offset;
        const behavior = e.behavior || 'smooth';

        window.scrollTo({
            top: scrollToTop,
            behavior: behavior
        });
    }

    /**
     * Add proper event listeners for the search functionnality
     */
    function initializeSearch () {
        const searchInput = document.getElementById('archive-search');
        let debounceTimer = null;

        searchInput.addEventListener('keyup', function (e) {
            window.clearTimeout(debounceTimer);
            debounceTimer = window.setTimeout(() => {
                filterArchiveContent(e);
            }, 250);
        });
    }

    /**
     * Filter the archive content dynamically
     */
    function filterArchiveContent (e) {
        const term = e.currentTarget ? e.currentTarget.value : e.target.value;
        const toFilter = document.querySelectorAll('.archive-card');
        const validItems = [];

        for (let i = 0; i < toFilter.length; i++) {
            const item = toFilter[i];

            if (item.dataset.searchTerm.includes(term.toLowerCase())) {
                item.style.display = 'block';
                item.classList.remove('item-filtered-away');
                validItems.push(item);
            } else {
                item.style.display = 'none';
                item.classList.add('item-filtered-away');
            }

            // Hide parent if no children are visible
            const filteredItems = item.parentNode.querySelectorAll('.item-filtered-away');
            const parentNode = item.closest('.archive__index');
            const relatedLetterLink = document.querySelector('[href="#lettre-' + parentNode.dataset.letter + '"]');

            if (item.parentNode.childElementCount === filteredItems.length) {
                parentNode.style.display = 'none';
                parentNode.classList.add('parent-filtered-away');
                relatedLetterLink.classList.add('archive__nav-item--empty');
            } else {
                parentNode.style.display = 'block';
                parentNode.classList.remove('parent-filtered-away');
                relatedLetterLink.classList.remove('archive__nav-item--empty');
            }

            // Show empty message when no parents are left
            const filteredParents = document.querySelectorAll('.parent-filtered-away');
            const allParents = document.querySelectorAll('.archive__index');

            if (filteredParents.length === allParents.length) {
                document.getElementById('archive-empty-message').style.display = 'block';
                onArchiveNavItemClick({
                    currentTarget: document.getElementById('archive-empty-message'),
                    behavior: 'auto'
                });
            } else {
                document.getElementById('archive-empty-message').style.display = 'none';
            }
        }

        // Scroll to the first valid item
        if (validItems.length > 0) {
            onArchiveNavItemClick({
                currentTarget: document.querySelector('[href="#' + validItems[0].closest('.scroll-aware-section').id + '"'),
                behavior: 'auto'
            });
        }
    }

    /**
     * Go back to previous page if the page is on the website,
     * otherwise go to the homepage.
     */
    function closeArchive (e) {
        e.preventDefault();

        if (document.referrer.length > 0 && document.referrer.includes(window.location.hostname)) {
            history.back();
        } else {
            window.location.href = '/';
        }
    }

    /**
     * Reset the filter to an empty string
     */
    function resetFilter (e) {
        const searchInput = document.getElementById('archive-search');
        searchInput.value = '';
        filterArchiveContent({
            currentTarget: searchInput
        });
    }

    archiveConstructor();
});

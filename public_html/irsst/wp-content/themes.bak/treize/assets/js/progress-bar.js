/**
 * Treize: Progress Bar
 *
 * Steps to use this.
 * 1. Add id `progress-bar` to your element.
 * 2. Style that element accordingly.
 *
 * Nav arrow support is specific to this project.
 */
document.addEventListener('DOMContentLoaded', (e) => {
    function initProgressBar () {
        const progressBar = document.getElementById('progress-bar');

        if (!progressBar && window.innerWidth <= 1024) {
            return;
        }

        setupProgressBar();
    }

    function initNavArrows () {
        const navArrows = document.querySelector('.nav__arrows');

        if (!navArrows && window.innerWidth <= 1024) {
            return;
        }

        setupNavArrows();
    }

    function setupProgressBar () {
        window.addEventListener('scroll', updateProgressBar);
    }

    function setupNavArrows () {
        let debounceTimer = null;
        window.addEventListener('scroll', function debounceNav () {
            window.clearTimeout(debounceTimer);
            debounceTimer = window.setTimeout(() => {
                toggleNavArrows();
            }, 100);
        });
    }

    function updateProgressBar (e) {
        const progressBar = document.getElementById('progress-bar');
        const footer = document.querySelector('.site__content > footer');
        const percentageScrolled = window.scrollY * 100 / (document.documentElement.scrollHeight - window.innerHeight - footer.offsetHeight);
        const progressBarWidth = percentageScrolled * document.body.clientWidth / 100;
        progressBar.style.width = Math.round(Math.min(progressBarWidth, document.body.clientWidth)) + 'px';
    }

    function toggleNavArrows () {
        const mainContentRect = document.querySelector('.purpose').getBoundingClientRect();
        const navArrows = document.querySelector('.nav__arrows');

        if (mainContentRect.bottom - window.innerHeight < 0) {
            return navArrows.classList.remove('show-in-viewport');
        } else if (mainContentRect.top < 0) {
            return navArrows.classList.add('show-in-viewport');
        }

        return navArrows.classList.remove('show-in-viewport');
    }

    initProgressBar();
    initNavArrows();
});

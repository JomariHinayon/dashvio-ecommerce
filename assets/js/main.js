(function($) {
    'use strict';

    $(document).ready(function() {
        
        const mobileBreakpoint = 768;
        const $menuToggle = $('.menu-toggle');
        const $mainNavigation = $('.main-navigation');
        
        function closeMobileMenu() {
            $mainNavigation.removeClass('is-open');
            $menuToggle.attr('aria-expanded', 'false').removeClass('is-active');
        }
        
        function handleOutsideClick(event) {
            if (!$mainNavigation.hasClass('is-open')) {
                return;
            }
            if (!$(event.target).closest('.site-header').length) {
                closeMobileMenu();
            }
        }
        
        function handleResize() {
            if ($(window).width() > mobileBreakpoint) {
                closeMobileMenu();
            }
        }
        
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            const isOpen = $mainNavigation.toggleClass('is-open').hasClass('is-open');
            $(this).toggleClass('is-active', isOpen).attr('aria-expanded', isOpen);
        });
        
        $(document).on('click', handleOutsideClick);
        $(window).on('resize', handleResize);

        const THEME_KEY = 'dashvio-theme';
        const root = document.documentElement;
        const toggle = document.getElementById('dashvio-theme-toggle');

        function applyTheme(theme) {
            root.setAttribute('data-theme', theme);
            if (!toggle) {
                return;
            }
            if (theme === 'dark') {
                toggle.classList.add('is-dark');
                toggle.setAttribute('aria-label', 'Switch to light mode');
            } else {
                toggle.classList.remove('is-dark');
                toggle.setAttribute('aria-label', 'Switch to dark mode');
            }
        }

        if (toggle) {
            let savedTheme = localStorage.getItem(THEME_KEY);
            if (!savedTheme) {
                savedTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            applyTheme(savedTheme);

            toggle.addEventListener('click', function() {
                const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                applyTheme(nextTheme);
                localStorage.setItem(THEME_KEY, nextTheme);
            });
        }

        const whyToggle = document.getElementById('dashvio-why-toggle');
        const whyContent = document.getElementById('dashvio-why-content');
        
        if (whyToggle && whyContent) {
            whyToggle.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
                whyContent.classList.toggle('is-open');
            });
        }
        
    });

})(jQuery);


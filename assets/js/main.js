(function($) {
    'use strict';

    $(document).ready(function() {
        
        const mobileBreakpoint = 768;
        
        function initMobileMenu() {
            if ($(window).width() <= mobileBreakpoint) {
                $('.main-navigation').addClass('mobile-menu');
            } else {
                $('.main-navigation').removeClass('mobile-menu');
            }
        }
        
        initMobileMenu();
        
        $(window).on('resize', function() {
            initMobileMenu();
        });
        
        $('.site-header').on('click', '.menu-toggle', function(e) {
            e.preventDefault();
            $('.main-navigation').toggleClass('active');
        });
        
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                $('.main-navigation').removeClass('active');
            }
        });

        const THEME_KEY = 'dashvio-theme';
        const root = document.documentElement;
        const toggle = document.getElementById('dashvio-theme-toggle');

        function applyTheme(theme) {
            root.setAttribute('data-theme', theme);
            if (!toggle) {
                return;
            }
            if (theme === 'dark') {
                toggle.classList.add('active');
                toggle.querySelector('.theme-toggle__icon').textContent = '🌙';
            } else {
                toggle.classList.remove('active');
                toggle.querySelector('.theme-toggle__icon').textContent = '☀️';
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
        
    });

})(jQuery);


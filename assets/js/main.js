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
        
        // Scroll Fade Animation
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        
        document.querySelectorAll('.dash-scroll-fade').forEach(el => {
            observer.observe(el);
        });
        
        // Animated Counters
        function animateCounter(element, target, duration, suffix) {
            duration = duration || 2000;
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(function() {
                start += increment;
                if (start >= target) {
                    element.textContent = target + (suffix || '');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start) + (suffix || '');
                }
            }, 16);
        }
        
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    const suffix = entry.target.getAttribute('data-suffix') || '';
                    animateCounter(entry.target, target, 2000, suffix);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.dash-counter').forEach(counter => {
            counterObserver.observe(counter);
        });
        
    });

})(jQuery);


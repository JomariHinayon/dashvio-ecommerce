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
        
    });

})(jQuery);


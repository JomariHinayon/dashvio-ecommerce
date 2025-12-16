(function($) {
    'use strict';
    
    function initFAQs() {
        $('.dashvio-faq-question').on('click', function() {
            var $item = $(this).closest('.dashvio-faq-item');
            var $answer = $item.find('.dashvio-faq-answer');
            var isActive = $item.hasClass('active');
            
            $('.dashvio-faq-item').removeClass('active');
            $('.dashvio-faq-question').attr('aria-expanded', 'false');
            
            if (!isActive) {
                $item.addClass('active');
                $(this).attr('aria-expanded', 'true');
            }
        });
    }
    
    function initWhyDashvio() {
        $('.dashvio-why-toggle__btn').on('click', function() {
            var $btn = $(this);
            var $content = $btn.next('.dashvio-why-content');
            var isExpanded = $btn.attr('aria-expanded') === 'true';
            
            if (isExpanded) {
                $content.removeClass('is-open');
                $btn.attr('aria-expanded', 'false');
            } else {
                $content.addClass('is-open');
                $btn.attr('aria-expanded', 'true');
            }
        });
    }
    
    $(document).ready(function() {
        initFAQs();
        initWhyDashvio();
    });
    
    $(document).on('elementor/popup/show', function() {
        initFAQs();
        initWhyDashvio();
    });
    
})(jQuery);


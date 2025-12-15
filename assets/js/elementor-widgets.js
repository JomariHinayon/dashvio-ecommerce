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
    
    $(document).ready(function() {
        initFAQs();
    });
    
    $(document).on('elementor/popup/show', function() {
        initFAQs();
    });
    
})(jQuery);


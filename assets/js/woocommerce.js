(function($) {
    'use strict';

    $(document).ready(function() {
        
        $(document.body).on('added_to_cart', function(event, fragments, cart_hash, button) {
            const cartCount = $('.cart-count');
            if (cartCount.length) {
                cartCount.addClass('updated');
                setTimeout(function() {
                    cartCount.removeClass('updated');
                }, 300);
            }
        });
        
        $('.products').on('mouseenter', '.product', function() {
            $(this).addClass('hovered');
        }).on('mouseleave', '.product', function() {
            $(this).removeClass('hovered');
        });
        
    });

})(jQuery);


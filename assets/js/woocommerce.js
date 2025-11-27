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
        
        $('.products').on('click', '.dashvio-qty__btn', function() {
            var $btn = $(this);
            var $quantityWrapper = $btn.siblings('.quantity');
            var $input = $quantityWrapper.find('input.qty');
            
            if (!$input.length) {
                return;
            }
            
            var currentVal = parseFloat($input.val());
            var max = parseFloat($input.attr('max'));
            var min = parseFloat($input.attr('min'));
            var step = parseFloat($input.attr('step'));
            
            if (isNaN(currentVal)) {
                currentVal = 1;
            }
            if (isNaN(min)) {
                min = 1;
            }
            if (isNaN(max)) {
                max = Infinity;
            }
            if (isNaN(step) || step <= 0) {
                step = 1;
            }
            
            if ($btn.data('type') === 'plus') {
                if (currentVal + step <= max) {
                    $input.val(currentVal + step);
                } else {
                    $input.val(max);
                }
            } else {
                if (currentVal - step >= min) {
                    $input.val(currentVal - step);
                } else {
                    $input.val(min);
                }
            }
            
            $input.trigger('change');
        });
        
    });

})(jQuery);


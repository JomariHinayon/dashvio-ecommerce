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
        
        // Quick View Modal Functionality
        const $quickViewModal = $('#dashvio-quick-view-modal');
        const $quickViewBody = $('.dashvio-quick-view-body');
        const $quickViewLoader = $('.dashvio-quick-view-loader');
        const $quickViewClose = $('.dashvio-quick-view-close');
        const $quickViewOverlay = $('.dashvio-quick-view-overlay');
        
        // Open Quick View for WooCommerce Products
        $(document).on('click', '.dashvio-quick-view-btn[data-product-id]', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = $(this).data('product-id');
            if (!productId) return;
            
            openQuickView();
            loadProductQuickView(productId);
        });
        
        // Open Quick View for Templates
        $(document).on('click', '.dashvio-quick-view-btn[data-demo-id]', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const demoId = $(this).data('demo-id');
            if (!demoId) return;
            
            openQuickView();
            loadTemplateQuickView(demoId);
        });
        
        // Close Quick View
        $quickViewClose.on('click', closeQuickView);
        $quickViewOverlay.on('click', closeQuickView);
        
        // Close on ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $quickViewModal.hasClass('active')) {
                closeQuickView();
            }
        });
        
        function openQuickView() {
            $quickViewModal.addClass('active');
            $quickViewBody.hide();
            $quickViewLoader.show();
            $('body').css('overflow', 'hidden');
        }
        
        function closeQuickView() {
            $quickViewModal.removeClass('active');
            $quickViewBody.hide().html('');
            $quickViewLoader.hide();
            $('body').css('overflow', '');
        }
        
        function loadProductQuickView(productId) {
            $.ajax({
                url: dashvioQuickView.ajaxurl || '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'dashvio_get_product_quick_view',
                    product_id: productId,
                    nonce: dashvioQuickView.nonce || ''
                },
                success: function(response) {
                    if (response.success && response.data) {
                        $quickViewBody.html(response.data.html).show();
                        $quickViewLoader.hide();
                        
                        // Re-initialize quantity controls in modal
                        initQuantityControls();
                    } else {
                        $quickViewBody.html('<p>Error loading product details.</p>').show();
                        $quickViewLoader.hide();
                    }
                },
                error: function() {
                    $quickViewBody.html('<p>Error loading product details. Please try again.</p>').show();
                    $quickViewLoader.hide();
                }
            });
        }
        
        function loadTemplateQuickView(demoId) {
            $.ajax({
                url: dashvioQuickView.ajaxurl || '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'dashvio_get_template_quick_view',
                    demo_id: demoId,
                    nonce: dashvioQuickView.nonce || ''
                },
                success: function(response) {
                    if (response.success && response.data) {
                        $quickViewBody.html(response.data.html).show();
                        $quickViewLoader.hide();
                    } else {
                        $quickViewBody.html('<p>Error loading template details.</p>').show();
                        $quickViewLoader.hide();
                    }
                },
                error: function() {
                    $quickViewBody.html('<p>Error loading template details. Please try again.</p>').show();
                    $quickViewLoader.hide();
                }
            });
        }
        
        function initQuantityControls() {
            $('.dashvio-qty__btn').off('click').on('click', function() {
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
                
                if (isNaN(currentVal)) currentVal = 1;
                if (isNaN(min)) min = 1;
                if (isNaN(max)) max = Infinity;
                if (isNaN(step) || step <= 0) step = 1;
                
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
        }
        
    });

})(jQuery);


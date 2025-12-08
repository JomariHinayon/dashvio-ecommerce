(function($) {
    'use strict';
    
    function showSuccessNotification(message) {
        var cartUrl = typeof wc_add_to_cart_params !== 'undefined' ? wc_add_to_cart_params.cart_url : '/cart';
        
        var notification = $('<div class="dashvio-cart-notification">' +
            '<div class="dashvio-cart-notification__content">' +
            '<div class="dashvio-cart-notification__info">' +
            '<svg class="dashvio-cart-notification__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
            '<path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>' +
            '</svg>' +
            '<span class="dashvio-cart-notification__message">' + message + '</span>' +
            '</div>' +
            '<a href="' + cartUrl + '" class="dashvio-cart-notification__btn">View Cart</a>' +
            '</div>' +
            '</div>');
        
        $('body').append(notification);
        
        setTimeout(function() {
            notification.addClass('active');
        }, 10);
        
        setTimeout(function() {
            notification.removeClass('active');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 4000);
    }
    
    function updateCartCount() {
        if (typeof wc_add_to_cart_params === 'undefined') {
            return;
        }
        
        $.ajax({
            url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments'),
            type: 'POST',
            success: function(response) {
                if (response.fragments) {
                    $.each(response.fragments, function(key, value) {
                        var $element = $(key);
                        if ($element.length) {
                            $element.replaceWith(value);
                        }
                    });
                }
                $(document.body).trigger('wc_fragment_refresh');
            }
        });
    }

    function markButtonAdded($btn) {
        $btn.addClass('dashvio-add-to-cart-btn--added')
            .text('Added to Cart')
            .prop('disabled', true)
            .attr('aria-pressed', 'true')
            .data('dashvio-added', 'true');
    }
    
    $(document).ready(function() {
        $(document).off('click', 'a.dashvio-add-to-cart-btn, button.dashvio-add-to-cart-btn').on('click', 'a.dashvio-add-to-cart-btn, button.dashvio-add-to-cart-btn', function(e) {
            console.log('Add to Cart button clicked');
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
            var $btn = $(this);
            console.log('Button element:', $btn);
            console.log('Button classes:', $btn.attr('class'));
            console.log('Button href:', $btn.attr('href'));
            
            var productId = $btn.data('product-id') || $btn.data('product_id');
            console.log('Product ID from data-product-id:', $btn.data('product-id'));
            console.log('Product ID from data-product_id:', $btn.data('product_id'));
            console.log('Final Product ID:', productId);
            
            if (!productId) {
                var addToCartUrl = $btn.attr('href');
                console.log('No product ID, checking href:', addToCartUrl);
                if (addToCartUrl) {
                    var urlMatch = addToCartUrl.match(/add-to-cart=(\d+)/);
                    if (urlMatch) {
                        productId = urlMatch[1];
                        console.log('Product ID extracted from URL:', productId);
                    }
                }
            }
            
            if (!productId) {
                console.log('No product ID found, redirecting to href');
                var addToCartUrl = $btn.attr('href');
                if (addToCartUrl) {
                    window.location = addToCartUrl;
                }
                return;
            }
            
            if ($btn.data('dashvio-added') === 'true') {
                console.log('Product already added to cart');
                return;
            }

            console.log('Processing add to cart for product:', productId);
            $btn.prop('disabled', true);
            var originalHtml = $btn.html();
            $btn.html('<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> Adding...');
            
            if (typeof wc_add_to_cart_params !== 'undefined' && wc_add_to_cart_params.wc_ajax_url) {
                console.log('Using WooCommerce AJAX');
                var ajaxUrl = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart');
                console.log('AJAX URL:', ajaxUrl);
                var data = {
                    product_id: productId,
                    quantity: 1
                };
                console.log('AJAX data:', data);
                
                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        console.log('AJAX success response:', response);
                        if (response.error && response.product_url) {
                            window.location = response.product_url;
                            return;
                        }
                        
                        if (response.fragments) {
                            $.each(response.fragments, function(key, value) {
                                var $element = $(key);
                                if ($element.length) {
                                    $element.replaceWith(value);
                                }
                            });
                        }
                        
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $btn]);
                        $(document.body).trigger('wc_fragment_refresh');
                        
                        setTimeout(function() {
                            updateCartCount();
                        }, 100);
                        
                        markButtonAdded($btn);
                        showSuccessNotification('Template added to cart successfully!');
                        
                        if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
                            window.location = wc_add_to_cart_params.cart_url;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', xhr, status, error);
                        showSuccessNotification('Error adding to cart. Please try again.');
                        $btn.prop('disabled', false).html(originalHtml);
                    },
                    complete: function() {
                        if (!$btn.hasClass('dashvio-add-to-cart-btn--added')) {
                            $btn.prop('disabled', false).html(originalHtml);
                        }
                    }
                });
            } else {
                console.log('WooCommerce params not available, using fallback');
                console.log('wc_add_to_cart_params:', typeof wc_add_to_cart_params);
                var addToCartUrl = window.location.origin + '/?add-to-cart=' + productId;
                console.log('Fallback URL:', addToCartUrl);
                window.location.href = addToCartUrl;
            }
        });
        
        $(document).on('click', '.dashvio-import-demo-btn', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var demoId = $btn.data('demo-id');
            var demoName = $btn.data('demo-name');
            
            if (!demoId) {
                alert('Demo ID is missing.');
                return;
            }
            
            if (!confirm('Import "' + demoName + '" demo? This will create WordPress pages with Elementor content.')) {
                return;
            }
            
            $btn.prop('disabled', true).text('Importing...');
            
            $.ajax({
                url: dashvioData.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'dashvio_import_demo',
                    nonce: dashvioData.nonce,
                    demo_id: demoId
                },
                success: function(response) {
                    if (response.success) {
                        var message = 'Demo imported successfully!';
                        var pages = response.data.pages || [];
                        var editUrl = response.data.edit_url || '';
                        
                        if (pages.length > 0) {
                            var pagesList = pages.map(function(page) {
                                return '<li>' + page + '</li>';
                            }).join('');
                            
                            var successHtml = '<div style="background: rgba(0,0,0,0.9); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; display: flex; align-items: center; justify-content: center;">' +
                                '<div style="background: #fff; padding: 40px; border-radius: 16px; max-width: 500px; color: #000;">' +
                                '<h3 style="margin: 0 0 16px 0;">Success!</h3>' +
                                '<p>' + message + '</p>' +
                                '<p style="font-weight: 600; margin-top: 16px;">Pages created:</p>' +
                                '<ul style="margin: 8px 0 24px 0; padding-left: 20px;">' + pagesList + '</ul>' +
                                '<div style="display: flex; gap: 12px;">' +
                                '<button class="dashvio-close-modal" style="padding: 10px 20px; background: #f0f0f0; border: none; border-radius: 8px; cursor: pointer;">Close</button>';
                            
                            if (editUrl) {
                                successHtml += '<button class="dashvio-edit-modal" data-url="' + editUrl + '" style="padding: 10px 20px; background: #FF6B35; color: #fff; border: none; border-radius: 8px; cursor: pointer;">Open in Elementor</button>';
                            }
                            
                            successHtml += '</div></div></div>';
                            
                            $('body').append(successHtml);
                            
                            $('.dashvio-close-modal').on('click', function() {
                                $(this).closest('div[style*="position: fixed"]').remove();
                            });
                            
                            $('.dashvio-edit-modal').on('click', function() {
                                window.location.href = $(this).data('url');
                            });
                        } else {
                            alert(message);
                        }
                    } else {
                        alert(response.data || 'An error occurred while importing the demo.');
                    }
                },
                error: function() {
                    alert('An error occurred while importing the demo.');
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Import Demo');
                }
            });
        });
    });
})(jQuery);


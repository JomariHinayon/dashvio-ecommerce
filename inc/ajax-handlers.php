<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_dashvio_update_cart', 'dashvio_ajax_update_cart');
add_action('wp_ajax_nopriv_dashvio_update_cart', 'dashvio_ajax_update_cart');

function dashvio_ajax_update_cart() {
    if (!dashvio_verify_nonce($_POST['nonce'] ?? '', 'dashvio-nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
        return;
    }
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error(array('message' => 'WooCommerce not active'));
        return;
    }
    
    $cart_count = WC()->cart->get_cart_contents_count();
    
    wp_send_json_success(array(
        'count' => $cart_count,
        'subtotal' => WC()->cart->get_cart_subtotal()
    ));
}

// Product Quick View
add_action('wp_ajax_dashvio_get_product_quick_view', 'dashvio_ajax_get_product_quick_view');
add_action('wp_ajax_nopriv_dashvio_get_product_quick_view', 'dashvio_ajax_get_product_quick_view');

function dashvio_ajax_get_product_quick_view() {
    check_ajax_referer('dashvio-nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error(array('message' => 'WooCommerce not active'));
        return;
    }
    
    $product_id = absint($_POST['product_id'] ?? 0);
    
    if (!$product_id) {
        wp_send_json_error(array('message' => 'Invalid product ID'));
        return;
    }
    
    $product = wc_get_product($product_id);
    
    if (!$product || !$product->is_visible()) {
        wp_send_json_error(array('message' => 'Product not found'));
        return;
    }
    
    ob_start();
    ?>
    <div class="dashvio-quick-view-product">
        <div class="dashvio-quick-view-product-image">
            <?php echo $product->get_image('woocommerce_single', array('class' => 'wp-post-image')); ?>
        </div>
        <div class="dashvio-quick-view-product-info">
            <h2><?php echo esc_html($product->get_name()); ?></h2>
            <span class="price"><?php echo $product->get_price_html(); ?></span>
            <div class="description">
                <?php echo apply_filters('woocommerce_short_description', $product->get_short_description() ?: $product->get_description()); ?>
            </div>
            <?php if ($product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) : ?>
                <form class="dashvio-loop-cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post">
                    <div class="dashvio-qty-control">
                        <button type="button" class="dashvio-qty__btn" data-type="minus" aria-label="<?php esc_attr_e('Decrease quantity', 'dashvio'); ?>">-</button>
                        <?php
                        echo woocommerce_quantity_input(
                            array(
                                'input_name'  => 'quantity',
                                'input_value' => 1,
                                'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                                'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                'step'        => apply_filters('woocommerce_quantity_input_step', 1, $product),
                            ),
                            $product,
                            false
                        );
                        ?>
                        <button type="button" class="dashvio-qty__btn" data-type="plus" aria-label="<?php esc_attr_e('Increase quantity', 'dashvio'); ?>">+</button>
                    </div>
                    <button type="submit" class="dashvio-loop-cart__btn">
                        <?php echo esc_html($product->add_to_cart_text()); ?>
                    </button>
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                </form>
            <?php else : ?>
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="button button-primary"><?php esc_html_e('View Product', 'dashvio'); ?></a>
            <?php endif; ?>
            <div style="margin-top: 20px;">
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="button button-outline"><?php esc_html_e('View Full Details', 'dashvio'); ?></a>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success(array('html' => $html));
}

// Template Quick View
add_action('wp_ajax_dashvio_get_template_quick_view', 'dashvio_ajax_get_template_quick_view');
add_action('wp_ajax_nopriv_dashvio_get_template_quick_view', 'dashvio_ajax_get_template_quick_view');

function dashvio_ajax_get_template_quick_view() {
    check_ajax_referer('dashvio-nonce', 'nonce');
    
    $demo_id = sanitize_text_field($_POST['demo_id'] ?? '');
    
    if (!$demo_id) {
        wp_send_json_error(array('message' => 'Invalid demo ID'));
        return;
    }
    
    $demos = function_exists('dashvio_get_prebuilt_demos') ? dashvio_get_prebuilt_demos() : array();
    $demo = null;
    
    foreach ($demos as $d) {
        if ($d['id'] === $demo_id) {
            $demo = $d;
            break;
        }
    }
    
    if (!$demo) {
        wp_send_json_error(array('message' => 'Template not found'));
        return;
    }
    
    // Get product if exists
    $product_id = get_option('dashvio_demo_product_' . $demo_id);
    $product = $product_id ? wc_get_product($product_id) : null;
    $price = $product ? $product->get_price_html() : '$99.00';
    
    ob_start();
    ?>
    <div class="dashvio-quick-view-product">
        <div class="dashvio-quick-view-product-image">
            <img src="<?php echo esc_url($demo['thumbnail']); ?>" alt="<?php echo esc_attr($demo['name']); ?>">
        </div>
        <div class="dashvio-quick-view-product-info">
            <h2><?php echo esc_html($demo['name']); ?> Template</h2>
            <span class="price"><?php echo $price; ?></span>
            <div class="description">
                <p><?php echo esc_html($demo['description']); ?></p>
                <?php if (isset($demo['category'])) : ?>
                    <p><strong><?php esc_html_e('Category:', 'dashvio'); ?></strong> <?php echo esc_html(ucfirst($demo['category'])); ?></p>
                <?php endif; ?>
            </div>
            <div style="display: flex; gap: 12px; margin-top: 24px; flex-wrap: wrap;">
                <a href="<?php echo esc_url($demo['preview_url']); ?>" target="_blank" class="button button-primary"><?php esc_html_e('Try Demo', 'dashvio'); ?></a>
                <?php if ($product && $product->is_purchasable() && $product->is_in_stock()) : ?>
                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="button button-primary dashvio-add-to-cart-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
                        <?php esc_html_e('Add to Cart', 'dashvio'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success(array('html' => $html));
}


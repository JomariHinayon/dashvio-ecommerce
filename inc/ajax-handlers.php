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
    $base_price = $product ? floatval($product->get_price()) : 99.00;
    $price_html = $product ? $product->get_price_html() : '$99.00';
    $has_purchased = function_exists('dashvio_user_has_purchased_demo') ? dashvio_user_has_purchased_demo($demo_id) : false;
    
    // Service add-ons pricing
    $services = array(
        array(
            'id' => 'extended_support',
            'name' => 'Get 6 more months of support and save $17',
            'original_price' => 29.00,
            'discounted_price' => 12.00,
        ),
        array(
            'id' => 'installation_setup',
            'name' => 'Installation & Setup',
            'original_price' => 59.00,
            'discounted_price' => 49.00,
        ),
        array(
            'id' => 'customization_package',
            'name' => 'Installation & Customization Package',
            'original_price' => 369.00,
            'discounted_price' => 259.00,
        ),
        array(
            'id' => 'all_in_one',
            'name' => 'All-in-One Store Setup + SEO',
            'original_price' => 1777.00,
            'discounted_price' => 1199.00,
            'badge' => 'Service of the Day',
        ),
        array(
            'id' => 'must_have_plugins',
            'name' => 'Must-Have Plugins',
            'original_price' => 89.00,
            'discounted_price' => 49.00,
        ),
        array(
            'id' => 'gdpr_compliance',
            'name' => 'GDPR & CCPA Compliance - New Privacy Rules',
            'original_price' => 89.00,
            'discounted_price' => 59.00,
        ),
    );
    
    // License options
    $licenses = array(
        array(
            'id' => 'personal',
            'name' => 'Personal license',
            'price' => $base_price,
            'default' => true,
        ),
        array(
            'id' => 'commercial',
            'name' => 'Commercial license',
            'price' => $base_price * 1.5, // 50% more for commercial
        ),
    );
    
    ob_start();
    ?>
    <div class="dashvio-quick-view-template">
        <div class="dashvio-quick-view-template-preview">
            <div class="dashvio-quick-view-product-image">
                <img src="<?php echo esc_url($demo['thumbnail']); ?>" alt="<?php echo esc_attr($demo['name']); ?>">
            </div>
            <div class="dashvio-quick-view-template-info">
                <h2><?php echo esc_html($demo['name']); ?> Template</h2>
                <div class="description">
                    <p><?php echo esc_html($demo['description']); ?></p>
                    <?php if (isset($demo['category'])) : ?>
                        <p><strong><?php esc_html_e('Category:', 'dashvio'); ?></strong> <?php echo esc_html(ucfirst($demo['category'])); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="dashvio-quick-view-pricing-panel">
            <div class="dashvio-pricing-panel__inner">
                <h3 class="dashvio-pricing-panel__title">License Options</h3>
                <div class="dashvio-license-options">
                    <?php foreach ($licenses as $license) : ?>
                        <label class="dashvio-license-option <?php echo $license['default'] ? 'is-selected' : ''; ?>">
                            <input 
                                type="radio" 
                                name="quick_view_license_<?php echo esc_attr($demo_id); ?>" 
                                value="<?php echo esc_attr($license['id']); ?>" 
                                data-price="<?php echo esc_attr($license['price']); ?>"
                                <?php echo $license['default'] ? 'checked' : ''; ?>
                            >
                            <div class="dashvio-license-option__content">
                                <span class="dashvio-license-option__name"><?php echo esc_html($license['name']); ?></span>
                                <span class="dashvio-license-option__price">$<?php echo number_format($license['price'], 2); ?></span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
                
                <div class="dashvio-pricing-panel__services">
                    <h4 class="dashvio-services-title">Popular Services from WooCommerce Themes Experts</h4>
                    <div class="dashvio-services-list">
                        <?php foreach ($services as $service) : ?>
                            <label class="dashvio-service-item">
                                <input 
                                    type="checkbox" 
                                    name="quick_view_services_<?php echo esc_attr($demo_id); ?>[]" 
                                    value="<?php echo esc_attr($service['id']); ?>"
                                    data-original-price="<?php echo esc_attr($service['original_price']); ?>"
                                    data-discounted-price="<?php echo esc_attr($service['discounted_price']); ?>"
                                >
                                <div class="dashvio-service-item__content">
                                    <div class="dashvio-service-item__header">
                                        <span class="dashvio-service-item__name"><?php echo esc_html($service['name']); ?></span>
                                        <?php if (isset($service['badge'])) : ?>
                                            <span class="dashvio-service-item__badge"><?php echo esc_html($service['badge']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="dashvio-service-item__pricing">
                                        <span class="dashvio-service-item__original-price">$<?php echo number_format($service['original_price'], 2); ?></span>
                                        <span class="dashvio-service-item__discounted-price">$<?php echo number_format($service['discounted_price'], 2); ?></span>
                                    </div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="dashvio-pricing-panel__total">
                    <div class="dashvio-total-line">
                        <span class="dashvio-total-label">Total:</span>
                        <span class="dashvio-total-price" id="dashvio-quick-view-total-<?php echo esc_attr($demo_id); ?>">$<?php echo number_format($base_price, 2); ?></span>
                    </div>
                </div>
                
                <div class="dashvio-pricing-panel__actions">
                    <a href="<?php echo esc_url($demo['preview_url']); ?>" target="_blank" class="dashvio-btn dashvio-btn--outline dashvio-btn--full">
                        Try Demo
                    </a>
                    <?php if ($has_purchased) : ?>
                        <button type="button" class="dashvio-btn dashvio-btn--primary dashvio-btn--full dashvio-import-demo-btn" data-demo-id="<?php echo esc_attr($demo_id); ?>" data-demo-name="<?php echo esc_attr($demo['name']); ?>">
                            Import Demo
                        </button>
                    <?php else : ?>
                        <?php if ($product && $product->is_purchasable() && $product->is_in_stock()) : ?>
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="dashvio-btn dashvio-btn--primary dashvio-btn--full dashvio-add-to-cart-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>" id="dashvio-quick-view-add-to-cart-<?php echo esc_attr($demo_id); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                                Add to Cart
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="dashvio-btn dashvio-btn--primary dashvio-btn--full">
                                Add to Cart
                            </a>
                        <?php endif; ?>
                        <a href="#" class="dashvio-btn dashvio-btn--secondary dashvio-btn--full">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            Get in Subscription
                        </a>
                    <?php endif; ?>
                </div>
                
                <div class="dashvio-pricing-panel__subscription">
                    <div class="dashvio-subscription-info">
                        <h5 class="dashvio-subscription-title">MonsterONE - Unlimited Downloads for $14.00/mo</h5>
                        <p class="dashvio-subscription-details">540k Items | Commercial Use | Support</p>
                        <a href="#" class="dashvio-btn dashvio-btn--subscription">
                            Join to Download this Item for Free
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success(array('html' => $html));
}


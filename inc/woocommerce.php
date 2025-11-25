<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WooCommerce')) {
    return;
}

function dashvio_woocommerce_setup() {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width' => 600,
        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 2,
            'max_rows' => 8,
            'default_columns' => 4,
            'min_columns' => 2,
            'max_columns' => 5,
        ),
    ));
}
add_action('after_setup_theme', 'dashvio_woocommerce_setup');

function dashvio_woocommerce_image_dimensions() {
    $thumbnail = array(
        'width' => 300,
        'height' => 300,
        'crop' => 1,
    );
    
    $single = array(
        'width' => 600,
        'height' => 600,
        'crop' => 1,
    );
    
    $gallery = array(
        'width' => 150,
        'height' => 150,
        'crop' => 1,
    );
    
    update_option('shop_thumbnail_image_size', $thumbnail);
    update_option('shop_single_image_size', $single);
    update_option('shop_catalog_image_size', $gallery);
}
add_action('after_switch_theme', 'dashvio_woocommerce_image_dimensions');

function dashvio_woocommerce_breadcrumb_defaults($args) {
    $args['delimiter'] = ' / ';
    $args['wrap_before'] = '<nav class="woocommerce-breadcrumb" aria-label="breadcrumb">';
    $args['wrap_after'] = '</nav>';
    return $args;
}
add_filter('woocommerce_breadcrumb_defaults', 'dashvio_woocommerce_breadcrumb_defaults');

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 10);

function dashvio_get_cart_contents_count() {
    if (!class_exists('WooCommerce') || null === WC()->cart) {
        return 0;
    }

    return WC()->cart->get_cart_contents_count();
}

function dashvio_get_cart_icon_markup() {
    if (!class_exists('WooCommerce')) {
        return '';
    }

    $count = dashvio_get_cart_contents_count();
    ob_start();
    ?>
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
       class="cart-icon cart-contents"
       data-cart-count="<?php echo esc_attr($count); ?>"
        aria-label="<?php esc_attr_e('View cart', 'dashvio'); ?>">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.6L4.2 12C4.1 12.3 4 12.7 4 13C4 14.1 4.9 15 6 15H18V13H6.4C6.3 13 6.2 12.9 6.2 12.8V12.7L7.1 11H14.5C15.3 11 16 10.6 16.4 10L19.9 3.5C20 3.3 20 3.2 20 3C20 2.4 19.6 2 19 2H4.2L3.3 0H0ZM16 16C14.9 16 14 16.9 14 18C14 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z" fill="currentColor"/>
        </svg>
        <span class="cart-count" aria-live="polite"><?php echo esc_html($count); ?></span>
    </a>
    <?php
    return ob_get_clean();
}

function dashvio_cart_icon() {
    echo dashvio_get_cart_icon_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function dashvio_cart_fragment($fragments) {
    $fragments['a.cart-contents'] = dashvio_get_cart_icon_markup();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'dashvio_cart_fragment');


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


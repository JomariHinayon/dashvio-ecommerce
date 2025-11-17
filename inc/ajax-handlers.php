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

add_action('wp_ajax_dashvio_quick_view', 'dashvio_ajax_quick_view');
add_action('wp_ajax_nopriv_dashvio_quick_view', 'dashvio_ajax_quick_view');

function dashvio_ajax_quick_view() {
    if (!dashvio_verify_nonce($_POST['nonce'] ?? '', 'dashvio-nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
        return;
    }
    
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
    
    if (!$product) {
        wp_send_json_error(array('message' => 'Product not found'));
        return;
    }
    
    ob_start();
    wc_get_template_part('content', 'single-product');
    $html = ob_get_clean();
    
    wp_send_json_success(array('html' => $html));
}


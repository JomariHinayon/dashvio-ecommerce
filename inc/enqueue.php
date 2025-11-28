<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_enqueue_scripts() {
    wp_enqueue_style(
        'dashvio-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&family=DM+Sans:wght@400;500;600&display=swap',
        array(),
        null
    );
    wp_enqueue_style('dashvio-style', get_stylesheet_uri(), array('dashvio-fonts'), DASHVIO_VERSION);
    
    wp_enqueue_style('dashvio-main', DASHVIO_URI . '/assets/css/main.css', array(), DASHVIO_VERSION);
    wp_enqueue_style('dashvio-header', DASHVIO_URI . '/assets/css/header.css', array(), DASHVIO_VERSION);
    wp_enqueue_style('dashvio-footer', DASHVIO_URI . '/assets/css/footer.css', array(), DASHVIO_VERSION);
    
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('dashvio-woocommerce', DASHVIO_URI . '/assets/css/woocommerce.css', array(), DASHVIO_VERSION);
        wp_enqueue_style('dashvio-cart', DASHVIO_URI . '/assets/css/cart.css', array(), DASHVIO_VERSION);
        wp_enqueue_style('dashvio-checkout', DASHVIO_URI . '/assets/css/checkout.css', array(), DASHVIO_VERSION);
        wp_enqueue_style('dashvio-myaccount', DASHVIO_URI . '/assets/css/myaccount.css', array(), DASHVIO_VERSION);
    }
    
    wp_enqueue_script('dashvio-main', DASHVIO_URI . '/assets/js/main.js', array('jquery'), DASHVIO_VERSION, true);
    
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('dashvio-woocommerce', DASHVIO_URI . '/assets/js/woocommerce.js', array('jquery'), DASHVIO_VERSION, true);
    }
    
    wp_localize_script('dashvio-main', 'dashvioData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('dashvio-nonce'),
    ));
    
    if (is_page()) {
        $page_id = get_the_ID();
        $demo_id = get_post_meta($page_id, '_dashvio_demo_id', true);
        if ($demo_id) {
            $demo_css_path = DASHVIO_DIR . '/demos/' . $demo_id . '/preview/style.css';
            if (file_exists($demo_css_path)) {
                wp_enqueue_style(
                    'dashvio-demo-' . $demo_id,
                    DASHVIO_URI . '/demos/' . $demo_id . '/preview/style.css',
                    array(),
                    DASHVIO_VERSION
                );
                
                $demo_css = get_post_meta($page_id, '_dashvio_demo_css', true);
                if ($demo_css) {
                    wp_add_inline_style('dashvio-demo-' . $demo_id, $demo_css);
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'dashvio_enqueue_scripts');


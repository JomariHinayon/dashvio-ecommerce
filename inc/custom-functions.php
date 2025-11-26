<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_get_option($option, $default = '') {
    $value = get_theme_mod($option, $default);
    return $value;
}

function dashvio_sanitize_text($input) {
    return sanitize_text_field($input);
}

function dashvio_sanitize_html($input) {
    return wp_kses_post($input);
}

function dashvio_get_theme_option($key, $default = '') {
    $options = get_option('dashvio_theme_options', array());
    return isset($options[$key]) ? $options[$key] : $default;
}

function dashvio_update_theme_option($key, $value) {
    $options = get_option('dashvio_theme_options', array());
    $options[$key] = $value;
    update_option('dashvio_theme_options', $options);
}

function dashvio_delete_theme_option($key) {
    $options = get_option('dashvio_theme_options', array());
    if (isset($options[$key])) {
        unset($options[$key]);
        update_option('dashvio_theme_options', $options);
    }
}

/**
 * Check if theme is in preview mode (clean theme preview without WooCommerce store content)
 * 
 * You can enable preview mode by:
 * 1. Adding ?preview_mode=1 to any URL
 * 2. Setting DASHVIO_PREVIEW_MODE constant to true in wp-config.php
 * 3. Setting 'dashvio_preview_mode' theme option to true
 * 
 * @return bool
 */
function dashvio_is_preview_mode() {
    // Check URL parameter
    if (isset($_GET['preview_mode']) && $_GET['preview_mode'] === '1') {
        return true;
    }
    
    // Check constant
    if (defined('DASHVIO_PREVIEW_MODE') && DASHVIO_PREVIEW_MODE === true) {
        return true;
    }
    
    // Check theme option
    $preview_mode = get_theme_mod('dashvio_preview_mode', false);
    if ($preview_mode === true || $preview_mode === '1') {
        return true;
    }
    
    return false;
}

/**
 * Check if WooCommerce content should be displayed
 * Returns false if in preview mode
 * 
 * @return bool
 */
function dashvio_show_woocommerce() {
    if (dashvio_is_preview_mode()) {
        return false;
    }
    
    return class_exists('WooCommerce');
}


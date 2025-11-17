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


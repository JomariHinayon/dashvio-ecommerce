<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_verify_nonce($nonce, $action = 'dashvio-nonce') {
    if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
        return false;
    }
    return true;
}

function dashvio_is_user_allowed() {
    if (!is_user_logged_in()) {
        return false;
    }
    return true;
}

function dashvio_sanitize_array($array) {
    if (!is_array($array)) {
        return array();
    }
    
    return array_map('sanitize_text_field', $array);
}

function dashvio_sanitize_url($url) {
    return esc_url_raw($url);
}

function dashvio_sanitize_number($number) {
    return absint($number);
}

add_filter('wp_kses_allowed_html', 'dashvio_kses_allowed_html', 10, 2);
function dashvio_kses_allowed_html($tags, $context) {
    if ('post' === $context) {
        $tags['iframe'] = array(
            'src' => true,
            'height' => true,
            'width' => true,
            'frameborder' => true,
            'allowfullscreen' => true,
        );
    }
    return $tags;
}

function dashvio_limit_text($text, $limit = 100) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . '...';
    }
    return esc_html($text);
}


<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_customize_register($wp_customize) {
    
    $wp_customize->add_section('dashvio_general', array(
        'title' => 'General Settings',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('dashvio_container_width', array(
        'default' => '1280',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('dashvio_container_width', array(
        'label' => 'Container Width (px)',
        'section' => 'dashvio_general',
        'type' => 'number',
    ));
    
    $wp_customize->add_setting('dashvio_primary_color', array(
        'default' => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dashvio_primary_color', array(
        'label' => 'Primary Color',
        'section' => 'colors',
    )));
    
    $wp_customize->add_setting('dashvio_secondary_color', array(
        'default' => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dashvio_secondary_color', array(
        'label' => 'Secondary Color',
        'section' => 'colors',
    )));
    
    $wp_customize->add_setting('dashvio_accent_color', array(
        'default' => '#f59e0b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dashvio_accent_color', array(
        'label' => 'Accent Color',
        'section' => 'colors',
    )));
}
add_action('customize_register', 'dashvio_customize_register');

function dashvio_custom_css() {
    $container_width = absint(get_theme_mod('dashvio_container_width', '1280'));
    $primary_color = sanitize_hex_color(get_theme_mod('dashvio_primary_color', '#2563eb'));
    $secondary_color = sanitize_hex_color(get_theme_mod('dashvio_secondary_color', '#0f172a'));
    $accent_color = sanitize_hex_color(get_theme_mod('dashvio_accent_color', '#f59e0b'));
    
    $css = "
    :root {
        --container-width: " . esc_attr($container_width) . "px;
        --color-primary: " . esc_attr($primary_color) . ";
        --color-secondary: " . esc_attr($secondary_color) . ";
        --color-accent: " . esc_attr($accent_color) . ";
    }
    ";
    
    wp_add_inline_style('dashvio-style', $css);
}
add_action('wp_enqueue_scripts', 'dashvio_custom_css');


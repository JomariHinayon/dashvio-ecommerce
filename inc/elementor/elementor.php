<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_register_elementor_category($elements_manager) {
    $elements_manager->add_category(
        'dashvio',
        [
            'title' => esc_html__('Dashvio', 'dashvio'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'dashvio_register_elementor_category');

function dashvio_register_elementor_widgets($widgets_manager) {
    require_once DASHVIO_DIR . '/inc/elementor/widgets/hero.php';
    require_once DASHVIO_DIR . '/inc/elementor/widgets/pricing.php';
    require_once DASHVIO_DIR . '/inc/elementor/widgets/testimonials.php';
    require_once DASHVIO_DIR . '/inc/elementor/widgets/features.php';
    require_once DASHVIO_DIR . '/inc/elementor/widgets/buttons.php';
    require_once DASHVIO_DIR . '/inc/elementor/widgets/faqs.php';
    
    $widgets_manager->register(new \Dashvio_Elementor_Hero_Widget());
    $widgets_manager->register(new \Dashvio_Elementor_Pricing_Widget());
    $widgets_manager->register(new \Dashvio_Elementor_Testimonials_Widget());
    $widgets_manager->register(new \Dashvio_Elementor_Features_Widget());
    $widgets_manager->register(new \Dashvio_Elementor_Buttons_Widget());
    $widgets_manager->register(new \Dashvio_Elementor_FAQs_Widget());
}

add_action('elementor/widgets/register', 'dashvio_register_elementor_widgets');

function dashvio_enqueue_elementor_widgets_assets() {
    wp_enqueue_style(
        'dashvio-elementor-widgets',
        DASHVIO_URI . '/assets/css/elementor-widgets.css',
        array(),
        DASHVIO_VERSION
    );
    
    wp_enqueue_script(
        'dashvio-elementor-widgets',
        DASHVIO_URI . '/assets/js/elementor-widgets.js',
        array('jquery'),
        DASHVIO_VERSION,
        true
    );
}
add_action('elementor/frontend/after_enqueue_styles', 'dashvio_enqueue_elementor_widgets_assets');
add_action('elementor/editor/before_enqueue_scripts', 'dashvio_enqueue_elementor_widgets_assets');


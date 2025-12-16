<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Products_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_products_grid';
    }

    public function get_title() {
        return esc_html__('Products Grid', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-products';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['products', 'woocommerce', 'shop', 'grid', 'dashvio'];
    }

    public function get_script_depends() {
        return ['wc-add-to-cart'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured Products', 'dashvio'),
                'placeholder' => esc_html__('Enter section title', 'dashvio'),
            ]
        );

        $this->add_control(
            'view_all_text',
            [
                'label' => esc_html__('View All Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Shop All Products', 'dashvio'),
                'placeholder' => esc_html__('Enter button text', 'dashvio'),
            ]
        );

        $this->add_control(
            'view_all_link',
            [
                'label' => esc_html__('View All Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'dashvio'),
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Products', 'dashvio'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 20,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'dashvio'),
                    'price' => esc_html__('Price', 'dashvio'),
                    'popularity' => esc_html__('Popularity', 'dashvio'),
                    'rating' => esc_html__('Rating', 'dashvio'),
                    'title' => esc_html__('Title', 'dashvio'),
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => $this->get_product_categories(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-products-section h2',
            ]
        );

        $this->end_controls_section();
    }

    private function get_product_categories() {
        if (!class_exists('WooCommerce')) {
            return array('' => esc_html__('No categories available', 'dashvio'));
        }

        $categories = array('' => esc_html__('All Categories', 'dashvio'));
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
        ));

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $categories[$term->slug] = $term->name;
            }
        }

        return $categories;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (!class_exists('WooCommerce')) {
            echo '<p>' . esc_html__('WooCommerce is not installed or activated.', 'dashvio') . '</p>';
            return;
        }

        $shortcode_atts = array(
            'limit' => intval($settings['limit']),
            'columns' => intval($settings['columns']),
            'orderby' => $settings['orderby'],
            'visibility' => 'visible',
        );

        if (!empty($settings['category'])) {
            $shortcode_atts['category'] = $settings['category'];
        }

        $shortcode_string = '[products';
        foreach ($shortcode_atts as $key => $value) {
            $shortcode_string .= ' ' . $key . '="' . esc_attr($value) . '"';
        }
        $shortcode_string .= ']';

        $shop_url = function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/');
        $view_all_url = !empty($settings['view_all_link']['url']) ? $settings['view_all_link']['url'] : $shop_url;
        ?>
        <section class="dashvio-products-section">
            <?php if (!empty($settings['section_title']) || !empty($view_all_url)) : ?>
                <div class="dashvio-products-section__header">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <div>
                            <h2><?php echo esc_html($settings['section_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($view_all_url)) : ?>
                        <a class="button button-outline" href="<?php echo esc_url($view_all_url); ?>" <?php echo !empty($settings['view_all_link']['is_external']) ? 'target="_blank"' : ''; ?>>
                            <?php echo esc_html($settings['view_all_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="dashvio-products-grid">
                <?php echo do_shortcode($shortcode_string); ?>
            </div>
        </section>
        <?php
    }

    protected function content_template() {
        ?>
        <section class="dashvio-products-section">
            <# if (settings.section_title || settings.view_all_link.url) { #>
                <div class="dashvio-products-section__header">
                    <# if (settings.section_title) { #>
                        <div>
                            <h2>{{{ settings.section_title }}}</h2>
                        </div>
                    <# } #>
                    <# if (settings.view_all_link.url) { #>
                        <a class="button button-outline" href="{{{ settings.view_all_link.url }}}" target="_blank">
                            {{{ settings.view_all_text }}}
                        </a>
                    <# } #>
                </div>
            <# } #>
            <div class="dashvio-products-grid">
                <p><?php esc_html_e('Products will be displayed here', 'dashvio'); ?></p>
            </div>
        </section>
        <?php
    }
}


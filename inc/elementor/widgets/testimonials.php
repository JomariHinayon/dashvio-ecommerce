<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Testimonials_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_testimonials';
    }

    public function get_title() {
        return esc_html__('Dashvio Testimonials', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['testimonials', 'reviews', 'feedback', 'dashvio'];
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
            'title',
            [
                'label' => esc_html__('Section Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'What Our Customers Say',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_text',
            [
                'label' => esc_html__('Testimonial', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Great product! Highly recommended.',
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label' => esc_html__('Author Name', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'John Doe',
            ]
        );

        $repeater->add_control(
            'author_role',
            [
                'label' => esc_html__('Author Role', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'CEO, Company Name',
            ]
        );

        $repeater->add_control(
            'author_image',
            [
                'label' => esc_html__('Author Image', 'dashvio'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'rating',
            [
                'label' => esc_html__('Rating', 'dashvio'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label' => esc_html__('Testimonials', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_text' => 'Amazing template! Easy to customize and looks professional.',
                        'author_name' => 'John Doe',
                        'author_role' => 'Web Designer',
                        'rating' => 5,
                    ],
                    [
                        'testimonial_text' => 'Perfect for my business needs. Highly recommended!',
                        'author_name' => 'Jane Smith',
                        'author_role' => 'Business Owner',
                        'rating' => 5,
                    ],
                ],
                'title_field' => '{{{ author_name }}}',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
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

        $this->add_control(
            'section_title_color',
            [
                'label' => esc_html__('Title Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-testimonials-section h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'selector' => '{{WRAPPER}} .dashvio-testimonials-section h2',
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Card Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Card Border Radius', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dashvio-testimonial-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-testimonial-card',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="dashvio-testimonials-section">
            <?php if (!empty($settings['title'])) : ?>
                <h2><?php echo esc_html($settings['title']); ?></h2>
            <?php endif; ?>
            
            <div class="dashvio-testimonials-grid dashvio-testimonials-grid--<?php echo esc_attr($settings['columns'] ?? '3'); ?>-cols">
                <?php foreach ($settings['testimonials_list'] as $testimonial) : ?>
                    <div class="dashvio-testimonial-card">
                        <?php if (!empty($testimonial['rating'])) : ?>
                            <div class="dashvio-testimonial-rating">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <span class="<?php echo $i < intval($testimonial['rating']) ? 'filled' : ''; ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                        
                        <p class="dashvio-testimonial-text"><?php echo esc_html($testimonial['testimonial_text']); ?></p>
                        
                        <div class="dashvio-testimonial-author">
                            <?php if (!empty($testimonial['author_image']['url'])) : ?>
                                <img src="<?php echo esc_url($testimonial['author_image']['url']); ?>" alt="<?php echo esc_attr($testimonial['author_name']); ?>" />
                            <?php endif; ?>
                            <div>
                                <strong><?php echo esc_html($testimonial['author_name']); ?></strong>
                                <?php if (!empty($testimonial['author_role'])) : ?>
                                    <span><?php echo esc_html($testimonial['author_role']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}


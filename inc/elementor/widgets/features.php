<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Features_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_features';
    }

    public function get_title() {
        return esc_html__('Dashvio Features', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['features', 'icons', 'benefits', 'dashvio'];
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
                'default' => 'Why Choose Us',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Feature Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Feature Title',
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__('Description', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Feature description goes here.',
            ]
        );

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__('Icon', 'dashvio'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => esc_html__('Features', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => 'Feature 1',
                        'feature_description' => 'Description for feature 1',
                    ],
                    [
                        'feature_title' => 'Feature 2',
                        'feature_description' => 'Description for feature 2',
                    ],
                    [
                        'feature_title' => 'Feature 3',
                        'feature_description' => 'Description for feature 3',
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
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
                    '{{WRAPPER}} .dashvio-features-section h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'selector' => '{{WRAPPER}} .dashvio-features-section h2',
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Icon Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-feature-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 120,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dashvio-feature-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="dashvio-features-section">
            <?php if (!empty($settings['title'])) : ?>
                <h2><?php echo esc_html($settings['title']); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($settings['subtitle'])) : ?>
                <p><?php echo esc_html($settings['subtitle']); ?></p>
            <?php endif; ?>
            
            <div class="dashvio-features-grid dashvio-features-grid--<?php echo esc_attr($settings['columns'] ?? '3'); ?>-cols">
                <?php foreach ($settings['features_list'] as $feature) : ?>
                    <div class="dashvio-feature-card">
                        <?php if (!empty($feature['feature_icon']['value'])) : ?>
                            <div class="dashvio-feature-icon">
                                <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h3><?php echo esc_html($feature['feature_title']); ?></h3>
                        <p><?php echo esc_html($feature['feature_description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}


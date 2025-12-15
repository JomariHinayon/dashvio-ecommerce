<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Pricing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_pricing';
    }

    public function get_title() {
        return esc_html__('Dashvio Pricing', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['pricing', 'table', 'plans', 'dashvio'];
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
                'label' => esc_html__('Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose Your License',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Select the perfect plan for your needs',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'plan_name',
            [
                'label' => esc_html__('Plan Name', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Personal License',
            ]
        );

        $repeater->add_control(
            'plan_price',
            [
                'label' => esc_html__('Price', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '$49',
            ]
        );

        $repeater->add_control(
            'plan_features',
            [
                'label' => esc_html__('Features', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Feature 1\nFeature 2\nFeature 3",
                'description' => esc_html__('One feature per line', 'dashvio'),
            ]
        );

        $repeater->add_control(
            'plan_button_text',
            [
                'label' => esc_html__('Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Get Started',
            ]
        );

        $repeater->add_control(
            'plan_button_link',
            [
                'label' => esc_html__('Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'is_featured',
            [
                'label' => esc_html__('Featured Plan', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'dashvio'),
                'label_off' => esc_html__('No', 'dashvio'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'pricing_plans',
            [
                'label' => esc_html__('Pricing Plans', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'plan_name' => 'Personal License',
                        'plan_price' => '$49',
                        'plan_features' => "Single site use\n1 year support\nRegular updates",
                        'plan_button_text' => 'Get Started',
                    ],
                    [
                        'plan_name' => 'Developer License',
                        'plan_price' => '$99',
                        'plan_features' => "5 sites use\n1 year support\nRegular updates\nPriority support",
                        'plan_button_text' => 'Get Started',
                        'is_featured' => 'yes',
                    ],
                    [
                        'plan_name' => 'Agency License',
                        'plan_price' => '$199',
                        'plan_features' => "Unlimited sites\nLifetime support\nRegular updates\nPriority support\nCustom development",
                        'plan_button_text' => 'Get Started',
                    ],
                ],
                'title_field' => '{{{ plan_name }}}',
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
                    '{{WRAPPER}} .dashvio-pricing-section h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'selector' => '{{WRAPPER}} .dashvio-pricing-section h2',
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Card Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-pricing-card' => 'background-color: {{VALUE}};',
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
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dashvio-pricing-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-pricing-card',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__('Price Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-pricing-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .dashvio-pricing-price',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="dashvio-pricing-section">
            <?php if (!empty($settings['title'])) : ?>
                <h2><?php echo esc_html($settings['title']); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($settings['subtitle'])) : ?>
                <p><?php echo esc_html($settings['subtitle']); ?></p>
            <?php endif; ?>
            
            <div class="dashvio-pricing-grid dashvio-pricing-grid--<?php echo esc_attr($settings['columns'] ?? '3'); ?>-cols">
                <?php foreach ($settings['pricing_plans'] as $plan) : 
                    $is_featured = $plan['is_featured'] === 'yes';
                    $button_url = $plan['plan_button_link']['url'] ?? '#';
                    $button_target = $plan['plan_button_link']['is_external'] ? ' target="_blank"' : '';
                    $button_nofollow = $plan['plan_button_link']['nofollow'] ? ' rel="nofollow"' : '';
                    $features = explode("\n", $plan['plan_features']);
                ?>
                    <div class="dashvio-pricing-card<?php echo $is_featured ? ' dashvio-pricing-card--featured' : ''; ?>">
                        <?php if ($is_featured) : ?>
                            <span class="dashvio-pricing-badge">Popular</span>
                        <?php endif; ?>
                        
                        <h3><?php echo esc_html($plan['plan_name']); ?></h3>
                        <div class="dashvio-pricing-price"><?php echo esc_html($plan['plan_price']); ?></div>
                        
                        <ul class="dashvio-pricing-features">
                            <?php foreach ($features as $feature) : 
                                $feature = trim($feature);
                                if (!empty($feature)) : ?>
                                    <li><?php echo esc_html($feature); ?></li>
                                <?php endif;
                            endforeach; ?>
                        </ul>
                        
                        <a href="<?php echo esc_url($button_url); ?>" class="dashvio-pricing-button"<?php echo $button_target . $button_nofollow; ?>>
                            <?php echo esc_html($plan['plan_button_text']); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}


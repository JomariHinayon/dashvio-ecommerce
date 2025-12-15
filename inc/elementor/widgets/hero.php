<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_hero';
    }

    public function get_title() {
        return esc_html__('Dashvio Hero', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['hero', 'banner', 'header', 'dashvio'];
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
            'eyebrow_text',
            [
                'label' => esc_html__('Eyebrow Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'NEW COLLECTION',
                'placeholder' => esc_html__('Enter eyebrow text', 'dashvio'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Discover Your Natural Glow',
                'placeholder' => esc_html__('Enter title', 'dashvio'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Premium cosmetics crafted with care. Enhance your beauty with products that celebrate your unique radiance.',
                'placeholder' => esc_html__('Enter subtitle', 'dashvio'),
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => esc_html__('Primary Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Shop Collection',
            ]
        );

        $this->add_control(
            'primary_button_link',
            [
                'label' => esc_html__('Primary Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'dashvio'),
                'default' => [
                    'url' => '#products',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => esc_html__('Secondary Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our Story',
            ]
        );

        $this->add_control(
            'secondary_button_link',
            [
                'label' => esc_html__('Secondary Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'dashvio'),
                'default' => [
                    'url' => '#about',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Hero Image', 'dashvio'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'stats_section',
            [
                'label' => esc_html__('Stats', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_value',
            [
                'label' => esc_html__('Value', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '200+',
            ]
        );

        $repeater->add_control(
            'stat_label',
            [
                'label' => esc_html__('Label', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Premium Products',
            ]
        );

        $this->add_control(
            'stats_list',
            [
                'label' => esc_html__('Stats', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'stat_value' => '200+',
                        'stat_label' => 'Premium Products',
                    ],
                    [
                        'stat_value' => '48h',
                        'stat_label' => 'Express Delivery',
                    ],
                    [
                        'stat_value' => '4.8/5',
                        'stat_label' => 'Customer Rating',
                    ],
                ],
                'title_field' => '{{{ stat_value }}} - {{{ stat_label }}}',
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
            'layout',
            [
                'label' => esc_html__('Layout', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'split',
                'options' => [
                    'split' => esc_html__('Split (50/50)', 'dashvio'),
                    'content-left' => esc_html__('Content Left (60/40)', 'dashvio'),
                    'content-right' => esc_html__('Content Right (40/60)', 'dashvio'),
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-demo-hero' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_background',
            [
                'label' => esc_html__('Content Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-demo-hero__content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'dashvio'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .dashvio-demo-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '80',
                    'right' => '20',
                    'bottom' => '80',
                    'left' => '20',
                    'unit' => 'px',
                ],
            ]
        );

        $this->add_control(
            'content_border_radius',
            [
                'label' => esc_html__('Content Border Radius', 'dashvio'),
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
                    '{{WRAPPER}} .dashvio-demo-hero__content' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'label' => esc_html__('Content Box Shadow', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-demo-hero__content',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eyebrow_typography',
            [
                'label' => esc_html__('Eyebrow', 'dashvio'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'eyebrow_color',
            [
                'label' => esc_html__('Eyebrow Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo-eyebrow' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'eyebrow_typography',
                'selector' => '{{WRAPPER}} .demo-eyebrow',
            ]
        );

        $this->add_control(
            'title_typography',
            [
                'label' => esc_html__('Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-demo-hero__content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .dashvio-demo-hero__content h1',
            ]
        );

        $this->add_control(
            'subtitle_typography',
            [
                'label' => esc_html__('Subtitle', 'dashvio'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .demo-subtitle',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $primary_button_url = $settings['primary_button_link']['url'] ?? '#';
        $primary_button_target = $settings['primary_button_link']['is_external'] ? ' target="_blank"' : '';
        $primary_button_nofollow = $settings['primary_button_link']['nofollow'] ? ' rel="nofollow"' : '';

        $secondary_button_url = $settings['secondary_button_link']['url'] ?? '#';
        $secondary_button_target = $settings['secondary_button_link']['is_external'] ? ' target="_blank"' : '';
        $secondary_button_nofollow = $settings['secondary_button_link']['nofollow'] ? ' rel="nofollow"' : '';

        $layout_class = 'dashvio-demo-hero--' . $settings['layout'];
        ?>
        <section class="dashvio-demo-hero <?php echo esc_attr($layout_class); ?>">
            <div class="dashvio-demo-hero__content">
                <?php if (!empty($settings['eyebrow_text'])) : ?>
                    <span class="demo-eyebrow"><?php echo esc_html($settings['eyebrow_text']); ?></span>
                <?php endif; ?>
                
                <?php if (!empty($settings['title'])) : ?>
                    <h1><?php echo esc_html($settings['title']); ?></h1>
                <?php endif; ?>
                
                <?php if (!empty($settings['subtitle'])) : ?>
                    <p class="demo-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                <?php endif; ?>
                
                <div class="demo-cta-group">
                    <?php if (!empty($settings['primary_button_text'])) : ?>
                        <a class="demo-btn demo-btn--primary" href="<?php echo esc_url($primary_button_url); ?>"<?php echo $primary_button_target . $primary_button_nofollow; ?>>
                            <?php echo esc_html($settings['primary_button_text']); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['secondary_button_text'])) : ?>
                        <a class="demo-btn demo-btn--ghost" href="<?php echo esc_url($secondary_button_url); ?>"<?php echo $secondary_button_target . $secondary_button_nofollow; ?>>
                            <?php echo esc_html($settings['secondary_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($settings['stats_list'])) : ?>
                    <div class="demo-stats">
                        <?php foreach ($settings['stats_list'] as $stat) : ?>
                            <div class="demo-stat">
                                <span class="demo-stat__value"><?php echo esc_html($stat['stat_value']); ?></span>
                                <span class="demo-stat__label"><?php echo esc_html($stat['stat_label']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($settings['image']['url'])) : ?>
                <div class="dashvio-demo-hero__visual">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>" />
                </div>
            <?php endif; ?>
        </section>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var primaryButtonUrl = settings.primary_button_link.url || '#';
        var primaryButtonTarget = settings.primary_button_link.is_external ? ' target="_blank"' : '';
        var primaryButtonNofollow = settings.primary_button_link.nofollow ? ' rel="nofollow"' : '';
        
        var secondaryButtonUrl = settings.secondary_button_link.url || '#';
        var secondaryButtonTarget = settings.secondary_button_link.is_external ? ' target="_blank"' : '';
        var secondaryButtonNofollow = settings.secondary_button_link.nofollow ? ' rel="nofollow"' : '';
        
        var layoutClass = 'dashvio-demo-hero--' + settings.layout;
        #>
        <section class="dashvio-demo-hero {{{ layoutClass }}}">
            <div class="dashvio-demo-hero__content">
                <# if (settings.eyebrow_text) { #>
                    <span class="demo-eyebrow">{{{ settings.eyebrow_text }}}</span>
                <# } #>
                
                <# if (settings.title) { #>
                    <h1>{{{ settings.title }}}</h1>
                <# } #>
                
                <# if (settings.subtitle) { #>
                    <p class="demo-subtitle">{{{ settings.subtitle }}}</p>
                <# } #>
                
                <div class="demo-cta-group">
                    <# if (settings.primary_button_text) { #>
                        <a class="demo-btn demo-btn--primary" href="{{{ primaryButtonUrl }}}"{{{ primaryButtonTarget }}}{{{ primaryButtonNofollow }}}>
                            {{{ settings.primary_button_text }}}
                        </a>
                    <# } #>
                    
                    <# if (settings.secondary_button_text) { #>
                        <a class="demo-btn demo-btn--ghost" href="{{{ secondaryButtonUrl }}}"{{{ secondaryButtonTarget }}}{{{ secondaryButtonNofollow }}}>
                            {{{ settings.secondary_button_text }}}
                        </a>
                    <# } #>
                </div>
                
                <# if (settings.stats_list && settings.stats_list.length > 0) { #>
                    <div class="demo-stats">
                        <# _.each(settings.stats_list, function(stat) { #>
                            <div class="demo-stat">
                                <span class="demo-stat__value">{{{ stat.stat_value }}}</span>
                                <span class="demo-stat__label">{{{ stat.stat_label }}}</span>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
            
            <# if (settings.image && settings.image.url) { #>
                <div class="dashvio-demo-hero__visual">
                    <img src="{{{ settings.image.url }}}" alt="{{{ settings.title }}}" />
                </div>
            <# } #>
        </section>
        <?php
    }
}


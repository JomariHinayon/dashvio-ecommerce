<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Why_Dashvio_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_why_dashvio';
    }

    public function get_title() {
        return esc_html__('Why Dashvio / Features Expandable', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['features', 'expandable', 'accordion', 'why', 'dashvio'];
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
            'toggle_text',
            [
                'label' => esc_html__('Toggle Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Why Dashvio',
                'placeholder' => esc_html__('Enter button text', 'dashvio'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'dashvio'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Feature Title', 'dashvio'),
                'placeholder' => esc_html__('Enter feature title', 'dashvio'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Feature description goes here', 'dashvio'),
                'placeholder' => esc_html__('Enter feature description', 'dashvio'),
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
                        'title' => esc_html__('Instant storefront setup', 'dashvio'),
                        'description' => esc_html__('Get your online store up and running in minutes with pre-configured settings and ready-to-use templates.', 'dashvio'),
                    ],
                    [
                        'title' => esc_html__('Reusable components', 'dashvio'),
                        'description' => esc_html__('Build consistent user experiences with modular components designed for product pages, checkout, and customer accounts.', 'dashvio'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
            'toggle_button_color',
            [
                'label' => esc_html__('Toggle Button Text Color', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-why-toggle__btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_button_bg',
            [
                'label' => esc_html__('Toggle Button Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-why-toggle__btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_background',
            [
                'label' => esc_html__('Content Background', 'dashvio'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dashvio-why-content__inner' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-why-item h4',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-why-item p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_id = 'dashvio-why-' . $this->get_id();
        ?>
        <div class="dashvio-why-toggle">
            <button class="dashvio-why-toggle__btn" id="<?php echo esc_attr($widget_id); ?>-toggle" aria-expanded="false" aria-controls="<?php echo esc_attr($widget_id); ?>-content">
                <svg class="dashvio-why-toggle__icon" width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span><?php echo esc_html($settings['toggle_text']); ?></span>
                <svg class="dashvio-why-toggle__arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="dashvio-why-content" id="<?php echo esc_attr($widget_id); ?>-content">
                <div class="dashvio-why-content__inner">
                    <div class="dashvio-why-grid">
                        <?php foreach ($settings['features_list'] as $item) : ?>
                            <div class="dashvio-why-item">
                                <div class="dashvio-why-item__header">
                                    <?php if (!empty($item['icon'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                    <?php else : ?>
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    <?php endif; ?>
                                    <h4><?php echo esc_html($item['title']); ?></h4>
                                </div>
                                <p><?php echo esc_html($item['description']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var widgetId = 'dashvio-why-' + view.getID();
        #>
        <div class="dashvio-why-toggle">
            <button class="dashvio-why-toggle__btn" id="{{{ widgetId }}}-toggle" aria-expanded="false" aria-controls="{{{ widgetId }}}-content">
                <svg class="dashvio-why-toggle__icon" width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>{{{ settings.toggle_text }}}</span>
                <svg class="dashvio-why-toggle__arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="dashvio-why-content" id="{{{ widgetId }}}-content">
                <div class="dashvio-why-content__inner">
                    <div class="dashvio-why-grid">
                        <# _.each(settings.features_list, function(item) { #>
                            <div class="dashvio-why-item">
                                <div class="dashvio-why-item__header">
                                    <# if (item.icon) { #>
                                        <span class="elementor-icon">
                                            <i class="{{{ item.icon.value }}}" aria-hidden="true"></i>
                                        </span>
                                    <# } else { #>
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    <# } #>
                                    <h4>{{{ item.title }}}</h4>
                                </div>
                                <p>{{{ item.description }}}</p>
                            </div>
                        <# }); #>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}


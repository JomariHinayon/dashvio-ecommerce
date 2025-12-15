<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Buttons_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_buttons';
    }

    public function get_title() {
        return esc_html__('Dashvio Buttons', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['buttons', 'cta', 'call to action', 'dashvio'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Click Here',
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'dashvio'),
            ]
        );

        $repeater->add_control(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => esc_html__('Primary', 'dashvio'),
                    'secondary' => esc_html__('Secondary', 'dashvio'),
                    'ghost' => esc_html__('Ghost', 'dashvio'),
                ],
            ]
        );

        $this->add_control(
            'buttons_list',
            [
                'label' => esc_html__('Buttons', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'button_text' => 'Primary Button',
                        'button_style' => 'primary',
                    ],
                    [
                        'button_text' => 'Secondary Button',
                        'button_style' => 'ghost',
                    ],
                ],
                'title_field' => '{{{ button_text }}}',
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => esc_html__('Alignment', 'dashvio'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'dashvio'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'dashvio'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'dashvio'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $alignment = $settings['alignment'] ?? 'left';
        ?>
        <div class="dashvio-buttons-group" style="text-align: <?php echo esc_attr($alignment); ?>;">
            <?php foreach ($settings['buttons_list'] as $button) : 
                $button_url = $button['button_link']['url'] ?? '#';
                $button_target = $button['button_link']['is_external'] ? ' target="_blank"' : '';
                $button_nofollow = $button['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                $button_style = $button['button_style'] ?? 'primary';
            ?>
                <a href="<?php echo esc_url($button_url); ?>" class="demo-btn demo-btn--<?php echo esc_attr($button_style); ?>"<?php echo $button_target . $button_nofollow; ?>>
                    <?php echo esc_html($button['button_text']); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php
    }
}


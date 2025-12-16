<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Templates_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_templates_grid';
    }

    public function get_title() {
        return esc_html__('Templates Grid', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['templates', 'grid', 'demos', 'prebuilt', 'dashvio'];
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
                'default' => esc_html__('Professional Templates for Every Industry', 'dashvio'),
                'placeholder' => esc_html__('Enter section title', 'dashvio'),
            ]
        );

        $this->add_control(
            'view_all_text',
            [
                'label' => esc_html__('View All Button Text', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Templates', 'dashvio'),
                'placeholder' => esc_html__('Enter button text', 'dashvio'),
            ]
        );

        $this->add_control(
            'view_all_link',
            [
                'label' => esc_html__('View All Button Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'dashvio'),
                'default' => [
                    'url' => home_url('/prebuilt-websites/'),
                ],
            ]
        );

        $this->add_control(
            'data_source',
            [
                'label' => esc_html__('Data Source', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'auto',
                'options' => [
                    'auto' => esc_html__('Auto (from templates)', 'dashvio'),
                    'manual' => esc_html__('Manual (custom)', 'dashvio'),
                ],
            ]
        );

        $this->add_control(
            'auto_limit',
            [
                'label' => esc_html__('Number of Templates', 'dashvio'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 20,
                'condition' => [
                    'data_source' => 'auto',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Thumbnail Image', 'dashvio'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Template Name', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Template Name', 'dashvio'),
                'placeholder' => esc_html__('Enter template name', 'dashvio'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Template description goes here', 'dashvio'),
                'placeholder' => esc_html__('Enter template description', 'dashvio'),
            ]
        );

        $repeater->add_control(
            'preview_link',
            [
                'label' => esc_html__('Preview Link', 'dashvio'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://preview-link.com', 'dashvio'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $this->add_control(
            'templates_list',
            [
                'label' => esc_html__('Templates', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Template 1', 'dashvio'),
                        'description' => esc_html__('Template description', 'dashvio'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => [
                    'data_source' => 'manual',
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

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-templates-grid .dash-template-card h4',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $demos = array();

        if ($settings['data_source'] === 'auto') {
            $all_demos = function_exists('dashvio_get_prebuilt_demos') ? dashvio_get_prebuilt_demos() : array();
            $limit = intval($settings['auto_limit']);
            $count = 0;
            foreach ($all_demos as $demo) {
                if ($count >= $limit) break;
                $demos[] = $demo;
                $count++;
            }
        } else {
            foreach ($settings['templates_list'] as $item) {
                $demos[] = array(
                    'name' => $item['title'],
                    'description' => $item['description'],
                    'thumbnail' => !empty($item['image']['url']) ? $item['image']['url'] : '',
                    'preview_url' => !empty($item['preview_link']['url']) ? $item['preview_link']['url'] : '#',
                );
            }
        }
        ?>
        <section class="dashvio-templates-section">
            <?php if (!empty($settings['section_title']) || !empty($settings['view_all_link']['url'])) : ?>
                <div class="dashvio-templates-section__header">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <div>
                            <h2><?php echo esc_html($settings['section_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['view_all_link']['url'])) : ?>
                        <a class="button button-outline" href="<?php echo esc_url($settings['view_all_link']['url']); ?>" <?php echo !empty($settings['view_all_link']['is_external']) ? 'target="_blank"' : ''; ?>>
                            <?php echo esc_html($settings['view_all_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="dashvio-templates-grid dashvio-templates-grid--<?php echo esc_attr($settings['columns']); ?>-cols">
                <?php foreach ($demos as $demo) : ?>
                    <article class="dash-template-card">
                        <div class="dash-template-card__thumb">
                            <?php if (!empty($demo['thumbnail'])) : ?>
                                <img src="<?php echo esc_url($demo['thumbnail']); ?>" alt="<?php echo esc_attr($demo['name']); ?>">
                            <?php endif; ?>
                            <div class="dash-template-card__overlay">
                                <a href="<?php echo esc_url($demo['preview_url']); ?>" class="button button-primary" target="_blank">Preview Demo</a>
                            </div>
                        </div>
                        <div class="dash-template-card__content">
                            <h4><?php echo esc_html($demo['name']); ?></h4>
                            <p><?php echo esc_html($demo['description']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var demos = [];
        if (settings.data_source === 'auto') {
            demos = [
                { name: 'Template 1', description: 'Description 1', thumbnail: '', preview_url: '#' },
                { name: 'Template 2', description: 'Description 2', thumbnail: '', preview_url: '#' },
                { name: 'Template 3', description: 'Description 3', thumbnail: '', preview_url: '#' },
            ];
        } else {
            demos = settings.templates_list;
        }
        #>
        <section class="dashvio-templates-section">
            <# if (settings.section_title || settings.view_all_link.url) { #>
                <div class="dashvio-templates-section__header">
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
            <div class="dashvio-templates-grid dashvio-templates-grid--{{{ settings.columns }}}-cols">
                <# _.each(demos, function(demo) { #>
                    <article class="dash-template-card">
                        <div class="dash-template-card__thumb">
                            <# if (demo.thumbnail || demo.image) { #>
                                <img src="{{{ demo.thumbnail || demo.image.url }}}" alt="{{{ demo.name || demo.title }}}">
                            <# } #>
                            <div class="dash-template-card__overlay">
                                <a href="{{{ demo.preview_url || demo.preview_link.url }}}" class="button button-primary" target="_blank">Preview Demo</a>
                            </div>
                        </div>
                        <div class="dash-template-card__content">
                            <h4>{{{ demo.name || demo.title }}}</h4>
                            <p>{{{ demo.description }}}</p>
                        </div>
                    </article>
                <# }); #>
            </div>
        </section>
        <?php
    }
}


<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_Featured_Posts_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_featured_posts';
    }

    public function get_title() {
        return esc_html__('Featured Posts Grid', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['posts', 'blog', 'featured', 'grid', 'dashvio'];
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
            'data_source',
            [
                'label' => esc_html__('Data Source', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'latest',
                'options' => [
                    'latest' => esc_html__('Latest Posts', 'dashvio'),
                    'select' => esc_html__('Select Posts', 'dashvio'),
                ],
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Posts', 'dashvio'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 10,
                'condition' => [
                    'data_source' => 'latest',
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => $this->get_post_categories(),
                'condition' => [
                    'data_source' => 'latest',
                ],
            ]
        );

        $this->add_control(
            'selected_posts',
            [
                'label' => esc_html__('Select Posts', 'dashvio'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_posts_list(),
                'condition' => [
                    'data_source' => 'select',
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

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'dashvio'),
                'selector' => '{{WRAPPER}} .dashvio-featured-posts .post-featured__title',
            ]
        );

        $this->end_controls_section();
    }

    private function get_post_categories() {
        $categories = array('' => esc_html__('All Categories', 'dashvio'));
        $terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ));

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $categories[$term->term_id] = $term->name;
            }
        }

        return $categories;
    }

    private function get_posts_list() {
        $posts = get_posts(array(
            'numberposts' => -1,
            'post_status' => 'publish',
        ));

        $options = array();
        foreach ($posts as $post) {
            $options[$post->ID] = $post->post_title;
        }

        return $options;
    }

    private function get_posts($settings) {
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => intval($settings['limit']),
            'orderby' => 'date',
            'order' => 'DESC',
        );

        if ($settings['data_source'] === 'select' && !empty($settings['selected_posts'])) {
            $args['post__in'] = $settings['selected_posts'];
            $args['orderby'] = 'post__in';
            $args['posts_per_page'] = -1;
        } elseif ($settings['data_source'] === 'latest' && !empty($settings['category'])) {
            $args['cat'] = intval($settings['category']);
        }

        return get_posts($args);
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $posts = $this->get_posts($settings);

        if (empty($posts)) {
            echo '<p>' . esc_html__('No posts found.', 'dashvio') . '</p>';
            return;
        }
        ?>
        <div class="dashvio-featured-posts">
            <div class="post-featured-grid">
                <?php foreach ($posts as $index => $post) : 
                    $is_large = $index === 0;
                    setup_postdata($post);
                    $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
                    $categories = get_the_category($post->ID);
                    $category_name = !empty($categories) ? $categories[0]->name : esc_html__('Uncategorized', 'dashvio');
                ?>
                    <article class="post-featured <?php echo $is_large ? 'post-featured--large' : ''; ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="post-featured__media">
                            <?php if ($thumbnail) : ?>
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                            <?php else : ?>
                                <img src="<?php echo esc_url(dashvio_generate_placeholder_image(800, 500, $post->ID)); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                            <?php endif; ?>
                        </a>
                        <div class="post-featured__content">
                            <div class="post-featured__meta">
                                <span class="post-featured__category"><?php echo esc_html($category_name); ?></span>
                                <span class="post-featured__date"><?php echo esc_html(get_the_date('', $post->ID)); ?></span>
                            </div>
                            <h2 class="post-featured__title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                            </h2>
                            <p class="post-featured__excerpt">
                                <?php 
                                $excerpt = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : wp_trim_words(get_post_field('post_content', $post->ID), 20);
                                echo esc_html($excerpt);
                                ?>
                            </p>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="post-featured__link">
                                <?php esc_html_e('Read article', 'dashvio'); ?>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; 
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <div class="dashvio-featured-posts">
            <div class="post-featured-grid">
                <article class="post-featured post-featured--large">
                    <a href="#" class="post-featured__media">
                        <img src="<?php echo \Elementor\Utils::get_placeholder_image_src(); ?>" alt="Post">
                    </a>
                    <div class="post-featured__content">
                        <div class="post-featured__meta">
                            <span class="post-featured__category">Category</span>
                            <span class="post-featured__date">Date</span>
                        </div>
                        <h2 class="post-featured__title"><a href="#">Post Title</a></h2>
                        <p class="post-featured__excerpt">Post excerpt goes here...</p>
                        <a href="#" class="post-featured__link">Read article →</a>
                    </div>
                </article>
                <article class="post-featured">
                    <a href="#" class="post-featured__media">
                        <img src="<?php echo \Elementor\Utils::get_placeholder_image_src(); ?>" alt="Post">
                    </a>
                    <div class="post-featured__content">
                        <div class="post-featured__meta">
                            <span class="post-featured__category">Category</span>
                            <span class="post-featured__date">Date</span>
                        </div>
                        <h2 class="post-featured__title"><a href="#">Post Title</a></h2>
                        <p class="post-featured__excerpt">Post excerpt goes here...</p>
                        <a href="#" class="post-featured__link">Read article →</a>
                    </div>
                </article>
            </div>
        </div>
        <?php
    }
}


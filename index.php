<?php get_header(); ?>

<main class="site-main blog-listing">
    <div class="container">
        <header class="page-heading">
            <p class="page-heading__eyebrow"><?php esc_html_e('Insights & updates', 'dashvio'); ?></p>
            <h1 class="page-heading__title"><?php esc_html_e('Latest articles', 'dashvio'); ?></h1>
            <p class="page-heading__subtitle">
                <?php esc_html_e('Expert insights, product updates, and e-commerce strategies to help you build and grow your online store with Dashvio.', 'dashvio'); ?>
            </p>
        </header>

        <?php
        // Always show featured posts section
        $mock_posts = dashvio_get_mock_posts();
        $featured_posts = array_slice($mock_posts, 0, 3);
        ?>
        
        <div class="post-featured-grid">
            <?php foreach ($featured_posts as $index => $post) : ?>
                <article class="post-featured <?php echo $index === 0 ? 'post-featured--large' : ''; ?>">
                    <a href="<?php echo esc_url(dashvio_get_mock_post_url($index)); ?>" class="post-featured__media">
                        <img src="<?php echo dashvio_generate_placeholder_image(800, 500, $index); ?>" alt="<?php echo esc_attr($post['title']); ?>">
                    </a>
                    <div class="post-featured__content">
                        <div class="post-featured__meta">
                            <span class="post-featured__category"><?php echo esc_html($post['category']); ?></span>
                            <span class="post-featured__date"><?php echo esc_html($post['date']); ?></span>
                        </div>
                        <h2 class="post-featured__title"><?php echo esc_html($post['title']); ?></h2>
                        <p class="post-featured__excerpt"><?php echo esc_html($post['excerpt']); ?></p>
                        <a href="<?php echo esc_url(dashvio_get_mock_post_url($index)); ?>" class="post-featured__link">
                            <?php esc_html_e('Read article', 'dashvio'); ?>
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (have_posts()) : ?>
            <div class="post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="post-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php else : ?>
                            <a class="post-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                <img src="<?php echo dashvio_generate_placeholder_image(600, 400, get_the_ID()); ?>" alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="post-card__content">
                            <div class="post-card__meta">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                    ?>
                                    <span class="post-card__category"><?php echo esc_html($categories[0]->name); ?></span>
                                <?php else : ?>
                                    <span class="post-card__category"><?php esc_html_e('Uncategorized', 'dashvio'); ?></span>
                                <?php endif; ?>
                                <span class="post-card__date"><?php echo esc_html(get_the_date()); ?></span>
                            </div>
                            <h2 class="post-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="post-card__excerpt">
                                <?php 
                                if (has_excerpt()) {
                                    echo esc_html(wp_trim_words(get_the_excerpt(), 26));
                                } else {
                                    echo esc_html(wp_trim_words(get_the_content(), 26));
                                }
                                ?>
                            </p>
                            <a class="post-card__link" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Read article', 'dashvio'); ?>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination-wrapper">
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'dashvio'),
                    'next_text' => __('Next', 'dashvio'),
                )); ?>
            </div>
        <?php else : ?>
            <?php
            // Show remaining mock posts if no real posts
            $regular_posts = array_slice($mock_posts, 3);
            ?>
            <div class="post-grid post-grid--mock">
                <?php foreach ($regular_posts as $index => $post) : ?>
                    <article class="post-card">
                        <a href="<?php echo esc_url(dashvio_get_mock_post_url($index + 3)); ?>" class="post-card__media">
                            <img src="<?php echo dashvio_generate_placeholder_image(600, 400, $index + 3); ?>" alt="<?php echo esc_attr($post['title']); ?>">
                        </a>
                        <div class="post-card__content">
                            <div class="post-card__meta">
                                <span class="post-card__category"><?php echo esc_html($post['category']); ?></span>
                                <span class="post-card__date"><?php echo esc_html($post['date']); ?></span>
                            </div>
                            <h2 class="post-card__title">
                                <a href="<?php echo esc_url(dashvio_get_mock_post_url($index + 3)); ?>"><?php echo esc_html($post['title']); ?></a>
                            </h2>
                            <p class="post-card__excerpt"><?php echo esc_html($post['excerpt']); ?></p>
                            <a href="<?php echo esc_url(dashvio_get_mock_post_url($index + 3)); ?>" class="post-card__link">
                                <?php esc_html_e('Read article', 'dashvio'); ?>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>

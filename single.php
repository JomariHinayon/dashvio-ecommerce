<?php get_header(); ?>

<main class="site-main single-post">
    <div class="container">
        <?php
        // Check if this is a mock post
        $mock_post_index = isset($_GET['mock_post']) ? intval($_GET['mock_post']) : null;
        $mock_post = null;
        
        if ($mock_post_index !== null) {
            $mock_post = dashvio_get_mock_post($mock_post_index);
        }
        
        if ($mock_post) : ?>
            <article class="single-entry">
                <header class="single-entry__header">
                    <div class="single-entry__meta">
                        <span class="single-entry__date"><?php echo esc_html($mock_post['date']); ?></span>
                        <span class="single-entry__category"><?php echo esc_html($mock_post['category']); ?></span>
                        <span class="single-entry__author">
                            <?php esc_html_e('by Dashvio Team', 'dashvio'); ?>
                        </span>
                    </div>
                    <h1 class="single-entry__title"><?php echo esc_html($mock_post['title']); ?></h1>
                    <div class="single-entry__featured">
                        <img src="<?php echo dashvio_generate_placeholder_image(1200, 600, $mock_post_index); ?>" alt="<?php echo esc_attr($mock_post['title']); ?>">
                    </div>
                </header>

                <div class="single-entry__content">
                    <p><?php echo esc_html($mock_post['excerpt']); ?></p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    
                    <h2>Key Features and Benefits</h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    
                    <h3>Getting Started</h3>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                    
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                </div>

                <footer class="single-entry__footer">
                    <div class="single-entry__tags">
                        <a href="#"><?php echo esc_html($mock_post['category']); ?></a>
                        <a href="#">E-commerce</a>
                        <a href="#">Online Store</a>
                    </div>
                    <nav class="single-entry__nav" aria-label="<?php esc_attr_e('Post navigation', 'dashvio'); ?>">
                        <?php
                        $prev_index = ($mock_post_index > 0) ? $mock_post_index - 1 : null;
                        $next_index = ($mock_post_index < count(dashvio_get_mock_posts()) - 1) ? $mock_post_index + 1 : null;
                        ?>
                        <div class="single-entry__nav-item single-entry__nav-item--prev">
                            <?php if ($prev_index !== null) : ?>
                                <a href="<?php echo esc_url(dashvio_get_mock_post_url($prev_index)); ?>">← <?php esc_html_e('Previous article', 'dashvio'); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="single-entry__nav-item single-entry__nav-item--next">
                            <?php if ($next_index !== null) : ?>
                                <a href="<?php echo esc_url(dashvio_get_mock_post_url($next_index)); ?>"><?php esc_html_e('Next article', 'dashvio'); ?> →</a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </footer>
            </article>
        <?php elseif (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-entry'); ?>>
                    <header class="single-entry__header">
                        <div class="single-entry__meta">
                            <span class="single-entry__date"><?php echo esc_html(get_the_date()); ?></span>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                                ?>
                                <span class="single-entry__category"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <span class="single-entry__author">
                                <?php
                                printf(
                                    /* translators: %s: author name */
                                    esc_html__('by %s', 'dashvio'),
                                    esc_html(get_the_author())
                                );
                                ?>
                            </span>
                        </div>
                        <h1 class="single-entry__title"><?php the_title(); ?></h1>
                        <div class="single-entry__featured">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="<?php echo dashvio_generate_placeholder_image(1200, 600, get_the_ID()); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="single-entry__content">
                        <?php
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="single-entry__pagination">',
                            'after' => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="single-entry__footer">
                        <div class="single-entry__tags">
                            <?php the_tags('', '', ''); ?>
                        </div>
                        <nav class="single-entry__nav" aria-label="<?php esc_attr_e('Post navigation', 'dashvio'); ?>">
                            <div class="single-entry__nav-item single-entry__nav-item--prev">
                                <?php previous_post_link('%link', __('← Previous article', 'dashvio')); ?>
                            </div>
                            <div class="single-entry__nav-item single-entry__nav-item--next">
                                <?php next_post_link('%link', __('Next article →', 'dashvio')); ?>
                            </div>
                        </nav>
                    </footer>
                </article>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>


<?php get_header(); ?>

<main class="site-main single-post">
    <div class="container">
        <?php if (have_posts()) : ?>
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
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single-entry__featured">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
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


<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <section class="dash-hero dash-hero--templates">
            <div class="dash-hero__grid">
                <div class="dash-hero__content">
                    <span class="dash-badge">Premium Templates</span>
                    <h1>Launch your store in minutes with professional templates</h1>
                    <p>Choose from our collection of stunning, conversion-optimized templates. Each design is crafted for specific industries and ready to import with one click.</p>
                    <div class="dash-btn-group">
                        <a class="button button-primary" href="<?php echo esc_url(home_url('/prebuilt-websites/')); ?>">
                            Browse Templates
                        </a>
                        <?php if (dashvio_show_woocommerce() && function_exists('wc_get_page_id')) :
                            $shop_id = wc_get_page_id('shop');
                            ?>
                            <a class="button button-outline" href="<?php echo esc_url($shop_id > 0 ? get_permalink($shop_id) : home_url('/shop')); ?>">
                                Shop Products
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="dash-hero__stats">
                        <div class="dash-stat">
                            <strong>3+</strong>
                            <span>Ready Templates</span>
                        </div>
                        <div class="dash-stat">
                            <strong>1-Click</strong>
                            <span>Import System</span>
                        </div>
                        <div class="dash-stat">
                            <strong>100%</strong>
                            <span>Customizable</span>
                        </div>
                    </div>
                </div>
                <div class="dash-hero__carousel">
                    <?php
                    $demos = function_exists('dashvio_get_prebuilt_demos') ? dashvio_get_prebuilt_demos() : array();
                    if (!empty($demos)) :
                    ?>
                        <div class="demo-carousel">
                            <div class="demo-carousel__track">
                                <?php foreach ($demos as $demo) : ?>
                                    <div class="demo-carousel__slide">
                                        <a href="<?php echo esc_url($demo['preview_url']); ?>" target="_blank">
                                            <img src="<?php echo esc_url($demo['thumbnail']); ?>" alt="<?php echo esc_attr($demo['name']); ?>">
                                            <div class="demo-carousel__info">
                                                <h4><?php echo esc_html($demo['name']); ?></h4>
                                                <p><?php echo esc_html($demo['description']); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="demo-carousel__dots"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="dash-section dash-section--templates">
            <div class="dash-section__header">
                <div>
                    <h2>Professional Templates for Every Industry</h2>
                </div>
                <a class="button button-outline" href="<?php echo esc_url(home_url('/prebuilt-websites/')); ?>">View All Templates</a>
            </div>
            <div class="dash-templates-grid">
                <?php
                $demos = function_exists('dashvio_get_prebuilt_demos') ? dashvio_get_prebuilt_demos() : array();
                $demo_count = 0;
                foreach ($demos as $demo) :
                    if ($demo_count >= 3) break;
                    $demo_count++;
                ?>
                    <article class="dash-template-card">
                        <div class="dash-template-card__thumb">
                            <img src="<?php echo esc_url($demo['thumbnail']); ?>" alt="<?php echo esc_attr($demo['name']); ?>">
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

        <?php if (dashvio_show_woocommerce()) : ?>
            <section class="dash-section dash-section--products">
                <div class="dash-section__header">
                    <div>
                        <h2>Featured Products</h2>
                    </div>
                    <a class="button button-outline" href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop All Products</a>
                </div>
                <div class="dash-products">
                    <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" visibility="visible"]'); ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="dash-section" id="dashvio-insights">
            <div class="dash-cta">
                <h3>Launch smarter with Dashvio Insights.</h3>
                <p>Join our weekly digest for product strategy, conversion tips, and platform updates built for serious e-commerce teams.</p>
                <form class="dash-newsletter">
                    <input type="email" placeholder="you@brand.com" required>
                    <button type="submit" class="button button-primary">Subscribe</button>
                </form>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>


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
                            <svg class="dash-stat__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 11L12 14L22 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 12V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>5+</strong>
                                <span>Ready Templates</span>
                            </div>
                        </div>
                        <div class="dash-stat">
                            <svg class="dash-stat__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>1-Click</strong>
                                <span>Import System</span>
                            </div>
                        </div>
                        <div class="dash-stat">
                            <svg class="dash-stat__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>100%</strong>
                                <span>Customizable</span>
                            </div>
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
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <div class="dash-why-toggle">
            <button class="dash-why-toggle__btn" id="dashvio-why-toggle" aria-expanded="false" aria-controls="dashvio-why-content">
                <svg class="dash-why-toggle__icon" width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>Why Dashvio</span>
                <svg class="dash-why-toggle__arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="dash-why-content" id="dashvio-why-content">
                <div class="dash-why-content__inner">
                    <div class="dash-why-grid">
                        <div class="dash-why-item">
                            <div class="dash-why-item__header">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h4>Instant storefront setup and configuration</h4>
                            </div>
                            <p>Get your online store up and running in minutes with pre-configured settings and ready-to-use templates.</p>
                        </div>
                        <div class="dash-why-item">
                            <div class="dash-why-item__header">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h4>Reusable components for every funnel stage</h4>
                            </div>
                            <p>Build consistent user experiences with modular components designed for product pages, checkout, and customer accounts.</p>
                        </div>
                        <div class="dash-why-item">
                            <div class="dash-why-item__header">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h4>Optimized for conversion & Core Web Vitals</h4>
                            </div>
                            <p>Fast-loading pages and performance-optimized code ensure better rankings and higher conversion rates.</p>
                        </div>
                        <div class="dash-why-item">
                            <div class="dash-why-item__header">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h4>Built-in dark & light experiences</h4>
                            </div>
                            <p>Automatic theme switching adapts to user preferences, providing a comfortable browsing experience day or night.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

